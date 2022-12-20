<?php

namespace App\Http\Controllers;

use App\Services\AppManagerInterface;
use App\Services\DriverManagerInterface;
use App\Services\Drivers\DriverInterface;
use Illuminate\Http\Request;

class AppConnectionController extends Controller
{
    public function index() {

        $apps = config()->get('services.drivers');

        $connections = collect([]); // query connections from db;

        return view("connections.index", compact("apps", "connections"));
    }

    public function store(Request $request, AppManagerInterface $app) {

        $request->validate([
            'app' => ['required']
        ]);

        $app->driver($request['app'])->redirect();
    }
}
