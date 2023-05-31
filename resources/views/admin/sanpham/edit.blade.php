<x-admin-layout title="Thêm mới sản phẩm">

    <div class="row">
        <div class="col-12">
            <h2 class="mt-4">Sửa sản phẩm</h2>
        </div>
        <div class="col-md-6 offset-md-3">
            {{-- Truyền file báo lỗi khi User nhập sai --}}
            {{-- @include("includes/errors") --}}
            <form action="{{ route('admin.sanpham.upsert', ['id' => $data->id]) }}" method="POST">
                @csrf {{-- thiếu @csrf sẽ bị lỗi 429 (KO tìm thấy URL) --}}
                <x-app-input name="anh_cover" label="Ảnh sản phẩm" value="{{$data->anh_cover}}" />
                <x-app-input name="ten_san_pham" label="Tên sản phẩm" value="{{$data->ten_san_pham}}" />
                <x-app-input name="gia" label="Tên sản phẩm" value="{{$data->gia}}" />
                <x-app-input name="mo_ta" label="Tên sản phẩm" value="{{$data->mo_ta}}" />
                <x-app-input name="id_nguoi_tao" label="Tên sản phẩm" value="{{$data->id_nguoi_tao}}" />
                <x-app-input name="id_danh_muc" label="ID danh mục sản phẩm" value="{{$data->id_danh_muc}}" />

                <div class="mt-3">
                    <input type="submit" class="btn btn-outline-success" value="Cập nhật sản phẩm"/>
                </div>

            </form>
        </div>
    </div>

</x-admin-layout>