<?php
  
namespace App\Http\Controllers;
   
use App\Models\Faculty;
use Illuminate\Http\Request;
  
class FacultyController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::latest()->paginate(5);
    
        return view('faculties.index',compact('faculties'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
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
            'faculty_name' => 'required',
            'status' => 'required',
        ]);
    
        Faculty::create($request->all());
     
        return redirect()->route('faculties.index')
                        ->with('success','Faculty created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $facultyModel = new Faculty();
        $searchFacultyName = $facultyModel->searchFacultyName($request->search);
        $size = count($searchFacultyName);
        return view('faculties.search', ['faculties' => $searchFacultyName, 'value' => $request->search, 'size'=>$size])->with('i', (request()->input('page', 1) - 1) * 5);
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    { 
        return view('faculties.edit',compact('faculty'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'faculty_name' => 'required',
        ]);

        $faculty->update($request->all());
    
        return redirect()->route('faculties.index')
                        ->with('success','Faculty updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
    
        return redirect()->route('faculties.index')
                        ->with('success','Faculty deleted successfully');
    }
}