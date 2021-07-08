<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::latest()->paginate(5);
        return view('classes.index',compact('classes'))->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function getPluckSearch()
    {
        $classes = $this->pluck('class_name', 'class_id');
        return $classes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultyModel = new Faculty();
        $courseModel = new Course();
        $teacherModel = new User();

        $faculties = $facultyModel->AllFaculty();
        $courses = $courseModel->AllCourse();
        $teacher = $teacherModel->getTeacher();
        return view('classes.create', ['faculties' => $faculties, 'courses' => $courses,'teachers' => $teacher]);
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
            'class_name' => 'required',
            'teacher_id' => 'required',
            'course_id' => 'required',
            'faculty_id' => 'required',
            'status' => 'required',
        ]);
        
        Classes::create($request->all());
     
        return redirect()->route('classes.index')
                        ->with('success','Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Request  $request)
    {
        $classModel = new Classes();
            $searchClasses = $classModel->searchClassesName($request->search, $request->search_id);
        $size = count($searchClasses);
        return view('classes.search', ['classes' => $searchClasses, 'table'=>$request->search_id, 'value' => $request->search, 'size'=>$size])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        $facultyModel = new Faculty();
        $courseModel = new Course();
        $teacherModel = new User();

        $teachers = $teacherModel->getTeacher();
        $teacherID = $class->teacher_id;
        $teacherName = "";

        $faculties = $facultyModel->AllFaculty();
        $facultyID = $class->faculty_id;
        $facultyName = "";

        $courses = $courseModel->AllCourse();
        $courseID = $class->course_id;
        $courseName = "";

        foreach($teachers as $value){
            if($value->user_id == $teacherID){
                $teacherName = $value->user_name;
            }
        }

        foreach ($faculties as $value) {
            if($value->faculty_id == $facultyID){
                $facultyName = $value->faculty_name;
            }
        }

        foreach ($courses as $value) {
            if($value->course_id == $courseID){
                $courseName = $value->course_name;
            }
        }
        return view('Classes.edit',['class' => $class, 'faculties' => $faculties, 'facultyName' => $facultyName, 'courses' => $courses, 'courseName' => $courseName, 'teachers' => $teachers]);

        //['categories' => $categories]
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'class_name' => 'required',
            'teacher_id' => 'required',
            'course_id' => 'required',
            'faculty_id' => 'required',
            'status' => 'required',
        ]);

        $class->update($request->all());
     
        return redirect()->route('classes.index')
                        ->with('success','Class created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $class)
    {
        $class->delete();
    
        return redirect()->route('classes.index')
                        ->with('success','Class deleted successfully');
    }
}
