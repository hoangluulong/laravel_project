<?php

namespace App\Http\Controllers;

use App\Models\ClassUser;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

class ClassUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classusers = ClassUser::latest()->paginate(5);
        return view('classusers.index',compact('classusers'))->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classModel = new Classes();
        $classes = $classModel->AllClass();

        $userModel = new User();
        $users = $userModel->AllUser();
        return view('classusers.create', ['classes' => $classes, 'users' => $users]);
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
            'user_id' => 'required',
            'class_id' => 'required',
            'status' => 'required',
        ]);
        
        ClassUser::create($request->all());
     
        return redirect()->route('classusers.index')
                        ->with('success','Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassUser  $classuser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $classuserModel = new ClassUser();
        $searchClassUser = $classuserModel->searchClassUserID($request->search, $request->search_id);
        $size = count($searchClassUser);
        return view('classusers.search', ['classusers' => $searchClassUser, 'table'=>$request->search_id, 'value' => $request->search, 'size'=>$size])->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassUser  $classuser
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassUser $classuser)
    {
        $classModel = new Classes();
        $classes = $classModel->AllClass();

        $userModel = new User();
        $users = $userModel->AllUser();

        return view('classusers.edit',['classuser' => $classuser, 'classes' => $classes, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassUser  $classuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassUser $classuser)
    {
        $request->validate([
            'user_id' => 'required',
            'class_id' => 'required',
            'status' => 'required',
        ]);

        $classuser->update($request->all());
     
        return redirect()->route('classuser.index')
                        ->with('success','Class created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassUser  $classuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassUser $classuser)
    {
        $classuser->delete();
    
        return redirect()->route('classuser.index')
                        ->with('success','Classusers deleted successfully');
    }
}
