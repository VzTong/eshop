<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\HomeController;
use App\Models\SanPham;
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

Route::prefix("/admin")->name("admin.")->group(function () {
    Route::prefix("/san-pham")->name("sanpham.")->group(function () {
        Route::get('/', [SanPhamController::class, "index"])->name("index");
        Route::get('/tao-san-pham', [SanPhamController::class, "create"])->name("create");
        // Route::post('/tao-danh-muc', [SanPhamController::class, "store"])->name("store"); // dùng để thêm dữ liệu và xóa dữ liệu
        Route::get('/{id}/sua-san-pham', [SanPhamController::class, "edit"])->name("edit");
        // Route::post('/{id}/sua-danh-muc', [SanPhamController::class, "update"])->name("update");

        // Giá trị id ko bắt buộc => id phải ở cuối url
        Route::post('/luu/{id?}', [SanPhamController::class, "upsert"])->name("upsert");
        Route::post('/xoa/{id}', [SanPhamController::class, "destroy"])->name("destroy");
        // Tạo biến $id ko bắt buộc thêm dấu ? vào sau, có cũng đc ko có cũng đc

    });
});
