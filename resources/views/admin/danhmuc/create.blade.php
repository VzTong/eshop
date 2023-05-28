<x-admin-layout title="Thêm mới danh mục">

    <div class="row">
        <div class="col-12">
            <h2 class="mt-4">Thêm mới danh mục</h2>
        </div>
        <div class="col-md-6 offset-md-3">
            {{-- @include("includes/errors") --}}
            <form action="{{ route('admin.danhmuc.upsert') }}" method="POST">
                @csrf {{-- thiếu @csrf sẽ bị lỗi 429 (KO tìm thấy URL) --}}
                <x-app-input name="ten_danh_muc" label="Tên danh mục" />

                <div class="mt-3">
                    <input type="submit" class="btn btn-outline-success" value="Thêm mới danh mục" />
                </div>

            </form>
        </div>
    </div>

</x-admin-layout>
