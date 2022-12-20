<?php

use App\Http\Controllers\AppConnectionController;
use App\Models\App;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\App as EcommerceApp;
use App\Services\AppManagerInterface;
use App\Services\Apps\AppInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/apps', [AppConnectionController::class, 'index'])->name("connections.index");

Route::get('/apps/{appId}/connections', function(Request $request) {

    // list app connections
    // list app workflows
    // add connection button

});


Route::post('apps/auth/{appId}', function(Request $request, AppManagerInterface $manager, $appId) {

    $app = $manager->driver($appId);
    $fields = $app->getAuthValidationRules();

    $validator = Validator::make($request->all(), $fields);

    if ($validator->fails()) {
        return redirect()->route("app.auth.start", [$appId])
            ->withErrors($validator)
            ->withInput();
    }

    return $app->redirect();

})->name("app.auth");

Route::get('apps/auth/{appId}', function(Request $request, AppManagerInterface $manager, $appId) {

    try {

        $app = $manager->driver($appId);
        return view("apps.auth", compact("appId"));

    } catch (\InvalidArgumentException $ex) {

        return response('App does not exist.');
    }


})->name("app.auth.start");

Route::get('/apps/auth/return/{appId}', function(Request $request, AppManagerInterface $manager, $app) {

    // 1. get oauth credentials
    // 2. save credentials to the database with associated app
    // 3. redirect user to saved credentials page.
    // try {

    //     $manager->driver($app)->getCredentials();

    // } catch (InvalidArgumentException $exception) {

    //     return back()->withError($exception->getMessage())->withInput();
    // }

    //$tray = $driver->driver($app)->withCredentials($credentials);


    return view("app.show");
});
