<?php
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('resort/{slug}', 'HomeController@resotPreview');
Route::get('booking', 'HomeController@booking')->name('booking');
Route::post('save-booking', 'BookingController@saveBooking')->name('save-booking');
Route::post('checkout', 'BookingController@checkout')->name('checkout');
Route::get('/dynamic.js', function () {
    return view('admin.js.dynamic'); 
});

/*Route::get('/', function() {
    return redirect(route('admin.dashboard'));
});

Route::get('home', function() {
    return redirect(route('admin.dashboard'));
});*/

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    /*Packages*/
    Route::get('packages', 'PackagesController@index')->name('packages');
    Route::get('add-packages', 'PackagesController@addPackages')->name('add-packages');
    Route::post('save-package', 'PackagesController@savePackage')->name('save-package');
    Route::post('delete-package', 'PackagesController@deletePackage')->name('delete-package');
    Route::get('edit-package/{id}', 'PackagesController@editPackage')->name('edit-package');
    Route::post('view-package', 'PackagesController@viewPackage')->name('view-package');
    /*Bookings*/
    Route::get('bookings', 'BookingController@index')->name('bookings');
    Route::get('add-booking', 'BookingController@addBooking')->name('add-booking');
    Route::post('save-booking', 'BookingController@saveBooking')->name('save-booking');
    Route::post('delete-booking', 'BookingController@deleteBooking')->name('delete-booking');
    Route::get('edit-booking/{id}', 'BookingController@editBooking')->name('edit-booking');
    Route::post('view-booking', 'BookingController@viewBooking')->name('view-booking');

    Route::get('users/roles', 'UserController@roles')->name('users.roles');
    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users'
        ]
    ]);
});

Route::middleware('auth')->get('logout', function() {
    Auth::logout();
    return redirect(route('login'))->withInfo('You have successfully logged out!');
})->name('logout');

Auth::routes(['verify' => true]);

Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});

// Get authenticated user
Route::get('users/auth', function() {
    return response()->json(['user' => Auth::check() ? Auth::user() : false]);
});
