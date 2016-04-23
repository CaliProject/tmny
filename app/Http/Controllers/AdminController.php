<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\APIResponse;

class AdminController extends Controller {

    use APIResponse;

    public function showIndex(){

        return view('admin.home');
    }

    public function init(){
        $this->initAbout();
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

    public function initAbout(){
        if(!$this->getAboutData()){
            $abouts = [];
            array_push($abouts,["header" => 'header',"content" => 'content']);
            Configuration::create([
                'key' => 'aboutContent',
                'data' => json_encode($abouts),
            ]);
        }
    }

    public function getAboutData(){

        return Configuration::where('key','aboutContent')->value('data');
    }

    public function updateAboutData($abouts){

        return Configuration::where('key','aboutContent')->update([
            'data' => json_encode($abouts),
        ]);
    }

    public function showAbout(){
        $abouts = $this->getAboutData();

        return view('admin.about.home',compact('abouts'));
    }

    public function deleteAbout($id){
        $abouts = $this->getAboutData();
        unset($abouts[$id]);
        $this->updateAboutData($abouts);

        return $this->showAbout();
    }

    public function showEditAbout($id){
        $abouts = $this->getAboutData();
        $abouts = $abouts[$id];
        return view('admin.about.edit',['abouts' => $abouts,'id' => $id]);
    }

    public function editAbout(Request $request,$id){
        $this->validate($request,[
            'header' => 'required',
            'content' => 'required',
        ]);
        $abouts = $this->getAboutData();
        $abouts[$id]->header = $request->header;
        $abouts[$id]->content = $request->content;
        return $this->updateAboutData($abouts) ? $this->showAbout() : redirect()->back()->whit($this->errorResponse());
    }

    public function showAddAbout(){

        return view('admin.about.add');
    }

    public function addAbout(Request $request){
        $this->validate($request,[
            'header' => 'required',
            'content' => 'required',
        ]);
        $abouts = $this->getAboutData();
        array_push($abouts,["header" => $request->header,"content" => $request->content]);
        $this->updateAboutData($abouts);

        return $this->showAbout();
    }
}
