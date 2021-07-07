<?php

namespace Courses\Courses\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL,
    Route,
    Redirect;
use Foostart\Sample\Models\Samples;
use Courses\Courses\Models\User;
use Courses\Courses\Models\UserType;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $data = array();
    public $courses;
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('user_detail')) {
            return redirect()->route('profile');
        } else {
            session()->flush();
            return view('package-courses::auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        return User::login($request);
    }

    public function registration()
    {
        return view('package-courses::auth.register');
    }

    public function profile()
    {
        return !empty(session()->get('user_detail')) ? view('package-courses::admin.profile') : redirect()->route('login.form');
    }

    public function logout()
    {
        return User::logout();
    }

    public function regist(Request $request)
    {
        return User::regist($request);
    }
}
