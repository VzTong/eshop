<x-admin-layout title="Đăng ký">

    <div class="container mt-3">

        @if (!empty(session('_success_msg')))
            <div class=" mt-2 alert alert-info alert-dismissible fade show" role="alert">
                {{ session('_success_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Đăng ký tài khoản</h3>
                <form action="{{ route('account.save') }}" method="POST">
                    @csrf
                    <x-app-input name="name" label="Họ và tên" />
                    <x-app-input name="email" type="email" label="Email" />
                    <x-app-input name="password" type="password" label="Mật khẩu" />
                    <x-app-input name="cf_password" type="password" label="Xác nhận mật khẩu" />

                    <div class="mt-3">
                        <button type="submit" class="btn btn-outline-success">
                            Đăng ký tài khoản
                        </button>
                    </div>
                </form>

            </div>
        </div>

        @if (!empty(session('_destroy_msg')))
            <div class=" mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('_destroy_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>
</x-admin-layout>

