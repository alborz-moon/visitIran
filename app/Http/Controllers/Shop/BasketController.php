<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\EventBuyer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;

class BasketController extends Controller {
    

    private function do_check_counts($products, $build_basket=false, $userId=null) {

        $errs = [];
        $orders = [];

        foreach($products as $product) {

            $needCheck = true;
            $counter = 0;

            foreach($orders as $order) {

                if($order['id'] == $product['id'] && (
                    $order['feature'] == null ||
                    ($order['feature'] != null && isset($product['feature']) 
                        && $order['feature'] == $product['feature'])
                )) {
                    if($order['available'] < $order['wanted'] + $product['count'])
                        array_push($errs, ['موجودی محصول ' . $order['name']]);
                    else {
                        if($build_basket)
                            $orders[$counter] = [
                                'id' => $order['id'],
                                'name' => $order['name'],
                                'available' => $order['available_count'],
                                'wanted' => $order['wanted'] + $product['count'],
                                'unit_price' => $order['unit_price'],
                                'off' => $order['off'],
                                'off_amount' => $order['off_amount'],
                            ];
                        else 
                            $orders[$counter] = [
                                'id' => $order['id'],
                                'name' => $order['name'],
                                'available' => $order['available_count'],
                                'wanted' => $order['wanted'] + $product['count'],
                            ];
                    }

                    $needCheck = false;
                    break;
                }

                $counter++;

            }

            if(!$needCheck)
                continue;

            $p = Product::find($product['id']);

            $features = $p->productEffectiveFeatures();
            if($features != null && !isset($product['feature']))
                throw new Exception('invalid data');

            $unit_price = $p->price;
            $off = null;
            $off_amount = 0;

            if($build_basket && count($errs) == 0) {

                $unit_price = $p->price;
                $off = $p->activeOff();
                $off_amount = 0;

                if($off != null) {
                    if($off['type'] == 'percent')
                        $unit_price = (100 - $off['amount']) * $unit_price / 100;
                    else
                        $unit_price = max(0, $unit_price - $off['amount']);

                    $off_amount = $p->price - $unit_price;
                }
            }

            if(!isset($product['feature'])) {
                if($p->available_count < $product['count'])
                    array_push($errs, ['موجودی محصول ' . $p->name]);
                else {
                    if($build_basket)
                        array_push($orders, [
                            'id' => $p->id,
                            'name' => $p->name,
                            'available' => $p->available_count,
                            'wanted' => $product['count'],
                            'feature' => null,
                            'unit_price' => $unit_price,
                            'off' => $off,
                            'off_amount' => $off_amount,
                        ]);
                    else
                        array_push($orders, [
                            'id' => $p->id,
                            'name' => $p->name,
                            'available' => $p->available_count,
                            'wanted' => $product['count'],
                            'feature' => null
                        ]);
                }
            }
            else {
                $vals = explode('$$', explode('__', $features->value)[0]);
                $idx = in_array($product['feature'], $vals);
                if($idx === false)
                    throw new Exception('invalid data');
                
                if($features->available_count != null) {
                    
                    $counts = explode('$$', $features->available_count);

                    if(count($counts) > $idx && $counts[$idx] < $product['count'])
                        array_push($errs, ['موجودی محصول ' . $p->name]);
                    else {
                        if($build_basket)
                            array_push($orders, [
                                'id' => $p->id,
                                'name' => $p->name,
                                'available' => $p->available_count,
                                'wanted' => $product['count'],
                                'feature' => $product['feature'],
                                'unit_price' => $unit_price,
                                'off' => $off,
                                'off_amount' => $off_amount,
                            ]);
                        else
                            array_push($orders, [
                                'id' => $p->id,
                                'name' => $p->name,
                                'available' => $p->available_count,
                                'wanted' => $product['count'],
                                'feature' => $product['feature']
                            ]);
                    }
                }
                else {
                    if($build_basket)
                        array_push($orders, [
                            'id' => $p->id,
                            'name' => $p->name,
                            'available' => $p->available_count,
                            'wanted' => $product['count'],
                            'feature' => null,
                            'unit_price' => $unit_price,
                            'off' => $off,
                            'off_amount' => $off_amount
                        ]);
                    else
                        array_push($orders, [
                            'id' => $p->id,
                            'name' => $p->name,
                            'available' => $p->available_count,
                            'wanted' => $product['count'],
                            'feature' => null
                        ]);
                }
            }
        }

        if($build_basket)
            return [$errs, $orders];

        return $errs;
    }




