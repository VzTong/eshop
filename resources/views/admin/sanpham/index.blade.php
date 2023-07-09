<x-admin-layout title="Danh sách sản phẩm">

    <h1>Danh sách sản phẩm</h1>
    <a class="btn btn-primary my-2" href="{{ route('admin.sanpham.create') }}">
        <i class="bi bi-plus"></i>Tạo sản phẩm</a>

    <div class="row">
        <div class="col-12 table-resposive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Mô tả sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        {{-- <th>ID người tạo sản phẩm</th> --}}
                        <th>Danh mục sản phẩm</th>
                        {{-- <th>Ngày tạo</th>
                        <th>Ngày sửa</th> --}}
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->ten_san_pham }}</td>
                            <td>{{ number_format($item->gia) }}</td>
                            <td>{{ $item->mo_ta }}</td>
                            <td><img src="{{ $item->anh_cover }}" width="100" height="100" alt="Ảnh sản phẩm"></td>
                            {{-- <td>{{ $item->id_nguoi_tao }}</td> --}}
                            <td>{{ $item->danh_mucs->ten_danh_muc ?? "" }}</td>
                            {{-- <td>{{ $item->created_at->format('d-M-Y') }}</td>
                            <td>{{ $item->updated_at->format('d-M-Y') }}</td> --}}
                            <td>
                                <a href="{{ route("admin.sanpham.edit", ["id" => $item->id]) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                <form action="{{ route('admin.sanpham.destroy', ['id' => $item->id]) }}"
                                    method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Giao diện phân trang --}}
            {{ $data->links() }}
        </div>
    </div>
</x-admin-layout>
