<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommonController;
use App\Http\Livewire\AccessModel;
use App\Http\Livewire\AccessPoint;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Permission;
use App\Http\Livewire\Users;
use App\Http\Livewire\UserType;
use App\Http\Livewire\UserView;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SubCategoryComponent;
use App\Http\Livewire\CustomerRegister;
use App\Http\Livewire\EmployeeRegister;
use App\Http\Livewire\CustomerComponent;
use App\Http\Livewire\EmployeeComponent;
use App\Http\Livewire\GoodsComponent;
use App\Http\Livewire\Size;
use App\Http\Livewire\DeliveryType;
use Illuminate\Support\Facades\Route;

// front route paths
use App\Http\Livewire\HomePage;
use App\Http\Livewire\AboutPage;
use App\Http\Livewire\ContactPage;
use App\Http\Livewire\DispatchPage;
use App\Http\Livewire\RegisterPage;
use App\Http\Livewire\LoginPage;
use App\Http\Livewire\TrackingPage;
use App\Http\Livewire\ConfirmPage;
use App\Http\Livewire\DispatchHistory;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\Reviews;
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
Route::get('/admin', function () {
    return view('auth.Login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/customer-login', [LoginController::class, 'customerLogin']);
Route::get('/customer-logout', [LoginController::class, 'customerLogout'])->name('customer-logout');

Route::post('/customer-register', [CommonController::class, 'customerRegister']);
Route::get('/customer-contact', [CommonController::class, 'customerContact']);
Route::get('/calculate-amount',[CommonController::class, 'calculateAmount'])->name('calculate.amount');
Route::post('/confirm-order',[CommonController::class, 'confirmOrder'])->name('confirm.order');

Route::post('/customer-review',[CommonController::class, 'customerReview'])->name('customer.review');


// front routes
Route::get('/', HomePage::class)->name('home');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/contact', ContactPage::class)->name('contact');
Route::get('/dispatch', DispatchPage::class)->name('dispatch');
Route::get('/register', RegisterPage::class)->name('register');
Route::get('/flogin', LoginPage::class)->name('flogin');
Route::get('/tracking/{id}', TrackingPage::class)->name('tracking');
Route::get('/confirmpage', ConfirmPage::class)->name('confirmpage');
Route::get('/dispatch-history', DispatchHistory::class)->name('dispatch-history');




Route::group(['middleware'=>['auth','access']],function(){
// Route::group(['middleware'=>['auth']],function(){

    Route::get('/user-type', UserType::class)->name('user-type');
    Route::get('/access-model', AccessModel::class)->name('access-model');
    Route::get('/access-point/{id}', AccessPoint::class)->name('access-point');
    Route::get('/permission/{id}', Permission::class)->name('permission');
    Route::get('/users', Users::class)->name('users');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/category', CategoryComponent::class)->name('category');
    Route::get('/sub-category', SubCategoryComponent::class)->name('sub-category');
    Route::get('/customer', CustomerComponent::class)->name('customer');
    Route::get('/size', Size::class)->name('size');
    Route::get('/delivery-type', DeliveryType::class)->name('delivery-type');
    Route::get('/goods', GoodsComponent::class)->name('goods');
    Route::get('/employee', EmployeeComponent::class)->name('employee');
    Route::get('/contactus', ContactUs::class)->name('contactus');
    Route::get('/reviews', Reviews::class)->name('reviews');

});
