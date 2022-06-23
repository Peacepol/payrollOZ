<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientLoginController;
use App\Http\Controllers\companylistController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PayAccumulatorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeePFileController;
use App\Http\Controllers\LoanController;

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

//Route::get('/{tenantcode}', 'PagesController@loadPage')->middleware(['tenantdb']);
Route::get( '/', function () {
    return view( 'welcome');
});

Route::get('/home',[clientLoginController::class, 'home']);
// Displayy Client code page
Route::get('/clientlogin',[clientLoginController::class, 'index'])->name('clientlogin');
Route::post('/getclientcode',[clientLoginController::class, 'getClientCode']);
Route::get('/{tenantcode}/FlagFilter/{filter}',[EmployeePFileController::class, 'FlagFilter'])->middleware(['tenantdb','authclient']);
Route::get('{tenantcode}/getCompanyList',[companylistController::class, 'getCompanies']);
Route::get('/{tenantcode}/getCompany/{id}',[companylistController::class, 'getCompany']);
Route::get('/{tenantcode}/getCompanyDeps/{id}',[companylistController::class, 'getCompanyDeps']);
Route::get('/{tenantcode}/getComp/{id}',[companylistController::class, 'getComp']);
Route::get('/{tenantcode}/getCompanyPayLocation/{id}',[companylistController::class, 'getCompanyPayLocation']);
Route::get('/{tenantcode}/getFlagCompany/{id}',[companylistController::class, 'getFlagCompany']);

Route::get( '{tenantcode}/home', function () {
    return view( 'home');
})->middleware(['tenantdb','authclient']);

Route::get('/{tenantcode}/company/getCompanyList',[CompaniesController::class,'getCompanyList'])->middleware(['tenantdb','authclient']);
Route::get('/{tenantcode}/branch/getBranchList',[BranchController::class,'getBranchList'])->middleware(['tenantdb']);
Route::get('/{tenantcode}/department/getDepartmentList',[DepartmentController::class,'getDepartmentList'])->middleware(['tenantdb','authclient']);
Route::get('/{tenantcode}/PayAccumulator/getAccumulators',[PayAccumulatorController::class,'getAccumulators'])->middleware(['tenantdb','authclient']);
// CRUD pages
Route::post('/{tenantcode}/emploan/payloan',[LoanController::class,'payloan'])->name('emploan.payloan')->middleware(['tenantdb','authclient']);
Route::get('{tenantcode}/company',[CompaniesController::class, 'index'])->name('company.index')->middleware(['tenantdb','authclient']);
Route::get('{tenantcode}/company/{id}/show',[CompaniesController::class,'show'])->name('company.show')->middleware(['tenantdb','authclient']);
Route::get('{tenantcode}/company/create',[CompaniesController::class, 'create'])->name('company.create')->middleware(['tenantdb','authclient']);
Route::post('{tenantcode}/company/store',[CompaniesController::class, 'store'])->name('company.store')->middleware(['tenantdb','authclient']);
Route::get('{tenantcode}/company/{company}/edit',[CompaniesController::class, 'edit'])->name('company.edit')->middleware(['tenantdb','authclient']);
Route::post('{tenantcode}/company/{company}/update',[CompaniesController::class, 'update'])->name('company.update')->middleware(['tenantdb','authclient']);
Route::post('{tenantcode}/company/{company}/destroy',[CompaniesController::class, 'destroy'])->name('company.destroy')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/branch','BranchController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/costcentre','CostCentreController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/PayBatch','PayBatchController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/PayLocation','PayLocationController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/PayAccumulator','PayAccumulatorController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/department','DepartmentController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/customref1','CustomReference1Controller')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/customref2','CustomReference2Controller')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/customref3','CustomReference3Controller')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/payitem','PayItemController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/SuperFunds','SuperFundsController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/employee','EmployeeController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/employeefile','EmployeeFileController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/employeeflag','EmployeePFileController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/empposition','EmployeePositionController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/empstatus','EmployeeStatusController')->middleware(['tenantdb','authclient']);
Route::resource('/{tenantcode}/emploan','LoanController')->middleware(['tenantdb','authclient']);

require_once __DIR__ . '/fortify.php';



