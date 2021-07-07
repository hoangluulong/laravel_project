<?php
  
namespace App\Http\Controllers;
   
use App\Models\Course;
use Illuminate\Http\Request;
  
class CourseController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(5);

        return view('courses.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = range(date('Y'), 2010);
        return view('courses.create', ['years' => $years]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'course_name', 'course_semester', 'course_year', 'status'
        $request->validate([
            'course_name' => 'required',
            'course_semester' => 'required',
            'course_year' => 'required',
            'status' => 'required',
        ]);
    
        Course::create($request->all());
     
        return redirect()->route('courses.index')
                        ->with('success','Course created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request  $request)
    { 
        $courseModel = new Course();
        $searchCourseName = $courseModel->searchCourseName($request->search, $request->search_id);
        $size = count($searchCourseName);
        return view('courses.search', ['courses' => $searchCourseName, 'table'=>$request->search_id, 'value' => $request->search, 'size'=>$size])->with('i', (request()->input('page', 1) - 1) * 5);
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    { 
        $years = range(date('Y'), 2010);
        return view('courses.edit', ['course' => $course, 'years' => $years]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_name' => 'required',
            'course_semester' => 'required',
            'course_year' => 'required',
        ]);

        $course->update($request->all());
    
        return redirect()->route('courses.index')
                        ->with('success','Course updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
    
        return redirect()->route('courses.index')
                        ->with('success','Course deleted successfully');
    }

}