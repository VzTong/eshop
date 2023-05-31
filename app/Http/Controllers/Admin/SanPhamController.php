<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SanPham::orderByDesc("id")->paginate(2);

        return view("admin.sanpham.index")->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.sanpham.create");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SanPham::findOrFail($id);
        return view("admin.sanpham.edit")->with("data", $data);
    }

    // Hàm viết chung store và update |
    // Dựa vào $id để quyết định hành động là update hay insert
    // Nếu tìm thấy $id thì là update và ngược lại
    public function upsert(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data["_token"]);

        // Ràng buộc dữ liệu
        $this->customValidate($request);

        if ($id == null) {
            $filename = "";
            $file = $request->file("anh_cover");
            if (!empty($file)) {
                // Tạo tên file ngẫu nhiên để tránh trùng tên, gây lỗi
                $filename = $file->hashName();
                // Lưu ở thư mục file với tên file vừa tạo
                $file->storeAs("/files", $filename);
                $filename = "/files/" . $filename;
            }
            $data["anh_cover"] = $filename;
            $msg = "Thêm sản phẩm " . $data["ten_san_pham"] . " thành công!!!";
        } else {
            $file = $request->file("anh_cover");
            if (!empty($file)) {
                // Tạo tên file ngẫu nhiên để tránh trùng tên, gây lỗi
                $filename = $file->hashName();
                // Lưu ở thư mục file với tên file vừa tạo
                $file->storeAs("/files", $filename);
                $filename = "/files/" . $filename;
            }
            $data["anh_cover"] = $filename;
            $msg = "Cập nhật sản phẩm " . $data["ten_san_pham"] . " thành công!!!";
        }

        // Update hoặc insert
        SanPham::updateOrCreate(["id" => $id], $data);
        return redirect()
            // ->route("admin.danhmuc.index")  | nếu dùng back() thì xóa cái này và ngược lại
            ->back() //Sửa thành công một danh mục nào đó vẫn ở tại phần phân trang đó
            ->with("_success_msg", $msg);
    }

    public function destroy(string $id)
    {
        $sp = SanPham::findOrFail($id);
        $ten_san_pham = $sp->ten_san_pham;
        SanPham::destroy($id);

        return redirect()->back()
            ->with("_destroy_msg", "Xóa sản phẩm
                        '$ten_san_pham' thành công!!!");
    }


    private function customValidate(Request $request)
    {
        // Ràng buộc dữ liệu
        $rules = [
            "ten_san_pham" => "required|min:3|max:100"  //not null, min 3 ký tự, max 100 ký tự
        ];

        $request->validate($rules);
    }
}
