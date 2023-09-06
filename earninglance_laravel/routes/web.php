<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WithdrawalRequestController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

// Dashboard routes
Route::get('/dashboard', [DashboardController::class])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');
Route::post('/uploads/{plan_id}', [DashboardController::class, 'uploads'])->middleware('auth');
Route::get('/dashboard/plans/{id}', [DashboardController::class, 'plans'])->middleware('auth');
// End of Dashboard Routes


Route::post('/send-recovery-email', [ForgotController::class, 'sendRecoveryEmail'])->name('send.recovery.email');

// Route::get('/dashboard', [DashboardController::class])->middleware('auth');
// Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');
Route::post('/uploads', [DashboardController::class, 'uploads'])->middleware('auth');

Route::get('/', [PlansController::class, 'select']);
Route::get('/plans', [PlansController::class, 'show']);
Route::post('/plans', [PlansController::class, 'store']);
Route::post('/plans/{id}', [PlansController::class, 'delete']);

// Route::get('/index', [ContactController::class, 'index']);
Route::get('/contact', [ContactController::class, 'show'])->middleware('auth');
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/forgot', function(){
    return view('/forgot');
});
Route::get('/recover', function(){
    return view('/recover');
});





// Route::get('/users', [UsersController::class, 'index']);
Route::get('/users', [UsersController::class, 'show'])->middleware('auth');
Route::post('/users/{id}', [UsersController::class, 'addBalance'])->middleware('auth');

Route::get('/user_payments', [UserPaymentsController::class, 'show'])->middleware('auth');
Route::post('/user_payments/{id}', [UserPaymentsController::class, 'status_update'])->middleware('auth');


Route::get('/withdrawal_request', [WithdrawalRequestController::class, 'show'])->middleware('auth');
Route::post('/withdrawal_request/{id}', [WithdrawalRequestController::class, 'status_update'])->middleware('auth');
Route::post('/withdrawal_request', [WithdrawalRequestController::class, 'store'])->name('withdraw')->middleware('auth');


Route::get('/payment_methods', [PaymentMethodsController::class, 'show'])->middleware('auth');
Route::post('/add_payment_methods', [PaymentMethodsController::class, 'add_payment_method'])->middleware('auth');
Route::post('/delete_payment_methods/{id}', [PaymentMethodsController::class, 'delete_payment_method'])->middleware('auth');
Route::post('/add_withdrawal_methods', [PaymentMethodsController::class, 'add_withdrawal_method'])->middleware('auth');
Route::post('/delete_withdrawal_method/{id}', [PaymentMethodsController::class, 'delete_withdrawal_method'])->middleware('auth');


// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/register/{token}', [RegisterController::class, 'verifyUser']);

Route::post('/user/verify/{token}', 'Auth\RegisterController@verifyUser')->name('verification.send');

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
