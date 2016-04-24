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
        $abouts = Configuration::about();
        unset($abouts->sections[intval($id)]);
        $abouts->sections = array_flatten($abouts->sections);

        return Configuration::about($abouts) ? $this->successResponse([
            'message' => '删除成功',
        ]) : $this->errorResponse([
            'message' => '删除失败',
        ]);
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
            'title'  => 'required',
            'body' => 'required',
        ]);

        $abouts = Configuration::about();
        array_push($abouts->sections, ["title" => $request->input('title'), "body" => $request->input('body')]);

        return Configuration::about($abouts) ? $this->successResponse([
            'message' => '添加成功'
        ]) : $this->errorResponse([
            'message' => '添加失败'
        ]);
    }

    /**
     * get services data
     * 获取services的数据
     *
     * @return mixed
     *
     */
    public function getServicesData()
    {
        return Configuration::services()->provides;
    }

    /**
     * get services header
     * 获取services的头部信息
     *
     * @return mixed
     */
    public function getServicesHeader()
    {
        return $this->interpolateObj(['title' => Configuration::services()->title,'caption' => Configuration::services()->caption]);
    }

    /**
     * update services data
     * 修改services的数据
     *
     * @param $request
     * @param null $id
     * @return array
     */
    public function updateServices($request,$id = null)
    {
        $services = Configuration::services();
        if(is_null($id)){
            $services->title = $request->title;
            $services->caption = $request->caption;
        }else{
            $services->provides[$id]->title = $request->title;
            $services->provides[$id]->body = $request->body;
        }

        return Configuration::services($services) ? $this->successResponse([
            'message' => '修改成功'
        ]) : $this->errorResponse([
            'message' => '修改失败'
        ]);
    }

    /**
     * show services page
     * 显示services的所有页面
     *
     * @param $operation 哪一个页面
     * @return mixed
     */
    public function showServices($operation)
    {
        if($operation != 'add'){
            $provides = $this->getServicesData();
            $header = $this->getServicesHeader();
            return view('admin.services.'.$operation,['provides' => $provides,'header' => $header]);
        } else {
            return view('admin.services.'.$operation);
        }
    }

    /**
     * edit services header or provides
     * 编辑services的头部或者provides
     *
     * @param Request $request
     * @param $id
     * @return array
     */
    public function editServices(Request $request,$id)
    {
        switch($id){
            case 'header':
                $this->validate($request,[
                    'title' => 'required',
                    'caption' => 'required'
                ]);

                return $this->updateServices($request);
                break;
            default:
                $this->validate($request,[
                    'title' => 'required',
                    'body' => 'required'
                ]);

                return $this->updateServices($request,$id);
                break;
        }
    }

    /**
     * add a services
     * 添加services板块
     *
     * @param Request $request
     * @return array
     */
    public function addServices(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        $services = Configuration::services();
        array_push($services->provides,['title' => $request->input('title'),'body' => $request->input('body')]);

        return Configuration::services($services) ? $this->successResponse([
            'message' => '添加成功'
        ]) : $this->errorResponse([
            'message' => '添加失败'
        ]);

    }

    /**
     * delete a services
     * 删除services的一个板块
     *
     * @param $id
     * @return array
     */
    public function deleteServices($id)
    {
        $services = Configuration::services();
        unset($services->provides[intval($id)]);
        $services->provides = array_flatten($services->provides);

        return Configuration::services($services) ? $this->successResponse([
            'message' => '删除成功'
        ]) : $this->errorResponse([
            'message' => '删除失败'
        ]);
    }

}
