<?php

use App\Models\Card;
use App\Models\User;
use App\Models\Transfer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditCardController;
use \Illuminate\Support\Facades\Auth;

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

Route::get('/test', function (){

    $list = Transfer::where('recipient_id', 2)->limit(10)->get();

    if (!$list->isEmpty()){
        return 'ok';
    } else {
        return 'notFound';
    }

});

Route::get('/', function () {
    if (Auth::check()){
        return view('Wallet.home');
    } else {
//        return redirect(\route('auth.login'));
        return view('Auth.login');
    }
})->name('wallet.home');

Route::get('/transfer', function () {
    if (Auth::check()){
        return view('Transfer.transfer');
    } else {
        return view('Auth.login');
    }
})->name('wallet.transfer');

//Route::get('/test', function () {
//    $get = array(CreditCardController::gen());
//    return $get;
//});


Route::get('/login', function () {
    if (!Auth::check()){
        return view('Auth.login');
    } else {
        return redirect(\route('wallet.home'));
    }
})->name('auth.login');

Route::get('/register', function () {
    if (!Auth::check()){
        return view('Auth.register');
    } else {
        return redirect(\route('wallet.home'));
    }
})->name('auth.reg');

Route::get('/logout', function () {

    Auth::logout();
    return redirect(\route('wallet.home'));
})->name('auth.logout');
