<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/contact', [HomeController::class, "contact"]);


//Đường dẫn site quản trị
//  /admin/{table}/{function}

//prefix : tiền tố
Route::prefix("/admin")->name("admin.")->group(function () {
    Route::prefix("/danh-muc")->name("danhmuc.")->group(function () {
        Route::get('/', [DanhMucController::class, "index"])->name("index");
        Route::get('/tao-danh-muc', [DanhMucController::class, "create"])->name("create");
        // Route::post('/tao-danh-muc', [DanhMucController::class, "store"])->name("store"); // dùng để thêm dữ liệu và xóa dữ liệu
        Route::get('/{id}/sua-danh-muc', [DanhMucController::class, "edit"])->name("edit");
        // Route::post('/{id}/sua-danh-muc', [DanhMucController::class, "update"])->name("update");

        // Giá trị id ko bắt buộc => id phải ở cuối url
        Route::post('/luu/{id?}', [DanhMucController::class, "upsert"])->name("upsert");
        Route::post('/xoa/{id}', [DanhMucController::class, "destroy"])->name("destroy");
        // Tạo biến $id ko bắt buộc thêm dấu ? vào sau, có cũng đc ko có cũng đc

    });
});
