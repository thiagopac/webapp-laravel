<?php

use App\Http\Controllers\Account\BankingController;
use App\Http\Controllers\Account\PaymentMethodsController;
use App\Http\Controllers\Account\PoliciesController;
use App\Http\Controllers\Account\SecurityController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Bill\HistoryController;
use App\Http\Controllers\Bill\OwnershipController;
use App\Http\Controllers\Bill\PayController;
use App\Http\Controllers\General\BalanceController;
use App\Http\Controllers\General\StatementController;
use App\Http\Controllers\General\WalletController;
use App\Http\Controllers\Manage\AuditLogsController;
use App\Http\Controllers\Manage\PermissionsController;
use App\Http\Controllers\Manage\RolesController;
use App\Http\Controllers\Manage\SystemLogsController;
use App\Http\Controllers\Manage\TransactionManagerController;
use App\Http\Controllers\Manage\UsersController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Operation\ConvertController;
use App\Http\Controllers\Operation\NegotiateController;
use App\Http\Controllers\Operation\PlanController;
use App\Http\Controllers\Operation\WithdrawController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Support\ContactController;
use App\Http\Controllers\Support\FaqController;
use App\Http\Controllers\Support\FeesController;
use App\Http\Controllers\Support\TopicsController;
use App\Http\Controllers\Support\TutorialsController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

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


$menu = theme()->getMenu();

array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        $route->middleware('auth');
    }
});

//webhooks
Route::prefix('webhook')->group(function () {
    Route::post('tx', [WebhookController::class, 'tx'])->name('webhook.tx');
    Route::post('new-wallet', [WebhookController::class, 'newWallet'])->name('webhook.newWallet');
});

