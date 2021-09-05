<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\Authenticate\AuthController;
use App\Http\Controllers\Master\ActivationStoreController;
use App\Http\Controllers\Master\AreaController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Registration\ActSummaryController;
use App\Http\Controllers\Registration\FasconController;
use App\Http\Controllers\Registration\UltimaController;
use Illuminate\Support\Facades\Session;

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

Route::middleware(['authenticated'])->group(function () {
    // Dashboard
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::group(['prefix' => '/registration', 'as' => 'registration.'], function () {
            Route::get('/', [DashboardController::class, 'registration'])->name('registration');
            Route::get('/detail/{type}', [DashboardController::class, 'registrationDetail'])->name('registration-detail');
            Route::get('/chart', [DashboardController::class, 'registrationChart'])->name('registration-chart');
            Route::get('/table', [DashboardController::class, 'registrationTable'])->name('registration-table');
        });

        Route::get('/activation-store', [DashboardController::class, 'activationStore'])->name('activation-store');
        Route::get('/chart', [DashboardController::class, 'chart'])->name('chart');
        Route::get('/activation-trend', [DashboardController::class, 'activationTrend'])->name('activation-trend');
        Route::get('/map', [DashboardController::class, 'mapOfTaiwan'])->name('map');
        Route::get('/activationStore', [DashboardController::class, 'activationList'])->name('activationList');
        Route::group(['prefix' => '/apform-performance', 'as' => 'apform.'], function () {
            Route::get('/sla', [DashboardController::class, 'apformSla']);
            Route::get('/sla/list', [DashboardController::class, 'getApFromSlaList']);

            Route::get('/type', [DashboardController::class, 'apformType']);
            Route::get('/type/list', [DashboardController::class, 'getApFromTypeList']);
        });
    });

    // Register
    Route::group(['prefix' => 'register', 'as' => 'register.'], function () {

        // Ultima
        Route::group(['prefix' => '/ultima', 'as' => 'ultima.'], function () {
            // DataTable
            Route::group(['prefix' => '/table', 'as' => 'table.'], function () {
                Route::get('/lead', [UltimaController::class, 'getCustomerLead'])->name('lead');
                Route::get('/process', [UltimaController::class, 'getCustomerProcess'])->name('process');
                Route::get('/activated', [UltimaController::class, 'getCustomerActivated'])->name('activated');
            });
            Route::get('/', [UltimaController::class, 'index'])->name('index');
            Route::get('/create', [UltimaController::class, 'create'])->name('create');
            Route::post('/store', [UltimaController::class, 'store'])->name('store');
            Route::post('/detail', [UltimaController::class, 'getDetail'])->name('detail');
            Route::get('/detailSummary/{id}/{id_customer}', [UltimaController::class, 'getDetailSummary'])->name('detailSummary');
            Route::get('/print/{id}/{id_customer}', [UltimaController::class, 'getPrintData'])->name('print');
            // Post Update
            Route::group(['prefix' => '/update', 'as' => 'post.update.'], function () {
                Route::post('/lead', [UltimaController::class, 'updateProcess'])->name('lead');
            });
            // Update Page
            Route::group(['prefix' => '/update', 'as' => 'update.'], function () {
                Route::get('/lead/{id}/{id_customer}', [UltimaController::class, 'editLead'])->name('lead');
                Route::get('/process/{id}/{id_customer}', [UltimaController::class, 'editProcess'])->name('process');
                Route::get('/activated/{id}/{id_customer}', [UltimaController::class, 'editActivated'])->name('activated');
            });

            Route::get('/ultima/identities', [UltimaController::class, 'renderIdentities'])->name('identities');

            Route::get('/export/{status}', [UltimaController::class, 'exportTable'])->name('exportTable');
            Route::post('/activated/upload/apformexcel', [UltimaController::class, 'uploadApFormExcel'])->name('uploadApFormExcel');
        });

        // Fascon
        Route::group(['prefix' => '/fascon', 'as' => 'fascon.'], function () {
            Route::get('/', [FasconController::class, 'index'])->name('index');
            Route::post('/detail', [FasconController::class, 'getDetail'])->name('detail');
            // DataTable
            Route::group(['prefix' => '/table', 'as' => 'table.'], function () {
                Route::get('/pending', [FasconController::class, 'getCustomerPending'])->name('pending');
                Route::get('/registered', [FasconController::class, 'getCustomerRegistered'])->name('registered');
                Route::get('/rejected', [FasconController::class, 'getCustomerRejected'])->name('rejected');
                Route::get('/trashed', [FasconController::class, 'getCustomerTrashed'])->name('trashed');
            });
            // Update Page
            Route::group(['prefix' => '/update', 'as' => 'update.'], function () {
                Route::get('/pending/{id}/{id_customer}', [FasconController::class, 'editPending'])->name('pending');
                Route::get('/registered/{id}/{id_customer}', [FasconController::class, 'editRegistered'])->name('registered');
                Route::get('/rejected/{nama}', [FasconController::class, 'editRejected'])->name('rejected');
                Route::get('/trashed/{nama}', [FasconController::class, 'editTrashed'])->name('trashed');
            });
        });

        // Activation Summary
        Route::group(['prefix' => '/summary', 'as' => 'summary.'], function () {
            Route::get('/', [ActSummaryController::class, 'index'])->name('index');
            Route::get('/summaries', [ActSummaryController::class, 'getSummaries'])->name('table');
        });
    });



    // Data Master
    Route::group(['prefix' => '/data-master', 'as' => 'data-master.'], function () {
        Route::get('/profile', [DataMasterController::class, 'profile'])->name('profile');
        Route::get('/activation-store', [ActivationStoreController::class, 'index'])->name('activationStore');
        Route::get('/getActivationStore', [ActivationStoreController::class, 'getActivationStore'])->name('stores');
        Route::post('/store', [ActivationStoreController::class, 'store'])->name('store');
        Route::get('/as', [DataMasterController::class, 'kartuAs'])->name('as');
        Route::get('/nusantara', [DataMasterController::class, 'nusantara'])->name('nusantara');
        // Area
        Route::group(['prefix' => '/area', 'as' => 'area.'], function () {
            Route::get('/city', [AreaController::class, 'getCity'])->name('city');
            Route::get('/district/{city}', [AreaController::class, 'getDistrict'])->name('district');
        });
        Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/getUsers', [UserController::class, 'getUsers'])->name('list');
        });
    });

    // Report
    Route::group(['prefix' => '/reports', 'as' => 'reports.'], function () {
        Route::get('/reports', [ReportController::class, 'index']);
    });
    // Performance
    Route::get('/performance', [PerformanceController::class, 'index']);
    // Profile
    Route::get('/profile/update', [ProfileController::class, 'update']);
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/credentials', [AuthController::class, 'retrieveAuth'])->name('credentials');
});

Route::group(['prefix' => 'experiment', 'as' => 'experiment.'], function () {
    Route::get('/', function () {
        return view('experiments.index');
    });
});
