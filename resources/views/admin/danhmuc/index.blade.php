<x-admin-layout title="Danh sách danh mục">

    <h1>Danh sách danh mục</h1>
    <a class="btn btn-primary my-2" href="{{ route('admin.danhmuc.create') }}">
        <i class="bi bi-plus"></i>Tạo danh mục</a>

    <div class="row">
        <div class="col-12 table-resposive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->ten_danh_muc }}</td>
                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                            <td>{{ $item->updated_at->format('d-M-Y') }}</td>
                            <td>
                                <a href="{{ route("admin.danhmuc.edit", ["id" => $item->id]) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                <form action="{{ route('admin.danhmuc.destroy', ['id' => $item->id]) }}"
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
