<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    //  public static $EVENT_SITE = 'bogenstudio.at';
    //  public static $SHOP_SITE = 'shop.bogenstudio.com';

    // public static $EVENT_SITE = 'localevent.com';
    // public static $SHOP_SITE = 'localshop.com';
    
    public static $EVENT_SITE = 'myevent.com';
    public static $SHOP_SITE = 'myshop.com';
    
    public static function hasAnyExcept($expected, $real) {

        foreach ($real as $itr) {
            if($itr !== '_token' && !in_array($itr, $expected))
                return true;
        }
        return false;
    }

    public static function _custom_check_national_code($code) {

        if(!preg_match('/^[0-9]{10}$/',$code))
            return false;

        for($i=0;$i<10;$i++)
            if(preg_match('/^'.$i.'{10}$/',$code))
                return false;
        for($i=0,$sum=0;$i<9;$i++)
            $sum+=((10-$i)*intval(substr($code, $i,1)));
        $ret=$sum%11;
        $parity=intval(substr($code, 9,1));
        if(($ret<2 && $ret==$parity) || ($ret>=2 && $ret==11-$parity))
            return true;
        return false;
    }
    
    public static function getPersianDate($date){

        include_once 'jdate.php';
        $e = '';
        $e .= jdate('d', '', $date->timestamp) . ' ';
        $e .= jdate('F', '', $date->timestamp) . ' ';
        $e .= jdate('Y', '', $date->timestamp);
        return $e;
    }

    public static function MiladyToShamsi($date, $explode='-'){
        include_once 'jdate.php';
        $date = explode(' ', $date);
        $d = explode($explode, $date[0]);
        return gregorian_to_jalali($d[0],$d[1],$d[2],'/');
    }
    
    public static function ShamsiToMilady($date){
        include_once 'jdate.php';
        $date = explode('/', $date);
        return jalali_to_gregorian($date[0],$date[1],$date[2], '-');
    }
    
    public static function convertDateToString($date) {
        $subStrD = explode('/', $date);
        return $subStrD[0] . $subStrD[1] . $subStrD[2];
    }
    
    public static function convertStringToDate($date) {
        return $date[0] . $date[1] . $date[2] . $date[3] . '/' . $date[4] . $date[5] . '/' . $date[6] . $date[7];
    }

    public static function getToday() {

        include_once 'jdate.php';

        $jalali_date = jdate("c");

        $date_time = explode('-', $jalali_date);

        $subStr = explode('/', $date_time[0]);

        $day = $subStr[0] . $subStr[1] . $subStr[2];

        $time = explode(':', $date_time[1]);

        $time = $time[0] . $time[1];

        return ["date" => $day, "time" => $time];
    }

}
