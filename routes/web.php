<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\RegistrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
  

Route::group(['prefix' => 'Registration'], function () {
    Route::get('/',[RegistrationController::class,'getAllRegistrations'])->name('getAllRegistrations');
    Route::post('/save',[RegistrationController::class,'saveRegistration'])->name('saveRegistration');
    Route::get('/edit/{id}',[RegistrationController::class,'editRegistration'])->name('editRegistration');
    Route::put('/update/{id}',[RegistrationController::class,'updateRegistration'])->name('updateRegistration');
    ROute::delete('/delete/{id}',[RegistrationController::class,'deleteRegistration'])->name('deleteRegistration');

});