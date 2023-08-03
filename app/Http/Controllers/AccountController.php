<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function register(){
        return view("account.register");
    }

    public function save(Request $request){
        $this->customValidate($request);
        $data = $request->all();
        unset($data["_token"]);
        unset($data["cf_password"]);
        //hash mật khẩu
        $data["password"] = Hash::make($data["password"]);
        $user = new User($data);
        $user->save();
        return redirect("/");
    }

    //Đăng nhập
    public function login(){
        return view("account.login");
    }

    public function auth(Request $request){
        $data = $request->all();
        unset($data['_token']);

        if(Auth::attempt($data)){
            //Đăng nhập thành công
            return redirect()
                    ->to('/')
                    ->with("_success_msg", "Đăng nhập thành công");
        }
        else{
            //Đăng nhập thất bại
            return redirect()
            ->route('account.login')
            ->with("_destroy_msg", "Tên đăng nhập hoặc mật khẩu không hợp lệ");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }

    private function customValidate(Request $request)
    {
        // Ràng buộc dữ liệu
        #Validate dữ liệu
        #Tất cả dữ liệu là bắt buộc nhập
        #Họ tên không đc ít hơn 4 ký tự
        #Mật khẩu không đc it hơn 4 ký tự
        #Mật khẩu và xác nhận mặt khẩu phải giống nhau
        #Email phải là duy nhất, không đc phép tồn tại 2 email giống nhau trong db
        $rules = [
            "name" => ["required", "min:4" ],
            "password" => ["required", "min:4", "same:cf_password" ],
            "cf_password" => ["required"],
            "email" => ["required", "unique:users,email" ]
        ];

        $request->validate($rules);
    }
}

