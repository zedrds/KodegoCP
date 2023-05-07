<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AmenitiesController;
use App\Http\Controllers\Backend\FeaturesController;
use App\Http\Controllers\Backend\CondoOwnersController;
use App\Http\Controllers\Backend\ReservationsController;
use App\Http\Controllers\Backend\UnitTypesController;
use App\Http\Controllers\Backend\PaymentsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\RoomsController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

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

// Route::get('/', function () {
//     return view('client.index');
// })->name('home');





Route::middleware(['auth','role:admin'])->group(function () {
   Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'logoutAdmin')->name('admin.logout');
    Route::get('/admin/dashboard', 'dashboardAdmin')->name('admin.dashboard');
    Route::get('/admin/profile', 'profileAdmin')->name('admin.profile');
    Route::post('/admin/profile/store', 'updateAdminProfile')->name('admin.profile.update');
    Route::get('/admin/users', 'allUsers')->name('all.users');
    Route::get('/admin/users/add', 'addUser')->name('add.user');
    Route::post('/admin/users/store', 'storeUser')->name('store.user');
    Route::get('/admin/users/edit/{id}', 'editUser')->name('edit.user');
    Route::get('/admin/users/delete/{id}', 'deleteUser')->name('delete.user');
    Route::post('/admin/users/update', 'updateUser')->name('update.user');
   });

   Route::controller(RoomsController::class)->group(function(){
    Route::get('/admin/rooms', 'viewRooms')->name('all.rooms');
    Route::get('/admin/rooms/add', 'addRoom')->middleware('no-condo-owners-available')->name('add.room');
    Route::post('/admin/rooms/store', 'storeRoom')->name('store.room');
    Route::get('/admin/rooms/delete/{id}', 'deleteRoom')->name('delete.room');
    Route::get('/admin/rooms/edit/{id}', 'editRoom')->name('edit.room');
    Route::post('/admin/rooms/update', 'updateRoom')->name('update.room');
    Route::get('/admin/rooms/view/{id}', 'viewRoom')->name('view.room');
    Route::post('/admin/rooms/thumbnail/update', 'updateRoomThumbnail')->name('update.room.thumbnail');
    Route::get('/admin/rooms/thumbnail/delete/{id}', 'deleteRoomThumbnail')->name('delete.room.thumbnail');
   });

   Route::controller(AmenitiesController::class)->group(function(){
    Route::get('/admin/amenities', 'viewAmenities')->name('view.amenities');
    Route::get('/admin/amenities/add', 'addAmenity')->name('add.amenity');
    Route::post('/admin/amenities/store', 'storeAmenity')->name('store.amenity');
    Route::get('/admin/amenities/delete/{id}', 'deleteAmenity')->name('delete.amenity');
    Route::get('/admin/amenities/edit/{id}', 'editAmenity')->name('edit.amenity');
    Route::post('/admin/amenities/update', 'updateAmenity')->name('update.amenity');
   });

   Route::controller(FeaturesController::class)->group(function(){
    Route::get('/admin/features', 'viewFeatures')->name('view.features');
    Route::get('/admin/features/add', 'addFeature')->name('add.feature');
    Route::post('/admin/features/store', 'storeFeature')->name('store.feature');
    Route::get('/admin/features/delete/{id}', 'deleteFeature')->name('delete.feature');
    Route::get('/admin/features/edit/{id}', 'editFeature')->name('edit.feature');
    Route::post('/admin/features/update', 'updateFeature')->name('update.feature');
   });

   Route::controller(CondoOwnersController::class)->group(function(){
    Route::get('/admin/condo-owners', 'viewCondoOwners')->name('view.condo_owners');
    Route::get('/admin/condo-owners/add', 'addCondoOwner')->name('add.condo_owner');
    Route::get('/admin/condo-owners/{id}', 'viewCondoOwner')->name('view.condo_owner');
    Route::get('/admin/condo-owners/edit/{id}', 'editCondoOwnerName')->name('edit.condo_owner.name');
    Route::post('/admin/condo-owners/update/name', 'updateCondoOwnerName')->name('update.condo_owner.name');
    Route::post('/admin/condo-owners/store', 'storeCondoOwner')->name('store.condo_owner');
   });

   Route::controller(UnitTypesController::class)->group(function(){
    Route::get('/admin/units', 'viewUnits')->name('all.units');
    Route::get('/admin/units/{unit_slug}', 'viewTypeUnits')->name('all.type.units');
    Route::get('/admin/units/{unit_slug}/edit', 'editTypeUnits')->name('edit.type.units');
    Route::post('/admin/units/{unit_slug}/update', 'updateTypeUnits')->name('update.type.units');
   });

   Route::controller(ReservationsController::class)->group(function(){
    Route::get('/admin/reservations', 'allReservations')->name('all.reservations');
    Route::get('/admin/reservations/view/{id}', 'viewReservation')->name('view.reservation');
    Route::get('/admin/reservations/ajax/{unit_type}', 'getRoomName');
    Route::get('/admin/reservations/add', 'addReservations')->middleware('no-rooms-available')->name('add.reservation');
    Route::post('/admin/reservations/store', 'storeReservations')->name('store.reservation');
    Route::get('/admin/reservations/get-payor/ajax/{guest_name}', 'getReservationPayor');
    Route::get('/admin/reservation/get-amount/{reservation_id}', 'getReservationId');
    Route::get('/admin/reservation/status/update/{id}', 'updateReservationStatus');
   });

   Route::controller(PaymentsController::class)->group(function(){
    Route::get('/admin/payments', 'viewPayments')->name('all.payments');
    Route::get('/admin/payments/view/{id}', 'viewPayment')->name('view.payment');
    Route::get('/admin/payments/update/status/{id}', 'updatePaymentStatus')->name('update.status.payment');
   });

   Route::middleware('no-reservations')->group(function () {
        Route::controller(PaymentsController::class)->group(function(){
            Route::get('/admin/payments/make', 'makePayment')->name('make.payment');
            Route::post('/admin/payments/store', 'storePayment')->name('store.payment');

       });  
    });

    Route::controller(ClientController::class)->group(function(){
        Route::get('/admin/homepage/edit', 'editHomepage')->name('edit.homepage');
        Route::post('/admin/homepage/update', 'updateHomepage')->name('update.homepage');
    });
});


