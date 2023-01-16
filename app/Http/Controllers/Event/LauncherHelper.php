<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Launcher;

class LauncherHelper extends Controller {

    static function build_filters($request, $justVisibles=false, $returnStr=false) {
        
        $filters = null;

        $orderBy = $request->query('orderBy', null);
        $orderByType = $request->query('orderByType', null);

        if($justVisibles)
            $filters = Launcher::active();
        else
            $filters = Launcher::where('status', '!=', 'init');

        if($orderBy != null) {
            if($orderBy == 'createdAt')
                $orderBy = 'created_at';
            $filters->orderBy($orderBy, $orderByType == null ? 'desc' : $orderByType);
        }
        else
            $filters->orderBy('created_at', 'desc');
    

        return $filters;
    }

}


?>