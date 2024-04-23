<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\TranslateController;
use App\Http\Controllers\CustomFontController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\pyscriptController;

Route::get('/', function() {
    return view('notifi');
});
Route::post('/send-notification', [pyscriptController::class, 'sendNotification']);

Route::get('/ff', [UserController::class, 'Recaptcha'])->name("recaptcha");
Route::post('/submit', [UserController::class, 'FormSubmit'])->name("submit");
Route::get("/welcome/{name}/{email}", [UserController::class, 'index'])->name("welcome");

Route::get('/update', [UserController::class, 'updateForm'])->name('password.change');
Route::post('/password/{id}', [UserController::class, 'update'])->name('update');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get("/download", [DownloadController::class, 'index'])->name('upload');
Route::post("/download", [DownloadController::class, 'uploadUrl'])->name('uploadUrl');

Route::get('/lang', [TranslateController::class, 'index']);
Route::get('/translate', [TranslateController::class, 'TranslateContent'])->name("translate");
Route::get('/font', [TranslateController::class, 'CustomFontSize'])->name("customfont");
Route::get('/family', [TranslateController::class, 'CustomFontTheme'])->name("customfonttheme");
Route::get('/color', [TranslateController::class, 'CustomColor'])->name("customColor");

Route::get('/move', [CustomFontController::class, 'index']);

Route::get('/backup', [BackupController::class, 'backup'])->name('backup.edit');
Route::put('/backup', [BackupController::class, 'update'])->name('backup.update');

Route::get('/upload', [CustomFontController::class, 'UploadImage']);

Route::get('/location', [CustomFontController::class, 'location']);
Route::post('/download', [BackupController::class, 'downloadBackup'])->name("download.backup");

Route::get('/search', [CustomFontController::class, 'search'])->name('search');

Route::get('/copy', [CustomFontController::class, 'Copy'])->name('copy');

// Auth::routes();
// Route::middleware('auth')->group(function(){
//     Route::get('/lang', [TranslateController::class, 'index']);
// });

