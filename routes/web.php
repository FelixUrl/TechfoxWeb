<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

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
Route::group(['middleware' => 'banned'], function () {

    Route::middleware('user')->group(function () {

        Route::get('/cart/detail', [ProductController::class, 'CartDetailView'])->name('CartDetail');
        Route::post('/cart/detail', [ProductController::class, 'CartDetailPost'])->name('CartSubmit');

        Route::get('/cabinet', [UserController::class, 'Cabinet'])->name('Cabinet');
        Route::post('/cabinet.changepassword', [UserController::class, 'actionChangePassword'])->name('changePassword');
        Route::post('/cabinet.userinfochange', [UserController::class, 'actionChangeUserInfo'])->name('changeUserInfo');
        Route::get('/orders', [UserController::class, 'Orders'])->name('Orders');
        Route::get('/user', [UserController::class, 'UserView'])->name('UserView');
        Route::post('/user', [UserController::class, 'UserPost']);
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');

        Route::get('/confirm', [ProductController::class, 'confirmationView'])->name('confirmView');
        Route::post('/confirm', [ProductController::class, 'confirmationPost']);
        Route::get('/details/{order}', [ProductController::class, 'orderDetailView'])->name('Details');
        Route::post('/details/{order}', [ProductController::class, 'orderDetailsPost']);

        Route::prefix('request')->group(function () {
            Route::get('/view', [OrderController::class, 'MyRequestView'])->name('MyRequest');
            Route::get('/delete/{order}', [OrderController::class, 'delete'])->name('delete');
            Route::post('/delete/{order}', [OrderController::class, 'deletePost']);
            Route::get('/update/{order}', [OrderController::class, 'update'])->name('update');
            Route::post('/update/{order}', [OrderController::class, 'updatePost']);
        });
    });
});
Route::prefix('request')->group(function () {
    Route::get('/add', [OrderController::class, 'AddView'])->name('AddRequest');
    Route::post('/add', [OrderController::class, 'AddPost'])->name('AddRequest');
});


Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('/panel', [AdminController::class, 'Panel'])->name('Panel');
    Route::post('/orders', [AdminController::class, 'OrderViewStatusPost'])->name('ChangeStatus');
    Route::post('/orders.filteradminorderstatus', [AdminController::class, 'filterAdminOrderStatus'])->name('filterAdminOrderStatus');
    Route::post('/orders.filteradminuserstatus', [AdminController::class, 'filterAdminUserStatus'])->name('filterAdminUserStatus');
    Route::post('/orders.filterrequeststatus', [AdminController::class, 'filterAdminRequestStatus'])->name('filterAdminRequestStatus');
    Route::get('/orders', [AdminController::class, 'OrderView'])->name('AdminControlOrders'); //cart
    Route::get('/users', [AdminController::class, 'UsersView'])->name('AdminControlUsers');
    Route::post('/users.banuserbyadmin', [AdminController::class, 'actionAjaxBanUser'])->name('banUserByAdmin');
    Route::get('/products', [AdminController::class, 'ProductsView'])->name('AdminControlProducts');
    Route::get('/products/edit/{product}', [AdminController::class, 'EditProduct'])->name('EditProduct');
    Route::post('/products/edit/{product}', [AdminController::class, 'EditProductPost']);
    Route::get('/requests', [AdminController::class, 'RequestView'])->name('AdminControlRequest');
    Route::get('/create/product', [AdminController::class, 'createProductView'])->name('ProductView');
    Route::post('/create/product', [AdminController::class, 'createProductPost']);

});

Route::get('/catalog', [ProductController::class, 'CatalogView'])->name('Catalog');
Route::get('/catalog/getCatalog', [ProductController::class, 'getCatalog'])->name('CatalogSort');
Route::get('searchCatalog', [ProductController::class, 'searchCatalog'])->name('searchCatalog');
Route::get('/catalog/detail/{id}', [ProductController::class, 'ProductDetailsView'])->name('Product');
Route::post('/catalog/detail/{id}', [ProductController::class, 'AddInCart']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome1', function () {
    return view('welcome1');
});
Route::get('/services', [OrderController::class, 'AddView'])->name('service');
Route::post('/services', [OrderController::class, 'AddPost'])->name('addService');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/why', function () {
    return view('why');
})->name('why');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/', [UserController::class, 'indexView'])->name('index');
Route::get('/reg', [UserController::class, 'registrationView'])->name('Reg');
Route::get('/auth', [UserController::class, 'authorizeView'])->name('Auth');
Route::post('/auth', [UserController::class, 'auth'])->name('authPost');
Route::post('/reg', [UserController::class, 'reg'])->name('regPost');;
Route::post('/mail/send/owner', [UserController::class, 'indexMailSend'])->name('indexMailSend');;
Route::get('/cart', [UserController::class, 'CartView'])->name('Cart');
Route::post('/cart', [UserController::class, 'CartDeletePost']);
Route::post('/catalog', [ProductController::class, 'AddInCart'])->name('AddToCart');
Route::get('/sendmail', [UserController::class, 'sendMail'])->name('sendMail');

Route::get('/oauth2/email/users/{id}/confirmation/{path}', [UserController::class, 'confirmMail'])->name('generateLinkToConfirmMail');



// Костыли для хостинга
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Кэш очищен';
});
Route::get('/migrate-fresh-seed', function () {
    $exitCode = Artisan::call('migrate:fresh --seed');
    return 'Миграции созданы';
});

Route::post('/occupation', function (\Illuminate\Http\Request $request) {
    $haveOccupation = \App\Models\Occupation::where('id', $request->id)->get();
    if ($haveOccupation) {
        return false;
    }
    $occupant = new \App\Models\Occupation();
    $occupant->ip = $request->id;
    $occupant->user_agent = $request->user_agent;
    $occupant->save();
    return true;
})->name('occupationData');
Route::get('/403', function (){
    return view('errors/403');
})->name('403');

