<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Traits\AuthenticatesUsers;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Username column.
     * 
     * @var string
     */
    protected $username = 'username';
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
}
