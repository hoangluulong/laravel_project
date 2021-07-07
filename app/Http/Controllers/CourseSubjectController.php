<?php

namespace App\Http\Controllers;

use App\Models\CourseSubject;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class CourseSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$coursesubjects = CourseSubject::latest()->paginate(5);
        $obj = new CourseSubject();
        $coursesubjects = $obj->paginate(5);
       
        return view('coursesubjects.index',compact('coursesubjects'))->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseModel = new Course();
        $courses = $courseModel->AllCourse();
        
        $subjectModel = new Subject();
        $subjects =  $subjectModel->AllSubject();

        return view('coursesubjects.create', ['courses' => $courses, 'subjects' => $subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'subject_id' => 'required',
            'status' => 'required',
        ]);
        
        CourseSubject::create($request->all());
     
        return redirect()->route('coursesubjects.index')
                        ->with('success','Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseSubject  $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function show(CourseSubject $coursesubject)
    {
        return view('coursesubjects.show',compact('coursesubject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseSubject  $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseSubject $coursesubject)
    {
        $courseModel = new Course();
        $courses = $courseModel->AllCourse();
        
        $subjectModel = new Subject();
        $subjects =  $subjectModel->AllSubject();

        return view('coursesubjects.edit',['coursesubject' => $coursesubject, 'courses' => $courses, 'subjects' => $subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseSubject  $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseSubject $coursesubject)
    {
        $request->validate([
            'course_id' => 'required',
            'subject_id' => 'required',
            'status' => 'required',
        ]);

        $coursesubject->update($request->all());
     
        return redirect()->route('coursesubjects.index')
                        ->with('success','Class created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseSubject  $courseSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseSubject $coursesubject)
    {
        $coursesubject->delete();
    
        return redirect()->route('coursesubjects.index')
                        ->with('success','Class deleted successfully');
    }
}