Route::middleware('auth')->group(function () {

    //Notification routes
    Route::post('mark-as-read', [NotificationController::class, 'markAsRead'])->name('notification.markAsRead');

    //General pages
    Route::prefix('general')->group(function () {

        /**---------------------------------------------------------------------------------------------------------**/

        //wallet
        Route::get('wallet', [WalletController::class, 'index'])->name('wallet.index');
        Route::get('wallet/list-transactions/{page?}', [WalletController::class, 'listTransactions'])->name('wallet.listTransactions');

        /**---------------------------------------------------------------------------------------------------------**/

        //balance
        Route::get('balance', [BalanceController::class, 'index'])->name('balance.index');

        /**---------------------------------------------------------------------------------------------------------**/
        //usage statement

        Route::get('statement', [StatementController::class, 'index'])->name('statement.index');

    });

    //Operations pages
    Route::prefix('operations')->group(function () {

        /**---------------------------------------------------------------------------------------------------------**/

        //convert
        Route::get('convert', [ConvertController::class, 'index'])->name('convert.index');
        Route::post('convert/transact', [ConvertController::class, 'createTransaction'])->name('convert.createTransaction');

        /**---------------------------------------------------------------------------------------------------------**/

        //negotiate
        Route::get('negotiate/purchase', [NegotiateController::class, 'purchase'])->name('negotiate.purchase');
        Route::post('negotiate/purchase', [NegotiateController::class, 'createPurchaseTransaction'])->name('negotiate.createPurchaseTransaction');

        Route::get('negotiate/sale', [NegotiateController::class, 'sale'])->name('negotiate.sale');
        Route::post('negotiate/sale', [NegotiateController::class, 'createSaleTransaction'])->name('negotiate.createSaleTransaction');

        /**---------------------------------------------------------------------------------------------------------**/

        //withdraw
        Route::get('withdraw', [WithdrawController::class, 'index'])->name('withdraw.index');
        Route::post('withdraw/transact', [WithdrawController::class, 'createTransaction'])->name('withdraw.createTransaction');

        /**---------------------------------------------------------------------------------------------------------**/

        //plan
        Route::get('plan', [PlanController::class, 'index'])->name('plan.index');

    });

    //Bill pages
    Route::prefix('bill')->group(function () {

        /**---------------------------------------------------------------------------------------------------------**/

        //history
        Route::resource('history', HistoryController::class)->only(['index']);


        /**---------------------------------------------------------------------------------------------------------**/

        //pay
        Route::get('pay', [PayController::class, 'index'])->name('pay.index');
        Route::post('pay', [PayController::class, 'invoicePay'])->name('pay.invoicePay');
        Route::get('pay/method', [PayController::class, 'method'])->name('pay.method');
        Route::get('pay/manually/{invoicepayment:uuid}', [PayController::class, 'manually'])->name('pay.manually');
        Route::get('pay/detect/{invoicepayment:uuid}', [PayController::class, 'detect'])->name('pay.detect');

        /**---------------------------------------------------------------------------------------------------------**/

        //ownership
        Route::resource('ownership', OwnershipController::class);

    });

    //dependent select route
    Route::get('dependent-select/{model}/{select}/{wherefield?}/{wherevalue?}/{orderby?}', function (String $model, String $select, String $wherefield = '1', String $wherevalue = '1', String $orderby = '1 asc'){
        return  (!in_array("$model", ['states', 'cities'])) ? 'not allowed' : DB::select("SELECT $select FROM $model WHERE $wherefield = $wherevalue ORDER BY $orderby");
    });

    //Support pages
    Route::prefix('support')->group(function () {

        /**---------------------------------------------------------------------------------------------------------**/

        //topics
        Route::get('topics', [TopicsController::class, 'index'])->name('topics.index');
        Route::get('topics/{topic}', [TopicsController::class, 'topic'])->name('topics.topic');

        /**---------------------------------------------------------------------------------------------------------**/

        //tutorials
        Route::get('tutorials', [TutorialsController::class, 'index'])->name('tutorials.index');

        /**---------------------------------------------------------------------------------------------------------**/

        //faq
        Route::get('faq', [FaqController::class, 'index'])->name('faq.index');

        /**---------------------------------------------------------------------------------------------------------**/

        //fees
        Route::get('fees', [FeesController::class, 'index'])->name('fees.index');

        /**---------------------------------------------------------------------------------------------------------**/

        //contact
        Route::get('contact', [ContactController::class, 'index'])->name('contact.index');


    });

    //Account pages
    Route::prefix('account')->group(function () {

        /**---------------------------------------------------------------------------------------------------------**/

        //overview
        Route::get('overview', [SettingsController::class, 'index'])->name('overview.index');

        /**---------------------------------------------------------------------------------------------------------**/

        //settings
        Route::get('settings', [SettingsController::class, 'settings'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');

        /**---------------------------------------------------------------------------------------------------------**/

        //security
        Route::get('security', [SecurityController::class, 'security'])->name('security.index');
        Route::put('security/email', [SecurityController::class, 'changeEmail'])->name('security.changeEmail');
        Route::put('security/password', [SecurityController::class, 'changePassword'])->name('security.changePassword');

        /**---------------------------------------------------------------------------------------------------------**/

        //banking
        Route::resource('banking', BankingController::class);

        /**---------------------------------------------------------------------------------------------------------**/

        //payment
        Route::resource('payment', PaymentMethodsController::class);

        /**---------------------------------------------------------------------------------------------------------**/

        //policies
        Route::get('policies', [PoliciesController::class, 'index'])->name('policies.index');
    });

    // Logs pages
    Route::prefix('manage')->group(function () {
        Route::resource('transactions', TransactionManagerController::class)->only(['index']);
        Route::get('transaction/{transaction:uuid}', [TransactionManagerController::class, 'view'])->name('transaction.view');
        Route::get('transaction/event/{exchangeevent:uuid}', [TransactionManagerController::class, 'retrieveEvent'])->name('transaction.retrieveEvent');
        Route::put('transaction/event', [TransactionManagerController::class, 'triggerEvent'])->name('transaction.triggerEvent');
        Route::get('transaction/event/showerror/{exchangeevent:uuid}', [TransactionManagerController::class, 'showErrorModal'])->name('transaction.showErrorModal');

        Route::put('transactions/{transaction:uuid}/control', [TransactionManagerController::class, 'control'])->name('transactions.control');

        Route::resource('activities', AuditLogsController::class)->only(['index']);
        Route::resource('system', SystemLogsController::class)->only(['index']);

        Route::resource('users', UsersController::class)->only(['index']);
        Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('users/{user:uuid}/update', [UsersController::class, 'update'])->name('users.update');
        Route::get('users/add', [UsersController::class, 'add'])->name('users.add');
        Route::post('users/create', [UsersController::class, 'create'])->name('users.create');


        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });

//    Route::resource('users', UsersController::class);

});

require __DIR__.'/auth.php';
