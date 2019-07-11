<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use League\Flysystem\Config;
use Session;

class GitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pass)
    {

        $sPassword = config('gitdeploy.password');
        $sLocation = config('gitdeploy.location');

        if($pass == $sPassword){


            $output = shell_exec('cd '.$sLocation.'; git status');
            echo "<pre>$output</pre>";

            $output = shell_exec('cd '.$sLocation.'; git pull');
            echo "<pre>$output</pre>";

            $output = system('cd '.$sLocation.'; composer dump-autoload');
            echo "<pre>$output</pre>";

            $output = shell_exec('cd '.$sLocation.'; php artisan migrate');
            echo "<pre>$output</pre>";

            $output = shell_exec('cd '.$sLocation.'; php artisan cache:clear');
            echo "<pre>$output</pre>";

            $output = shell_exec('cd '.$sLocation.'; php artisan config:cache');
            echo "<pre>$output</pre>";

            $output = shell_exec('cd '.$sLocation.'; php artisan view:clear');
            echo "<pre>$output</pre>";

            $output = shell_exec('cd '.$sLocation.'; php artisan route:cache');
            echo "<pre>$output</pre>";


        }

    }


}
