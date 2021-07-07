<?php

namespace Courses\Courses\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL,
    Route,
    Redirect;
use Foostart\Sample\Models\Samples;
use Courses\Courses\Models\Course;
use Courses\Courses\Models\User;
use Courses\Courses\Models\UserType;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
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
            $courses = Course::getCourses();
            return view('package-courses::admin.courses.courses',['courses'=>$courses]);
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
        return view('package-courses::admin.courses.create_update');
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
    public function edit(Request $request)
    {
        $course = Course::getCourseById($request->id);
        return view('package-courses::admin.courses.create_update',['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Course::updateCourse($request);
        return redirect()->route('courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Course::deleteCourse($request);
        return redirect()->route('courses');
    }

    public function createCourse(Request $request)
    {
        Course::insertCourse($request);
        return redirect()->route('courses');
    }
}
