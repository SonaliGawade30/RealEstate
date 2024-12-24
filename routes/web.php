<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
})->name('/');




// Guest Users
Route::middleware(['guest','PreventBackHistory'])->group(function()
{
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'] )->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Admin\AuthController::class, 'showRegister'] )->name('register');
    Route::post('register', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('signup');

});




// Authenticated users
Route::middleware(['auth','PreventBackHistory'])->group(function()
{

    // Auth Routes
    Route::get('home', fn () => redirect()->route('dashboard'))->name('home');
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
    Route::get('change-theme-mode', [App\Http\Controllers\Admin\DashboardController::class, 'changeThemeMode'])->name('change-theme-mode');
    Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'] )->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'] )->name('change-password');



    // Masters
    Route::resource('wards', App\Http\Controllers\Admin\Masters\WardController::class );
    Route::resource('zones', App\Http\Controllers\Admin\Masters\ZoneController::class );
    Route::resource('property-type', App\Http\Controllers\Admin\Masters\PropertyTypeController::class );
    Route::resource('type-of-use', App\Http\Controllers\Admin\Masters\TypeOfUseController::class );
    Route::resource('sources', App\Http\Controllers\Admin\Masters\SourceController::class );
    Route::resource('religions', App\Http\Controllers\Admin\Masters\ReligionController::class );
    Route::resource('rules', App\Http\Controllers\Admin\Masters\RuleController::class );
    Route::resource('biling-types', App\Http\Controllers\Admin\Masters\BilingTypeController::class );
 
    
    //Party Registration
    Route::resource('party-registration', App\Http\Controllers\Admin\PartyRegistrationController::class );

    //Property Registration
    Route::resource('property-registration', App\Http\Controllers\Admin\PropertyRegistrationController::class );
    Route::delete('property-registration/{id}/delete-row', [App\Http\Controllers\Admin\PropertyRegistrationController::class,'deleteRow'] )->name('property-registration.delete-row');

   
    //Application for rent
    Route::resource('application-for-rents', App\Http\Controllers\Admin\ApplicationForRentController::class );
    Route::get('application-for-rents/{id}/units', [App\Http\Controllers\Admin\ApplicationForRentController::class, 'getUnits'] )->name('application-for-rents.units');
    Route::get('application-for-rents/{application_for_rent}/party-detail', [App\Http\Controllers\Admin\ApplicationForRentController::class, 'getPartyDetails'] )->name('application-for-rents.party-detail');

    //Application for rental properties
    Route::resource('application-for-rental-properties', App\Http\Controllers\Admin\ApplicationForRentalPropertyController::class );


    // Users Roles n Permissions
    Route::resource('users', App\Http\Controllers\Admin\UserController::class );
    Route::get('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggle' ])->name('users.toggle');
    Route::get('users/{user}/retire', [App\Http\Controllers\Admin\UserController::class, 'retire' ])->name('users.retire');
    Route::put('users/{user}/change-password', [App\Http\Controllers\Admin\UserController::class, 'changePassword' ])->name('users.change-password');
    Route::get('users/{user}/get-role', [App\Http\Controllers\Admin\UserController::class, 'getRole' ])->name('users.get-role');
    Route::put('users/{user}/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRole' ])->name('users.assign-role');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class );

});




Route::get('/php', function(Request $request){
    if( !auth()->check() )
        return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
