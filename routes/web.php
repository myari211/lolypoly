<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DYOCController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\landingpageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('lolypoly.home');

Route::get('/email-verification/{id}', [\App\Http\Controllers\Admin\Auth\RegisterController::class, 'emailVerification'])->name('email-verification');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'index'])->name('login');
    Route::get('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::post('/check-login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'checkLogin'])->name('check-login');
    Route::post('/check-register', [\App\Http\Controllers\Admin\Auth\RegisterController::class, 'checkRegister'])->name('check-register');
    Route::post('/forgot-password', [\App\Http\Controllers\Admin\Auth\RegisterController::class, 'forgotPassword'])->name('forgot-password');

    Route::group(['middleware' => 'auth'], function () {
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
            Route::post('/data/bestSelling', [\App\Http\Controllers\Admin\DashboardController::class, 'bestSellingCategory'])->name('dashboard.data');
            Route::post('/data/statistic', [\App\Http\Controllers\Admin\DashboardController::class, 'transactionStatistic'])->name('dashboard.statistic');
        });

        Route::group(['prefix' => 'public_button'], function() {
            Route::get('/', [App\Http\Controllers\Admin\PublicButtonController::class, 'index'])->name('public_buttons.index');
            Route::post('/create', [App\Http\Controllers\Admin\PublicButtonController::class, 'create'])->name('public_buttons.create');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\PublicButtonController::class, 'update'])->name('public_buttons.update');
            Route::post('/delete/{id}', [App\Http\Controllers\Admin\PublicButtonController::class, 'delete'])->name('public_buttons.delete');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\PorductController::class, 'index'])->name('product.index');
            Route::get('/create', [\App\Http\Controllers\Admin\PorductController::class, 'create'])->name('product.create');
            Route::post('/store', [\App\Http\Controllers\Admin\PorductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\Admin\PorductController::class, 'edit'])->name('product.edit');
            Route::get('/editvarian/{id}', [\App\Http\Controllers\Admin\PorductController::class, 'editvarian'])->name('product.editvarian');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\PorductController::class, 'destroy'])->name('product.destroy');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\PorductController::class, 'delete'])->name('product.delete');
            Route::post('/update/{id}', [\App\Http\Controllers\Admin\PorductController::class, 'update'])->name('product.update');
            Route::get('/getAll', [\App\Http\Controllers\Admin\PorductController::class, 'getAll'])->name('product.getAll');
            Route::get('/getAllVarian/{id}', [\App\Http\Controllers\Admin\PorductController::class, 'getAllVarian'])->name('product.getAllVarian');
            Route::post('/hasVariant', [\App\Http\Controllers\Admin\PorductController::class, 'hasVariant'])->name('product.hasVariant');
            Route::post('/addVariant', [\App\Http\Controllers\Admin\PorductController::class, 'addVariant'])->name('product.addVariant');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::group(['prefix' => 'custom'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\PorductCustomController::class, 'index'])->name('product.custom.index');
                Route::get('/create', [\App\Http\Controllers\Admin\PorductCustomController::class, 'create'])->name('product.custom.create');
                Route::post('/store', [\App\Http\Controllers\Admin\PorductCustomController::class, 'store'])->name('product.custom.store');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\PorductCustomController::class, 'edit'])->name('product.custom.edit');
                Route::get('/editvarian/{id}', [\App\Http\Controllers\Admin\PorductCustomController::class, 'editvarian'])->name('product.custom.editvarian');
                Route::delete('/{id}', [\App\Http\Controllers\Admin\PorductCustomController::class, 'destroy'])->name('product.custom.destroy');
                Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\PorductCustomController::class, 'delete'])->name('product.custom.delete');
                Route::post('/update/{id}', [\App\Http\Controllers\Admin\PorductCustomController::class, 'update'])->name('product.custom.update');
                Route::get('/getAll', [\App\Http\Controllers\Admin\PorductCustomController::class, 'getAll'])->name('product.custom.getAll');
                Route::get('/getAllVarian/{id}', [\App\Http\Controllers\Admin\PorductCustomController::class, 'getAllVarian'])->name('product.custom.getAllVarian');
                Route::post('/hasVariant', [\App\Http\Controllers\Admin\PorductCustomController::class, 'hasVariant'])->name('product.custom.hasVariant');
                Route::post('/addVariant', [\App\Http\Controllers\Admin\PorductCustomController::class, 'addVariant'])->name('product.custom.addVariant');
            });
        });
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.index');
            Route::post('/store', [\App\Http\Controllers\Admin\ProfileController::class, 'store'])->name('profile.store');
            Route::get('/change-password', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.change-password');
        });
        Route::group(['prefix' => 'change_password'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'index'])->name('change_password.index');
            Route::post('/store', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'store'])->name('change_password.store');
            Route::get('/change-password', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'index'])->name('change_password.change-password');
        });
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
            Route::get('/edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
            Route::delete('/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
            Route::get('/getAll', [\App\Http\Controllers\Admin\UserController::class, 'getAll'])->name('users.getAll');
            Route::post('/store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        });
        Route::group(['prefix' => 'roles'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles.index');
            Route::get('/edit/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('roles.edit');
            Route::delete('/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy');
            Route::get('/getAll', [\App\Http\Controllers\Admin\RoleController::class, 'getAll'])->name('roles.getAll');
            Route::post('/store', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
        });
        Route::group(['prefix' => 'menus'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\MenuController::class, 'index'])->name('menus.index');
            Route::get('/edit/{id}', [\App\Http\Controllers\Admin\MenuController::class, 'edit'])->name('menus.edit');
            Route::delete('/{id}', [App\Http\Controllers\Admin\MenuController::class, 'destroy'])->name('menus.destroy');
            Route::get('/getAll', [\App\Http\Controllers\Admin\MenuController::class, 'getAll'])->name('menus.getAll');
            Route::post('/store', [\App\Http\Controllers\Admin\MenuController::class, 'store'])->name('menus.store');
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('setting.index');
            Route::post('/storeGeneral', [\App\Http\Controllers\Admin\SettingController::class, 'storeGeneral'])->name('setting.storeGeneral');
            Route::post('/storeHome', [\App\Http\Controllers\Admin\SettingController::class, 'storeHome'])->name('setting.storeHome');
            Route::post('/storeAboutus', [\App\Http\Controllers\Admin\SettingController::class, 'storeAboutus'])->name('setting.storeAboutus');
            // Route::post('/store', [\App\Http\Controllers\Admin\SettingController::class, 'store'])->name('setting.store');
        });
        Route::group(['prefix' => 'article'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('article.index');
            Route::get('/edit/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('article.edit');
            Route::delete('/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'destroy'])->name('article.destroy');
            Route::get('/getAll', [\App\Http\Controllers\Admin\ArticleController::class, 'getAll'])->name('article.getAll');
            Route::post('/store', [\App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('article.store');
        });


        Route::group(['prefix' => 'transaction'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transaction.index');
            Route::get('/edit/{id}', [\App\Http\Controllers\Admin\TransactionController::class, 'edit'])->name('transaction.edit');
            Route::get('/view/{id}', [\App\Http\Controllers\Admin\TransactionController::class, 'view'])->name('transaction.view');
            Route::delete('/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'destroy'])->name('transaction.destroy');
            Route::get('/getAll', [\App\Http\Controllers\Admin\TransactionController::class, 'getAll'])->name('transaction.getAll');
            Route::post('/store', [\App\Http\Controllers\Admin\TransactionController::class, 'store'])->name('transaction.store');

            Route::group(['prefix' => 'packing'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\PackingController::class, 'index'])->name('transaction.packing.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\PackingController::class, 'edit'])->name('transaction.packing.edit');
                Route::get('/view/{id}', [\App\Http\Controllers\Admin\PackingController::class, 'view'])->name('transaction.packing.view');
                Route::delete('/{id}', [App\Http\Controllers\Admin\PackingController::class, 'destroy'])->name('transaction.packing.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\PackingController::class, 'getAll'])->name('transaction.packing.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\PackingController::class, 'store'])->name('transaction.packing.store');
            });

            Route::group(['prefix' => 'shipping'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\ShippingController::class, 'index'])->name('transaction.shipping.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\ShippingController::class, 'edit'])->name('transaction.shipping.edit');
                Route::get('/view/{id}', [\App\Http\Controllers\Admin\ShippingController::class, 'view'])->name('transaction.shipping.view');
                Route::delete('/{id}', [App\Http\Controllers\Admin\ShippingController::class, 'destroy'])->name('transaction.shipping.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\ShippingController::class, 'getAll'])->name('transaction.shipping.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\ShippingController::class, 'store'])->name('transaction.shipping.store');
            });

            Route::group(['prefix' => 'tracking'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\TrackingController::class, 'index'])->name('transaction.tracking.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\TrackingController::class, 'edit'])->name('transaction.tracking.edit');
                Route::get('/view/{id}', [\App\Http\Controllers\Admin\TrackingController::class, 'view'])->name('transaction.tracking.view');
                Route::delete('/{id}', [App\Http\Controllers\Admin\TrackingController::class, 'destroy'])->name('transaction.tracking.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\TrackingController::class, 'getAll'])->name('transaction.tracking.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\TrackingController::class, 'store'])->name('transaction.tracking.store');
            });

            Route::group(['prefix' => 'done'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\DoneController::class, 'index'])->name('transaction.done.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\DoneController::class, 'edit'])->name('transaction.done.edit');
                Route::get('/view/{id}', [\App\Http\Controllers\Admin\DoneController::class, 'view'])->name('transaction.done.view');
                Route::delete('/{id}', [App\Http\Controllers\Admin\DoneController::class, 'destroy'])->name('transaction.done.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\DoneController::class, 'getAll'])->name('transaction.done.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\DoneController::class, 'store'])->name('transaction.done.store');
            });

            Route::group(['prefix' => 'cancel'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\CancelController::class, 'index'])->name('transaction.cancel.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\CancelController::class, 'edit'])->name('transaction.cancel.edit');
                Route::get('/view/{id}', [\App\Http\Controllers\Admin\CancelController::class, 'view'])->name('transaction.cancel.view');
                Route::delete('/{id}', [App\Http\Controllers\Admin\CancelController::class, 'destroy'])->name('transaction.cancel.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\CancelController::class, 'getAll'])->name('transaction.cancel.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\CancelController::class, 'store'])->name('transaction.cancel.store');
            });

            Route::group(['prefix' => 'pickupstore'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\PickupStoreController::class, 'index'])->name('transaction.pickupstore.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\PickupStoreController::class, 'edit'])->name('transaction.pickupstore.edit');
                Route::get('/view/{id}', [\App\Http\Controllers\Admin\PickupStoreController::class, 'view'])->name('transaction.pickupstore.view');
                Route::delete('/{id}', [App\Http\Controllers\Admin\PickupStoreController::class, 'destroy'])->name('transaction.pickupstore.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\PickupStoreController::class, 'getAll'])->name('transaction.pickupstore.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\PickupStoreController::class, 'store'])->name('transaction.pickupstore.store');
            });
        });

        Route::group(['prefix' => 'master'], function () {
            Route::group(['prefix' => 'type'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\TypeController::class, 'index'])->name('type.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\TypeController::class, 'edit'])->name('type.edit');
                Route::delete('/{id}', [App\Http\Controllers\Admin\TypeController::class, 'destroy'])->name('type.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\TypeController::class, 'getAll'])->name('type.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\TypeController::class, 'store'])->name('type.store');
            });
            Route::group(['prefix' => 'category'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
                Route::delete('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\CategoryController::class, 'getAll'])->name('category.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
            });
            Route::group(['prefix' => 'brand'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\BrandController::class, 'index'])->name('brand.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'edit'])->name('brand.edit');
                Route::delete('/{id}', [App\Http\Controllers\Admin\BrandController::class, 'destroy'])->name('brand.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\BrandController::class, 'getAll'])->name('brand.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\BrandController::class, 'store'])->name('brand.store');
            });
            Route::group(['prefix' => 'store'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\StoreController::class, 'index'])->name('store.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\StoreController::class, 'edit'])->name('store.edit');
                Route::delete('/{id}', [App\Http\Controllers\Admin\StoreController::class, 'destroy'])->name('store.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\StoreController::class, 'getAll'])->name('store.getAll');
                Route::post('/store', [\App\Http\Controllers\Admin\StoreController::class, 'store'])->name('store.store');
            });
            Route::group(['prefix' => 'slider'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\SliderController::class, 'index'])->name('slider.index');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'edit'])->name('slider.edit');
                Route::delete('/{id}', [App\Http\Controllers\Admin\SliderController::class, 'destroy'])->name('slider.destroy');
                Route::get('/getAll', [\App\Http\Controllers\Admin\SliderController::class, 'getAll'])->name('slider.getAll');
                Route::get('/create', [\App\Http\Controllers\Admin\SliderController::class, 'create'])->name('slider.create');
                Route::post('/store', [\App\Http\Controllers\Admin\SliderController::class, 'store'])->name('slider.store');
                Route::post('/update/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'update'])->name('slider.update');
            });
            Route::group(['prefix' => 'promo'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\PromoController::class, 'index'])->name('promo.index');
                Route::get('/getAll', [\App\Http\Controllers\Admin\PromoController::class, 'getAll'])->name('promo.getAll');
                Route::post('/popupedit', [\App\Http\Controllers\Admin\PromoController::class, 'updatePopup'])->name('promo.popup');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\PromoController::class, 'edit'])->name('promo.edit');
                Route::delete('/{id}', [App\Http\Controllers\Admin\PromoController::class, 'destroy'])->name('promo.destroy');
                Route::get('/create', [\App\Http\Controllers\Admin\PromoController::class, 'create'])->name('promo.create');
                Route::post('/store', [\App\Http\Controllers\Admin\PromoController::class, 'store'])->name('promo.store');
                Route::post('/update/{id}', [\App\Http\Controllers\Admin\PromoController::class, 'update'])->name('promo.update');
            });
            Route::group(['prefix' => 'testimonial'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('testimonial.index');
                Route::get('/getAll', [\App\Http\Controllers\Admin\TestimonialController::class, 'getAll'])->name('testimonial.getAll');
                Route::post('/popupedit', [\App\Http\Controllers\Admin\TestimonialController::class, 'updatePopup'])->name('testimonial.popup');
                Route::get('/edit/{id}', [\App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('testimonial.edit');
                Route::delete('/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('testimonial.destroy');
                Route::get('/create', [\App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('testimonial.create');
                Route::post('/store', [\App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('testimonial.store');
                Route::post('/update/{id}', [\App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('testimonial.update');
            });
            Route::group(['prefix' => 'customer'], function () {
                Route::get('/', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customer.index');
                Route::get('/getAll', [\App\Http\Controllers\Admin\CustomerController::class, 'getAll'])->name('customer.getAll');
                Route::get('/detail/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'detail'])->name('customer.detail');
            });
        });
    });
});

Route::post('/add/customer/promos', [\App\Http\Controllers\Admin\PromoController::class, 'addCustomerPromos'])->name('promo.addtocustomer');

Route::get('/shopping/{id?}/{page?}/{name?}', [ShoppingController::class, 'index'])->name('lolypoly.shopping');
Route::post('/product/shopping', [ShoppingController::class, 'productShopping'])->name('lolypoly.product.shopping');

Route::get('/checkout', [ShoppingController::class, 'checkoutIndex'])->name('lolypoly.checkout');
Route::post('/checkout/store', [ShoppingController::class, 'checkoutStore'])->name('lolypoly.checkout.store');

Route::get('/delivery/{address}', [DeliveryController::class, 'delivery'])->name('lolypoly.delivery');
Route::post('/calculate', [DeliveryController::class, 'calculate'])->name('lolypoly.delivery.calculate');
Route::get('/checkOrder', [DeliveryController::class, 'checkOrder'])->name('lolypoly.delivery.checkOrder');

Route::get('/shipping', [ShoppingController::class, 'shippingIndex'])->name('lolypoly.shipping');
Route::post('/checkout/shipping', [ShoppingController::class, 'checkoutshippingIndex'])->name('lolypoly.checkout.shipping');
Route::get('/calculatePromo/{id}', [ShoppingController::class, 'calculatePromo'])->name('lolypoly.calculatepromo');

Route::get('/product-detail/{id}', [ProductController::class, 'index'])->name('lolypoly.product.detail');

Route::get('/productVariant/{id}', [ProductController::class, 'productVariant'])->name('lolypoly.product.variant');

Route::get('/about-us', [HomeController::class, 'aboutUsIndex'])->name('lolypoly.about.us');
Route::get('/promo/page/{id?}', [HomeController::class, 'landingPagePromoIndex'])->name('lolypoly.promo.detail');

Route::get('/find-us', [StoreController::class, 'index'])->name('lolypoly.find.us');
Route::post('/find-us', [StoreController::class, 'index'])->name('lolypoly.find.us');

Route::post('/payment', [PaymentController::class, 'payment'])->name('lolypoly.payment');
Route::get('/paymentStatus', [PaymentController::class, 'paymentStatus'])->name('lolypoly.paymentStatus');
Route::get('/paymentStatusUpdate', [PaymentController::class, 'paymentStatusUpdate'])->name('lolypoly.paymentStatusUpdate');
Route::get('/email-payment', [PaymentController::class, 'emailPayment'])->name('email-payment');

Route::post('/addToCart', [CartController::class, 'addToCart'])->name('lolypoly.cart');
Route::post('/cartGuest', [CartController::class, 'cartGuest'])->name('lolypoly.cart.guest');
Route::post('/addQtyCartGuest', [CartController::class, 'addQtyCartGuest'])->name('lolypoly.cart.addQtyGuest');
Route::post('/addQtyCart', [CartController::class, 'addQtyCart'])->name('lolypoly.cart.addQty');
Route::post('/deleteCart', [CartController::class, 'deleteCart'])->name('lolypoly.cart.delete');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', [AccountController::class, 'index'])->name('lolypoly.account');
    Route::post('/account/bio/edit/{id}', [AccountController::class, 'editBio'])->name('bio.edit');
    Route::post('/account/profilePict', [AccountController::class, 'profilePict'])->name('account.profilepict');
    Route::post('/account/address/create', [AccountController::class, 'createAddress'])->name('address.add');
    Route::post('/account/address/get/{id}', [AccountController::class, 'getAddress'])->name('address.get');
    Route::post('/account/address/edit/{id}', [AccountController::class, 'editAddress'])->name('address.edit');
    Route::post('/account/address/delete/{id}', [AccountController::class, 'deleteAddress'])->name('address.delete');
    Route::post('/account/updatepass', [AccountController::class, 'updatepass'])->name('change.password');
    Route::post('/account/transaction/history', [AccountController::class, 'transactionHistory'])->name('transaction.history');
    Route::post('/account/transaction/detail', [AccountController::class, 'transactionDetail'])->name('transaction.detail');
    Route::post('/account/transaction/pickedup', [AccountController::class, 'transactionPickedUp'])->name('transaction.pickedup');
});

Route::group(['prefix' => 'area'], function () {
    Route::post('/provinsi', [WilayahController::class, 'getProvinsi'])->name('area.provinsi');
    Route::post('/provinsi/store', [WilayahController::class, 'getProvinsiStore'])->name('area.provinsi.store');
    Route::post('/kabupaten-kota', [WilayahController::class, 'getKabupatenKota'])->name('area.kabupaten_kota');
    Route::post('/kabupaten-kota/store', [WilayahController::class, 'getKabupatenKotaStore'])->name('area.kabupaten_kota.store');
    Route::post('/kecamatan', [WilayahController::class, 'getKecamatan'])->name('area.kecamatan');
    Route::post('/kelurahan-desa', [WilayahController::class, 'getKelurahanDesa'])->name('area.kelurahan_desa');
});

Route::get('/change-password/{id}', [\App\Http\Controllers\Admin\Auth\RegisterController::class, 'changePasswordIndex'])->name('change.password.index');
Route::post('/forgot/change/password', [RegisterController::class, 'changePassword'])->name('forgot.change.password');

Route::get('/design-your-own-case', [DYOCController::class, 'index'])->name('lolypoly.dyoc.index');
Route::post('/design-your-own-case/get-type-by-brand', [DYOCController::class, 'getTypeByBrand'])->name('lolypoly.dyoc.type');
Route::post('/design-your-own-case/get-case-by-type', [DYOCController::class, 'getCaseByType'])->name('lolypoly.dyoc.case');
Route::get('/landing-page/{id}', [App\Http\Controllers\LandingpageController::class, 'index'])->name('lolypoly.landing.page');

//soon change use AUTH
Route::prefix('temporary')->group(function() {
    Route::prefix('public_button')->group(function() {
        Route::post('create', [App\Http\Controllers\Admin\PublicButtonController::class, 'create'])->name('public.public_button.create');
        Route::post('by_id/{id}', [App\Http\Controllers\Admin\PublicButtonController::class, 'by_id'])->name('public.public_button.by_id');
        Route::post('update/{id}', [App\Http\Controllers\Admin\PublicButtonController::class, 'update'])->name('public.public_buton.update');
        Route::post('delete/{id}', [App\Http\Controllers\Admin\PublicButtonController::class, 'delete'])->name('public.public_button.delete');
    });
});
