<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DanhMuc::all();
        $data = DanhMuc::orderByDesc("id")->paginate(2);

        // paginate() => phân trang
        // dd($data);
        return view("admin.danhmuc.index")->with("data", $data);
        // return view("admin.danhmuc.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.danhmuc.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     unset($data["_token"]);

    //    // Ràng buộc dữ liệu
    //    $this->customValidate($request);

    //     // dd($data);
    //     $model = new DanhMuc($data);
    //     $model->save();
    //     // chuyển hướng về trang có route name là home
    //     // return redirect()->to("/");  khi chỉ có 1 trang
    //     return redirect()->route("admin.danhmuc.index");   //dùng khi có nhiều trang cần chuyển hướng
    // }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DanhMuc::findOrFail($id);
        return view("admin.danhmuc.edit")->with("data", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     // // Nhận data mới từ user
    //     // $inputData = $request->all();
    //     // unset($inputData["_token"]);

    //     // // Ràng buộc dữ liệu
    //     // $this->customValidate($request);
    //     // // $valid = Validator::make($data, $rules);
    //     // // $valid->validate();

    //     // // Load dữ liệu hiện tại (dữ liệu cũ)
    //     // $data = DanhMuc::findOrFail($id);

    //     // // Update data cũ thành mới
    //     // $data->ten_danh_muc = $inputData["ten_danh_muc"];
    //     // $data->save();
    //     // return redirect()->route("admin.danhmuc.index");

    // }

    // Hàm viết chung store và update |
    // Dựa vào $id để quyết định hành động là update hay insert
    // Nếu tìm thấy $id thì là update và ngược lại
    public function upsert(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data["_token"]);

        // Ràng buộc dữ liệu
        $this->customValidate($request);

        // Update hoặc insert
        DanhMuc::updateOrCreate(["id" => $id], $data);
        if ($id == null) {
            $msg = "Thêm danh mục ".$data["ten_danh_muc"]." thành công!!!";
        } else {
            $msg = "Cập nhật danh mục ".$data["ten_danh_muc"]." thành công!!!";
        }

        return redirect()
                ->route("admin.danhmuc.index")
                ->with("_success_msg", $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dm = DanhMuc::findOrFail($id);
        $ten_danh_muc = $dm->ten_danh_muc;
        DanhMuc::destroy($id);

        return redirect()
                ->route('admin.danhmuc.index')
                // ->back()
                ->with("_destroy_msg", "Xóa $ten_danh_muc danh mục thành công!!!");
    }

    private function customValidate(Request $request)
    {
        // Ràng buộc dữ liệu
        $rules = [
            "ten_danh_muc" => "required|min:3|max:100"  //not null, min 3 ký tự, max 100 ký tự
        ];

        $request->validate($rules);
    }
}
