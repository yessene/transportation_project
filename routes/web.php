<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginuserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Models\File;
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

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('homeuser',function()
    {
        return view('homeuser');
    });
});


Auth::routes();

// -----------------------------home----------------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/homeuser', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('homeuser');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->middleware('auth')->name('profile');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// -----------------------------loginuser----------------------------------------//
Route::get('/loginuser', [App\Http\Controllers\Auth\LoginuserController::class, 'loginuser'])->name('loginuser');
// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);



// ----------------------------- customers -----------------------------//
Route::get('form/allcustomers/page', [App\Http\Controllers\CustomerController::class, 'allCustomers'])->middleware('auth')->name('form/allcustomers/page');
Route::get('form/addcustomer/page', [App\Http\Controllers\CustomerController::class, 'addCustomer'])->middleware('auth')->name('form/addcustomer/page');
Route::post('form/addcustomer/save', [App\Http\Controllers\CustomerController::class, 'saveCustomer'])->middleware('auth')->name('form/addcustomer/save');
Route::get('form/customer/edit/{bkg_customer_id}', [App\Http\Controllers\CustomerController::class, 'updateCustomer']);
Route::post('form/customer/update', [App\Http\Controllers\CustomerController::class, 'updateRecord'])->middleware('auth')->name('form/customer/update');
Route::post('form/customer/delete', [App\Http\Controllers\CustomerController::class, 'deleteRecord'])->middleware('auth')->name('form/customer/delete');

// ----------------------------- vehicles -----------------------------//
Route::get('form/allvehicles/page', [App\Http\Controllers\vehicleController::class, 'allvehicles'])->middleware('auth')->name('form/allvehicles/page');
Route::get('form/addvehicle/page', [App\Http\Controllers\vehicleController::class, 'addvehicle'])->middleware('auth')->name('form/addvehicle/page');
Route::post('form/addvehicle/save', [App\Http\Controllers\vehicleController::class, 'savevehicle'])->middleware('auth')->name('form/addvehicle/save');
Route::get('form/vehicle/edit/{id}', [App\Http\Controllers\vehicleController::class, 'updatevehicle'])->middleware('auth');
Route::put('form/vehicle/update/{id}', [App\Http\Controllers\vehicleController::class, 'updateRecord'])->middleware('auth')->name('form/vehicle/update');
Route::post('form/vehicle/delete', [App\Http\Controllers\vehicleController::class, 'deleteRecord'])->middleware('auth')->name('form/vehicle/delete');
Route::get('form/viewvehicle/{id}', [App\Http\Controllers\vehicleController::class, 'viewvehicle'])->middleware('auth')->name('form/vehicle/view');




// ----------------------------- clients -----------------------------//
Route::get('form/allclients/page', [App\Http\Controllers\ClientController::class, 'allclients'])->middleware('auth')->name('form/allclients/page');
Route::get('form/addclient/page', [App\Http\Controllers\ClientController::class, 'addclient'])->middleware('auth')->name('form/addclient/page');
Route::post('form/addclient/save', [App\Http\Controllers\ClientController::class, 'saveclient'])->middleware('auth')->name('form/addclient/save');
Route::get('form/client/edit/{id}', [App\Http\Controllers\ClientController::class, 'updateclient'])->middleware('auth');
Route::put('form/client/update/{id}', [App\Http\Controllers\ClientController::class, 'updateRecord'])->middleware('auth')->name('form/client/update');
Route::post('form/client/delete', [App\Http\Controllers\ClientController::class, 'deleteRecord'])->middleware('auth')->name('form/client/delete');
Route::get('form/viewclient/{id}', [App\Http\Controllers\ClientController::class, 'viewClient'])->middleware('auth')->name('form/client/view');


// ----------------------------- drivers -----------------------------//
Route::get('form/alldrivers/page', [App\Http\Controllers\driverController::class, 'alldrivers'])->middleware('auth')->name('form/alldrivers/page');
Route::get('form/adddriver/page', [App\Http\Controllers\driverController::class, 'adddriver'])->middleware('auth')->name('form/adddriver/page');
Route::post('form/adddriver/save', [App\Http\Controllers\driverController::class, 'savedriver'])->middleware('auth')->name('form/adddriver/save');
Route::get('form/driver/edit/{id}', [App\Http\Controllers\driverController::class, 'updatedriver'])->middleware('auth');
Route::put('form/driver/update/{id}', [App\Http\Controllers\driverController::class, 'updateRecord'])->middleware('auth')->name('form/driver/update');
Route::post('form/driver/delete', [App\Http\Controllers\driverController::class, 'deleteRecord'])->middleware('auth')->name('form/driver/delete');
Route::get('form/viewdriver/{id}', [App\Http\Controllers\driverController::class, 'viewdriver'])->middleware('auth')->name('form/driver/view');


// travel
Route::get('form/alltravels/page', [App\Http\Controllers\travelController::class, 'alltravels'])->middleware('auth')->name('form/alltravels/page');
Route::get('form/addtravel/page', [App\Http\Controllers\travelController::class, 'addtravel'])->middleware('auth')->name('form/addtravel/page');
Route::post('form/addtravel/save', [App\Http\Controllers\travelController::class, 'savetravel'])->middleware('auth')->name('form/addtravel/save');
Route::get('form/travel/edit/{id}', [App\Http\Controllers\travelController::class, 'updatetravel'])->middleware('auth');
Route::put('form/travel/update/{id}', [App\Http\Controllers\travelController::class, 'updateRecord'])->middleware('auth')->name('form/travel/update');
Route::post('form/travel/delete', [App\Http\Controllers\travelController::class, 'deleteRecord'])->middleware('auth')->name('form/travel/delete');
Route::get('form/viewtravel/{id}', [App\Http\Controllers\travelController::class, 'viewtravel'])->middleware('auth')->name('form/travel/view');

//file upload 
Route::post('/upload', function (Request $request) {
    if ($request->hasFile('filepond')) {
        $file = $request->file('filepond');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $filename, 'public');
        return response()->json(['path' => $path]);
    }
    return response()->json(['error' => 'No file was uploaded.']);
})->middleware('auth');


Route::post('file/upload', 'FileController@upload')->name('file.upload');
