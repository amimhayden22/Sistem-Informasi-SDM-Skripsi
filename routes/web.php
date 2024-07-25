<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\Api\EmployeeApiController;
use App\Http\Controllers\{BusinessTripController, HomeController, HolidayController, UserController, PositionController, PartController, EmployeeController, TransactionController, WfhTransactionController, LeaveQuotaController, SalaryController};

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
    return redirect('/login');
});
Route::get('/form/employee', [EmployeeController::class, 'formCreateWithoutAuth'])->name('employees.new_employees')->withoutMiddleware(['auth']);
Route::post('/form/employee', [EmployeeController::class, 'storeWithoutAuth'])->name('employees.storeWithoutAuth');

Route::prefix('dasbor')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dasbor');
    Route::resource('/parts', PartController::class);
    Route::resource('/positions', PositionController::class);
    Route::resource('/employees', EmployeeController::class);
    Route::resource('/users', UserController::class);
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::resource('/work-permit', TransactionController::class);
});

Auth::routes([
    'verify' => true,
    'register' => false,
]);

Route::middleware(['auth', 'verified', 'checkstatus:Active'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('/users', UserController::class);
        Route::middleware(['checkrole:administrator,admin,manajer'])->group(function () {
            Route::resource('/parts', PartController::class);
            Route::resource('/positions', PositionController::class);
            Route::resource('/employees', EmployeeController::class);
        });
        Route::middleware(['checkrole:administrator,admin,manajer,karyawan'])->group(function () {
            Route::resource('/work-permit', TransactionController::class);
            Route::get('/', [HomeController::class, 'index'])->name('dashboard');
            Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
            Route::get('/postions/json', [EmployeeController::class, 'findPosition'])->name('postions.data-json');
            Route::resource('/work-permit', TransactionController::class);
        });
    });
});

Route::prefix('guest/api/v1/')->group(function () {
    Route::get('employees', [EmployeeApiController::class, 'index']);
    Route::get('employees/{id}', [EmployeeApiController::class, 'show']);
});
