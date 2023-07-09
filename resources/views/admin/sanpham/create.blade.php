<x-admin-layout title="Thêm mới sản phẩm">

    <div class="row">
        <div class="col-12">
            <h2 class="mt-4">Thêm mới sản phẩm</h2>
        </div>
        <div class="col-md-6 offset-md-3">
            {{-- @include("includes/errors") --}}
            <form action="{{ route('admin.sanpham.upsert') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- thiếu @csrf sẽ bị lỗi 429 (KO tìm thấy URL) --}}

                <x-app-input name="ten_san_pham" label="Tên sản phẩm" />
                <x-app-input name="gia" type="number" label="Giá sản phẩm" />
                <x-app-input name="mo_ta" label="Mô tả sản phẩm" />
                <x-app-input name="anh_cover" type="file" label="Ảnh sản phẩm" accept=".png, .jpg, .jpeg" />
                <x-app-select name="id_danh_muc" label="Danh mục sản phẩm" model="DanhMuc" displayMember="ten_danh_muc" valueMember="id" />

                <div class="mt-3 mb-3">
                    <input type="submit" class="btn btn-outline-success" value="Thêm mới sản phẩm" />
                </div>

            </form>
        </div>
    </div>

</x-admin-layout>
