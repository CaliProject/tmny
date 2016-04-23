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
        $this->init();

        return view('admin.home');
    }

    /**
     * Initialize about data.
     */
    public function init()
    {
        $this->initAbout();
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
     * Init about data.
     */
    public function initAbout()
    {
        if (! $this->getAboutData())
            Configuration::aboutContent(["header" => 'header', "content" => 'content']);

        if (! $this->getAboutHeader())
            Configuration::aboutHeader(['body' => 'body']);
    }

    /**
     * Get about data.
     *
     * @return mixed
     */
    public function getAboutData()
    {
        return Configuration::aboutContent();
    }

    /**
     * Get header data of about.
     *
     * @return mixed
     */
    public function getAboutHeader()
    {
        return Configuration::aboutHeader();
    }

    /**
     * Update about header data.
     *
     * @param $abouts
     * @return mixed
     */
    public function updateAboutHeader($abouts)
    {
        return Configuration::aboutHeader($abouts);
    }

    /**
     * Update the about data.
     *
     * @param $abouts
     * @return mixed
     */
    public function updateAboutData($abouts)
    {
        return Configuration::aboutContent($abouts);
    }

    /**
     * Show about page.
     *
     * @return mixed
     */
    public function showAbout()
    {
        $abouts = $this->getAboutData();
        $aboutHeaders = $this->getAboutHeader();
        $aboutHeader = $aboutHeaders->body;

        return view('admin.about.home', ['abouts' => $abouts, 'header' => $aboutHeader]);
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
     * Show edit page for about.
     *
     * @param $id
     * @return mixed
     */
    public function showEditAbout($id)
    {
        $abouts = $this->getAboutData();
        $abouts = $abouts[$id];

        return view('admin.about.edit', ['abouts' => $abouts, 'id' => $id]);
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
        $this->validate($request, [
            'header'  => 'required',
            'content' => 'required',
        ]);
        $abouts = $this->getAboutData();
        $abouts[$id]->header = $request->input('header');
        $abouts[$id]->content = $request->input('content');

        return $this->updateAboutData($abouts) ?
            $this->showAbout() :
            $this->errorResponse([
                'message' => '修改失败'
            ]);
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
