<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.danhmuc.index") }}">Danh mục</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.sanpham.index") }}">Sản phẩm</a>
                </li>

                @if(Auth::check())
                    <li class="nav-item">
                        <span class="nav-link text-info">Xin chào {{Auth::user()->name}}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("account.logout") }}">Đăng Xuất</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("account.register") }}">Đăng Ký</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("account.login") }}">Đăng Nhập</a>
                    </li>
                @endif
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
