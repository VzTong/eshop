<x-admin-layout title="Đăng nhập">

    <div class="container mt-3">

        @if (!empty(session('_success_msg')))
            <div class=" mt-2 alert alert-info alert-dismissible fade show" role="alert">
                {{ session('_success_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (!empty(session('_destroy_msg')))
            <div class=" mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('_destroy_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (!empty(session('_err_msg')))
            <div class=" mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('_err_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Đăng nhập</h3>
                <form action="{{ route('account.login') }}" method="POST">
                    @csrf
                    <x-app-input name="email" type="email" label="Email" />
                    <x-app-input name="password" type="password" label="Mật khẩu" />

                    <div class="mt-3">
                        <button type="submit" class="btn btn-outline-success">
                            Đăng nhập
                        </button>
                    </div>
                </form>

                <div class="mt-3">
                    <p>Chưa có tài khoản <a href="{{ route('account.register') }}"> Đăng ký ngay </a></p>
                </div>

            </div>
        </div>

    </div>

</x-admin-layout>