Route::middleware(['auth','verified','role:user'])->group(function (){
    Route::controller(ClientController::class)->group(function(){
        Route::get('/profile', 'guestProfile')->name('guest.profile');
        Route::get('/profile/logout', 'logoutGuest')->name('guest.logout');
        Route::post('/profile/update', 'updateProfile')->name('update.profile');
    });
});


Route::middleware(RedirectIfAuthenticated::class)->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/login', 'adminLogin')->name('admin.login');
    });
});



Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(ClientController::class)->group(function(){
        Route::get('/search', 'viewSearch')->name('search');
        Route::get('/book/{id}', 'Book')->name('book');
        Route::post('/book/store', 'storeBook')->name('store.book');
        Route::get('/receipt', 'viewReceipt')->name('receipt');
    });

    Route::controller(RoomsController::class)->group(function(){
        Route::get('/admin/rooms/get-price/{room_id}', 'getRoomPrice');
        Route::get('/admin/rooms/get-max-guests/{room_id}', 'getMaxGuests');
       });
    // Route::controller(ReservationsController::class)->group(function(){
    //     Route::get('/admin/reservation/get-dates', 'getDates');
    //    });

    
});

Route::controller(ClientController::class)->group(function(){
    Route::get('/', 'viewHome')->name('home');
    Route::get('/units', 'viewUnitTypes')->name('unit.types');
    Route::get('/units/{unit_slug}', 'viewUnitType')->name('view.unit.type');
    Route::get('/units/{unit_type}/{id}', 'viewUnit')->name('view.unit');
    Route::get('/about-us', 'aboutUs')->name('about.us');
});



require __DIR__.'/auth.php';
