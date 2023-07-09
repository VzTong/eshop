<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return !Auth::check() ? null : redirect()->route('account.login')->with('_destroy_msg', 'Đăng nhập để sử dụng chức năng này');

        if(!Auth::check()){
            $request->session()
                    ->flash('_err_msg', 'Đăng nhập để sử dụng chức năng này');
            return route('account.login');
        }
    }
}
