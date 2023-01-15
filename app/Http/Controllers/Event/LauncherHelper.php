<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Launcher;

class LauncherHelper extends Controller {

    static function build_filters($request, $justVisibles=false, $returnStr=false) {
        
        $filters = null;

        if($justVisibles)
            $filters = Launcher::active();
        else
            $filters = Launcher::where('status', '!=', 'init');

        return $filters;
    }

}


?>