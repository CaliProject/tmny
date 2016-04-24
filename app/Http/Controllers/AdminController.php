<?php

namespace App\Http\Controllers;

use Hash;
use App\Configuration;
use App\Traits\APIResponse;
use Illuminate\Http\Request;

class AdminController extends Controller {

    use APIResponse;

    /**
     * Show index page.
     *
     * @return mixed
     */
    public function showIndex()
    {
        return view('admin.home');
    }

    /**
     * interpolate the object
     * 转换成一个对象
     *
     * @param $arr
     * @return mixed
     */
    public function interpolateObj($arr = [])
    {
        return json_decode(json_encode($arr));
    }

    /**
     * SHow update password page.
     *
     * @return mixed
     */
    public function showUpdatePassword()
    {
        return view('admin.updatePassword');
    }

    /**
     * Updates the password.
     *
     * @param Request $request
     * @return array
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        $user = $request->user();
        if (Hash::check($request->input('old_password'), $user->password)) {
            $user->update(['password' => bcrypt($request->input('password'))]);

            return redirect('/admin')->with([
                'status'  => 'success',
                'message' => '修改成功',
            ]);
        } else {
            return $this->errorResponse([
                'old_error' => '原密码错误'
            ]);
        }
    }

    /**
     * Get about data.
     * 获取about的数据
     *
     * @return mixed
     */
    public function getAboutData()
    {
        return Configuration::about()->sections;
    }

    /**
     * Get about header.
     * 获取about的头部.
     *
     * @return array
     */
    public function getAboutHeader()
    {
        return $this->interpolateObj(['title' => Configuration::about()->title, 'caption' => Configuration::about()->caption]);
    }

    /**
     * update the data of the about
     * 更新about的data数据
     *
     * @param $request
     * @param $id
     * @return mixed
     */
    public function updateAbout($request, $id = null)
    {
        $about = Configuration::about();
        if (is_null($id)) {
            $about->title = $request->title;
            $about->caption = $request->caption;
        } else {
            $about->sections[$id]->title = $request->title;
            $about->sections[$id]->body = $request->body;
        }

        return Configuration::about($about);
    }

    /**
     * Show about page.
     *
     * @return mixed
     */
    public function showAbout()
    {
        $abouts = $this->getAboutData();
        $aboutHeader = $this->getAboutHeader();

        return view('admin.about.home', ['abouts' => $abouts, 'header' => $aboutHeader]);
    }

    /**
     * Show edit page for about.
     *
     * @param $id
     * @return mixed
     */
    public function showEditAbout()
    {
        $abouts = $this->getAboutData();
        $header = $this->getAboutHeader();

        return view('admin.about.edit', ['abouts' => $abouts, 'header' => $header]);
    }

    /**
     * Delete the about section.
     *
     * @param $id
     * @return mixed
     */
    public function deleteAbout($id)
    {
        $abouts = $this->getAboutData();
        unset($abouts[$id]);
        $this->updateAboutData($abouts);

        return $this->showAbout();
    }


    /**
     * Show about header.
     *
     * @return mixed
     */
    public function showAboutHeader()
    {
        $aboutHeaders = $this->getAboutHeader();
        $header = $aboutHeaders[0]->body;

        return view('admin.about.editHeader', compact('header'));
    }

    /**
     * Edit about.
     *
     * @param Request $request
     * @param         $id
     * @return array|mixed
     */
    public function editAbout(Request $request, $id)
    {
//        $this->validate($request, [
//            'header'  => 'required',
//            'content' => 'required',
//        ]);
//        $abouts = $this->getAboutData();
//        $abouts[$id]->header = $request->input('header');
//        $abouts[$id]->content = $request->input('content');
//
//        return $this->updateAboutData($abouts) ?
//            $this->showAbout() :
//            $this->errorResponse([
//                'message' => '修改失败'
//            ]);
        switch ($id) {
            case 'header':
                $this->validate($request, [
                    'title'   => 'required',
                    'caption' => 'required',
                ]);

                return $this->updateAbout($request) ? $this->successResponse([
                    'message' => '修改成功',
                ]) : $this->errorResponse([
                    'message' => '修改失败',
                ]);
                break;
            default:
                $this->validate($request, [
                    'title' => 'required',
                    'body'  => 'required',
                ]);

                return $this->updateAbout($request, $id) ? $this->successResponse([
                    'message' => '修改成功',
                ]) : $this->errorResponse([
                    'message' => '修改失败',
                ]);
                break;
        }
    }

    /**
     * Show add about page.
     *
     * @return mixed
     */
    public function showAddAbout()
    {
        return view('admin.about.add');
    }

    /**
     * Add an about.
     *
     * @param Request $request
     * @return mixed
     */
    public function addAbout(Request $request)
    {
        $this->validate($request, [
            'header'  => 'required',
            'content' => 'required',
        ]);

        $abouts = $this->getAboutData();
        array_push($abouts, ["header" => $request->input('header'), "content" => $request->input('content')]);
        $this->updateAboutData($abouts);

        return $this->showAbout();
    }
}
