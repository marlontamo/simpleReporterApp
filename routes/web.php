<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('pages.HomePage');
});
Route:: get ('report/dlusers',[ReportController::class,'userReportDownloadPDF'])->name('userDownloadPdf');
Auth::routes();
Route::group(['middleware' => 'auth'], function (){
    Route:: get ('report/viewpdf',[ReportController::class,'userReportViewPDF'])->name('userViewPdf');
    Route:: get ('/pages/user/edit',[PagesController::class,'editUser'])->name('edit.user');
Route:: get ('/pages/user/create',[PagesController::class,'create'])->name('create.user');
Route:: get ('/pages/users',[PagesController::class,'users'])->name('user');
Route:: get ('/welcome',[PagesController::class,'index'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');
});