    public function check_basket(Request $request)
    {
        $validator = [
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.count' => 'required|integer|min:1',
            'products.*.feature' => 'nullable',
        ];

        $request->validate($validator, self::$COMMON_ERRS);
        try {
            $errs = $this->do_check_counts($request['products']);
        }
        catch(Exception $x) {
            return abort(401);
        }
        

        if(count($errs) > 0)
            return response()->json([
                'status' => 'nok',
                'errs' => $errs
            ]);

        return response()->json([
            'status' => 'ok'
        ]);
    }

    
    public function finalize_basket(Request $request)
    {
        $validator = [
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.count' => 'required|integer|min:1',
            'products.*.feature' => 'nullable',
            'off' => 'nullable|string|min:1',
            'address_id' => 'required|integer|exists:address,id',
            'time' => 'required'
        ];

        $request->validate($validator, self::$COMMON_ERRS);
        $userId = $request->user()->id;

        $address = Address::find($request['address_id']);

        if($address == null || $address->user_id != $userId)
            return abort(401);


        $out = $this->do_check_counts($request['products'], true, $userId);
        $errs = $out[0];

        if(count($errs) > 0)
            return response()->json([
                'status' => 'nok',
                'errs' => $errs
            ]);

        $orders = $out[1];
        $total = 0;

        foreach($orders as $order) {
            $total += $order['count'] * $order['unit_price'];
        }
        
        $off = null;
        $off_amount = null;

        if($request->has('code')) {

            $userId = $request->user()->id;

            try {
                $off = OffController::check_code('event', $userId, $request->code);
                $price_after_off = $off->off_type == 'percent' ? (100 - $off->amount) * $total / 100 : 
                    max(0, $total - $off->amount);

                $off_amount = $total - $price_after_off;
                $total = $price_after_off;
        
            }
            catch(\Exception $x) {
                
                if($x->getMessage() == 'null')
                    return response()->json(['status' => 'nok', 'msg' => 'کد وارد شده نامعتبر است']);

                if($x->getMessage() == 'expired')
                    return response()->json(['status' => 'nok', 'msg' => 'کد موردنظر منقضی شده است']);

                if($x->getMessage() == 'double_spend')
                    return response()->json(['status' => 'nok', 'msg' => 'این کد قبلا استفاده شده است']);    

            }
        }

        $tracking_code = random_int(100000, 999999);
        $transaction_status = Transaction::$INIT_STATUS;
        $payment_status = EventBuyer::$PENDING;

        if($total < 1000) {
            $transaction_status = Transaction::$COMPLETED_STATUS;
            $payment_status = EventBuyer::$PAID;
            $total = 0;
        }
        
        $t = Transaction::create([
            'status' => $transaction_status,
            'amount' => $total,
            'site' => 'shop',
            'user_id' => $userId,
            'off_id' => $off == null ? null : $off->id,
            'off_amount' => $off_amount,
            'tracking_code' => $tracking_code
        ]);

        $p = Purchase::create([
            'user_id' => $userId,
            'address_id' => $address->id,
            'transaction_id' => $t->id,
            'payment_status' => $payment_status,
            'status' => Purchase::$SENDING,
            'payment_type' => Purchase::$ONLINE
        ]);


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://sep.shaparak.ir/onlinepg/onlinepg");
        curl_setopt($ch, CURLOPT_POST, 1);

        $payload = json_encode([
            "action" => "token",
            "TerminalId" => "13158674",
            "Amount" => $amount,
            "ResNum" => $t->id,
            "RedirectUrl" => route('event.callback'),
            "CellNumber" => $request->user()->phone
        ]);

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, [
            'Content-Type:application/json',
            'Accept:application/json',
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($server_output, true);
        if(isset($res['status']) && $res['status'] == '1' && isset($res['token'])) {
            $token = $res['token'];
            return response()->json(['status' => 'ok', 'action' => 'pay', 'token' => $token]);
        }


        return response()->json([
            'status' => 'ok'
        ]);

    }

}
