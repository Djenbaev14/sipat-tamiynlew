<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\admin\QrCodeController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\RoleController;
use App\Notifications\ExampleNotification;
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
    return view('home');
})->name('home')->middleware('auth');


Route::get('/register',[AuthController::class,'registerPage'])->name('register-page')->middleware(['guest']);
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/login',[AuthController::class,'loginPage'])->name('login-page')->middleware(['guest']);
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

// index
Route::get('organization', [OrganizationController::class,'index'])->name('organization.index')->middleware(['auth']);
// create
Route::get('organization/create', [OrganizationController::class,'create'])->name('organization.create')->middleware(['auth']);
Route::post('organization/create', [OrganizationController::class,'Cstore'])->name('organization.Cstore')->middleware(['auth']);
// update
Route::get('organization/{web_name}/update', [OrganizationController::class,'update'])->name('organization.update')->middleware(['auth']);
Route::post('organization/{web_name}/update', [OrganizationController::class,'Ustore'])->name('organization.Ustore')->middleware(['auth']);

// reviews
Route::get('reviews/', [OrganizationController::class,'reviews'])->name('organization.reviews')->middleware(['auth']);

// review
Route::get('organization/{web_name}/review', [ReviewController::class,'review'])->name('review.index');
Route::post('organization/{web_name}/review', [ReviewController::class,'reviewStore'])->name('review.store');

Route::get('/organization/generate-qrcode-raw/{web_name}', [QrCodeController::class, 'savePngQrCode'])->name('savePngQrCode')->middleware('auth');
Route::get('/organization/generate-table-sticker/{web_name}', [QrCodeController::class, 'saveStickerQrCode'])->name('saveStickerQrCode')->middleware('auth');

Route::get('organization/{web_name}/review-thank', [ReviewController::class,'reviewSuccess'])->name('review.success');


Route::resource('qrcode', QrCodeController::class)->middleware(['auth']);

Route::get('sticker/{web_name}', [QrCodeController::class,'sticker'])->name('sticker')->middleware(['auth']);

// Route::post('organization/{web_name}/review',function() {
//     Notification::route('telegram','4573734369')->notify(new ExampleNotification);
// });

Route::get('afadadasasa', [ReviewController::class,'getGroupChatId']);
Route::get('/upload', [RoleController::class, 'upload'])->name('your.upload.route');

// Route::group(['prefix' => 'elfinder'], function () {
//     \Barryvdh\Elfinder\Elfinder::routes();
// });
