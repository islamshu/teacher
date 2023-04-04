<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::orderby('id','desc')->get();
        return view('dashboard.teachers.index')->with('teachers',$teachers);
    }
    public function show($id){
        $teacher = Teacher::find($id);
        return view('dashboard.teachers.show')->with('teacher',$teacher);
    }
    public function destroy($id){
        $teacher = Teacher::find($id);
        $teacher->forceDelete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
}
