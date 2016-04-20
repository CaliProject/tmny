<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public function showIndex()
    {
        return view('admin.home');
    }

    public function showUpdatePassword(){
        return view('admin.updatePassword');
    }

    public function updatePassword(Request $request){
        $user = User::first();
        if(Hash::check($request->old_password,$user->password)){
            if($request->new_password == $request->password_confirmation){
                $user->password = bcrypt($request->new_password);
                $user->save();
                return redirect('/admin')->with([
                    'status' => 'success',
                    'message' => '修改成功',
                ]);
            }else{
                return redirect()->back()->with([
                    'status' => 'new_error',
                    'message' => '两次输入密码不一致',
                ]);
            }
        }else{
            return redirect()->back()->with([
                'status' => 'old_error',
                'message' => '原密码输入错误'
            ]);
        }
    }
}
