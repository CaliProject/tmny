<?php

namespace App\Http\Controllers;

use Hash;
use Carbon\Carbon;
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
     * Interpolates the object
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
     * Show update password page.
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
     * Update the data of the about
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

                return $this->updateAbout($request) ?
                    $this->successResponse('修改成功') : $this->errorResponse('修改失败');
                break;
            default:
                $this->validate($request, [
                    'title' => 'required',
                    'body'  => 'required',
                ]);

                return $this->updateAbout($request, $id) ?
                    $this->successResponse('修改成功') : $this->errorResponse('修改失败');
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
            'title' => 'required',
            'body'  => 'required',
        ]);

        $abouts = Configuration::about();
        array_push($abouts->sections, ["title" => $request->input('title'), "body" => $request->input('body')]);

        return Configuration::about($abouts) ? $this->successResponse('添加成功') : $this->errorResponse('添加失败');
    }

    /**
     * Get services data
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
     * Get services header
     * 获取services的头部信息
     *
     * @return mixed
     */
    public function getServicesHeader()
    {
        return $this->interpolateObj(['title' => Configuration::services()->title, 'caption' => Configuration::services()->caption]);
    }

    /**
     * Update services data
     * 修改services的数据
     *
     * @param      $request
     * @param null $id
     * @return array
     */
    public function updateServices($request, $id = null)
    {
        $services = Configuration::services();
        if (is_null($id)) {
            $services->title = $request->title;
            $services->caption = $request->caption;
        } else {
            $services->provides[$id]->title = $request->title;
            $services->provides[$id]->body = $request->body;
        }

        return Configuration::services($services) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
    }

    /**
     * Show services page
     * 显示services的所有页面
     *
     * @param $operation 哪一个页面
     * @return mixed
     */
    public function showServices($operation)
    {
        if ($operation != 'add') {
            $provides = $this->getServicesData();
            $header = $this->getServicesHeader();

            return view('admin.services.' . $operation, ['provides' => $provides, 'header' => $header]);
        } else {
            return view('admin.services.' . $operation);
        }
    }

    /**
     * Edit services header or provides
     * 编辑services的头部或者provides
     *
     * @param Request $request
     * @param         $id
     * @return array
     */
    public function editServices(Request $request, $id)
    {
        switch ($id) {
            case 'header':
                $this->validate($request, [
                    'title'   => 'required',
                    'caption' => 'required'
                ]);

                return $this->updateServices($request);
                break;
            default:
                $this->validate($request, [
                    'title' => 'required',
                    'body'  => 'required'
                ]);

                return $this->updateServices($request, $id);
                break;
        }
    }

    /**
     * Add a service
     * 添加services板块
     *
     * @param Request $request
     * @return array
     */
    public function addServices(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);
        $services = Configuration::services();
        array_push($services->provides, ['title' => $request->input('title'), 'body' => $request->input('body')]);

        return Configuration::services($services) ? $this->successResponse('添加成功') : $this->errorResponse('添加失败');
    }

    /**
     * Delete a service
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

        return Configuration::services($services) ? $this->successResponse('删除成功') : $this->errorResponse('删除失败');
    }

    /**
     * Show basement page.
     *
     * @return mixed
     */
    public function showBasement()
    {
        $basement = Configuration::basement();
        $site = Configuration::site()->basement;

        return view('admin.basement.home', compact('basement'),compact('site'));
    }

    /**
     * Show blog page.
     *
     * @param null $operation
     * @return mixed
     */
    public function showBlog($operation = null)
    {
        if ($operation != 'add') {
            $blog = Configuration::blog();
            $site = Configuration::site()->blog;
            return view('admin.blog.' . $operation, compact('blog'),compact('site'));
        }

        return view('admin.blog.' . $operation);
    }

    /**
     * SHow contact page.
     *
     * @return mixed
     */
    public function showContact()
    {
        $details = Configuration::contact()->details;
        $header = $this->interpolateObj(['title' => Configuration::contact()->title, 'caption' => Configuration::contact()->caption]);
        $site = Configuration::site()->contact;

        return view('admin.contact.home',['details' => $details,'header' => $header,'site' => $site]);
    }

    /**
     * Save the basement request.
     *
     * @param Request $request
     * @return array
     */
    public function saveBasement(Request $request)
    {
        extract($request->except('_token'));
        Configuration::basement(compact('title', 'caption', 'content'));

        return $this->successResponse('内容修改成功');
    }

    /**
     * Edit the site of the basement
     * 修改basement的site
     *
     * @param Request $request
     * @param $operation
     * @return array
     */
    public function editBasement(Request $request,$operation)
    {
        $site = Configuration::site();
        switch($operation){
            case 'SEO':
                $this->validate($request,[
                    'keywords' => 'required'
                ]);
                $keywords = implode(',',$request->input('keywords'));
                $site->basement->keywords = $keywords;

                return Configuration::site($site) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
            case 'background':
                if (is_null($request->file('image'))){
                    $site->portfolio->background = $request->old_imgae;
                } else {
                    $uri = $this->moveFile($request);
                    $site->portfolio->background = $uri;
                }

                return Configuration::site($site) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
        }
    }

    /*
     * Get portfolio data
     * 获取portfolio的data数据
     *
     * @return mixed
     */
    public function getPortfolioData()
    {
        return Configuration::portfolio()->products;
    }

    /**
     * Get portfolio header
     * 获取portfolio的头部数据
     *
     * @return mixed
     */
    public function getPortfolioHeader()
    {
        return $this->interpolateObj(['title' => Configuration::portfolio()->title, 'caption' => Configuration::portfolio()->caption]);
    }

    /**
     * Update portfolio data
     * 修改portfolio的数据
     *
     * @param      $request
     * @param null $id
     * @return array
     */
    public function updatePortfolio(Request $request, $id = null)
    {
        $portfolio = Configuration::portfolio();
        $site = Configuration::site();
        if (is_null($id)) {
            $portfolio->title = $request->title;
            $portfolio->caption = $request->caption;
        } else if($id == 'SEO'){
            $keywords = implode(',',$request->input('keywords'));
            $site->portfolio->keywords = $keywords;

            return Configuration::site($site);
        } else if($id == 'background'){
            if (is_null($request->file('image'))){
                $site->portfolio->background = $request->old_imgae;
            } else {
                $uri = $this->moveFile($request);
                $site->portfolio->background = $uri;
            }

            return Configuration::site($site);
        } else{
            $portfolio->products[$id]->name = $request->name;
            $portfolio->products[$id]->caption = $request->caption;
            if (is_null($request->file('image'))) {
                $portfolio->products[$id]->image = $request->old_image;
            } else {
                $uri = $this->moveFile($request);
                $portfolio->products[$id]->image = $uri;
            }
        }

        return Configuration::portfolio($portfolio);
    }

    /**
     * Show portfolio page
     * 显示portfolio的所有页面
     *
     * @param $operation
     * @return mixed
     */
    public function showPortfolio($operation)
    {
        if ($operation != 'add') {
            $products = $this->getPortfolioData();
            $header = $this->getPortfolioHeader();
            $site = Configuration::site()->portfolio;

            return view('admin.portfolio.' . $operation, ['header' => $header,'products' => $products,'site' => $site]);
        } else {
            return view('admin.portfolio.' . $operation);
        }
    }

    /**
     * Add a portfolio.
     *
     * @param Request $request
     * @return array
     */
    public function addPortfolio(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'caption' => 'required',
            'image'   => 'required'
        ]);
        $uri = $this->moveFile($request);

        $portfolio = Configuration::portfolio();
        array_push($portfolio->products, ['name' => $request->input('name'), 'caption' => $request->input('caption'), 'image' => $uri]);

        return Configuration::portfolio($portfolio) ? $this->successResponse('添加成功') : $this->errorResponse('添加失败');
    }

    /**
     * Edit a portfolio.
     *
     * @param Request $request
     * @param         $id
     * @return array
     */
    public function editPortfolio(Request $request, $id)
    {
        switch ($id) {
            case 'header':
                $this->validate($request, [
                    'title'   => 'required',
                    'caption' => 'required'
                ]);

                return $this->updatePortfolio($request) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
            case 'SEO':
                $this->validate($request, [
                    'keywords' => 'required'
                ]);

                return $this->updatePortfolio($request,$id) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
            case 'background':

                return $this->updatePortfolio($request,$id) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
            default:
                $this->validate($request, [
                    'name'    => 'required',
                    'caption' => 'required',
                ]);

                return $this->updatePortfolio($request, $id) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
        }
    }

    /**
     * Deletes a portfolio.
     *
     * @param $id
     * @return array
     */
    public function deletePortfolio($id)
    {
        $portfolio = Configuration::portfolio();
        unset($portfolio->products[$id]);
        $portfolio->products = array_flatten($portfolio->products);

        return Configuration::portfolio($portfolio) ? $this->successResponse('删除成功') : $this->errorResponse('删除失败');
    }

    /**
     * Add a blog post.
     *
     * @param Request $request
     * @return array
     */
    public function addBlog(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'image' => 'required'
        ]);
        $uri = $this->moveFile($request);

        $blog = Configuration::blog();
        array_push($blog->posts, [
            'title' => $request->input('title'),
            'body'  => $request->input('body'),
            'image' => $uri,
            'time'  => Carbon::now()->toDateTimeString()
        ]);

        return Configuration::blog($blog) ? $this->successResponse('添加成功') : $this->errorResponse('添加失败');
    }

    /**
     * @param Request $request
     * @param         $id
     * @return array
     */
    public function editBlog(Request $request, $id)
    {
        switch ($id) {
            case 'header':
                $this->validate($request, [
                    'title'   => 'required',
                    'caption' => 'required'
                ]);

                return $this->updateBlog($request);
            case 'SEO':
                $this->validate($request, [
                    'keywords' => 'required'
                ]);

                return $this->updateBlog($request,$id);

            case 'background':

                return $this->updateBlog($request,$id);
            default:
                $this->validate($request, [
                    'title' => 'required',
                    'body'  => 'required',
                ]);

                return $this->updateBlog($request, $id);
        }
    }

    /**
     * Updates the blog post.
     *
     * @param Request $request
     * @param         $id
     * @return array
     */
    public function updateBlog(Request $request, $id = null)
    {
        $blog = Configuration::blog();
        $site = Configuration::site();
        if (is_null($id)) {
            $blog->title = $request->title;
            $blog->caption = $request->caption;
        } else if($id='SEO') {
            $keywords = implode(',',$request->input('keywords'));
            $site->blog->keywords = $keywords;

            return Configuration::site($site) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
        } else if($id='background'){
            if(is_null($request->file('image'))){
                $site->blog->background = $request->old_image;
            } else {
                $uri = $this->moveFile($request);
                $site->blog->background = $uri;
            }

            return Configuration::site($site) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
        } else {
            $blog->posts[$id]->title = $request->title;
            $blog->posts[$id]->body = $request->body;
            if (is_null($request->file('image'))) {
                $blog->posts[$id]->image = $request->old_image;
            } else {
                $uri = $this->moveFile($request);
                $blog->posts[$id]->image = $uri;
            }
        }

        return Configuration::blog($blog) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
    }

    /**
     * Deletes a blog post.
     *
     * @param $id
     * @return array
     */
    public function deleteBlog($id)
    {
        $blog = Configuration::blog();
        unset($blog->posts[$id]);
        $blog->posts = array_flatten($blog->posts);

        return Configuration::blog($blog) ? $this->successResponse('删除成功') : $this->errorResponse('删除失败');
    }

    /**
     * Move the uploaded file.
     *
     * @param Request $request
     * @return string
     */
    protected function moveFile(Request $request)
    {
        $file = $request->file('image');
        $name = sha1(time() . $file->getClientOriginalName()) . '.' . $file->extension();
        $file->move('uploads', $name);
        $uri = '/uploads/' . $name;

        return $uri;
    }

    /**
     * Show music page.
     *
     * @return mixed
     */
    public function showMusic()
    {
        return view('admin.music');
    }

    /**
     * Updates the music.
     *
     * @param Request $request
     * @return array
     */
    public function updateMusic(Request $request)
    {
        $this->validate($request, [
            'music' => 'required'
        ]);

        $file = $request->file('music');
        $file->move('page', 'music.mp3');

        return $this->successResponse('更新成功');
    }

    /**
     * Edit the contact.
     *
     * @param Request $request
     * @param         $operation
     * @return array
     */
    public function editContact(Request $request, $operation)
    {
        switch ($operation) {
            case 'header':
                $this->validate($request, [
                    'title'   => 'required',
                    'caption' => 'required'
                ]);
                $contact = Configuration::contact();
                $contact->title = $request->input('title');
                $contact->caption = $request->input('caption');

                return Configuration::contact($contact) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
            case 'edit':
                $this->validate($request, [
                    'tel'     => 'required',
                    'url'     => 'required',
                    'address' => 'required',
                    'company' => 'required',
                    'slogan'  => 'required'
                ]);
                $contact = Configuration::contact();
                $contact->details->tel = $request->input('tel');
                $contact->details->url = $request->input('url');
                $contact->details->address = $request->input('address');
                $contact->details->company = $request->input('company');
                $contact->details->slogan = $request->input('slogan');

                return Configuration::contact($contact) ? $this->successResponse('修改成功') : $this->errorResponse('修改失败');
        }
    }


}