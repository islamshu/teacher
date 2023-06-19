<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use Illuminate\Validation\Rule;
class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::where('type','teacher')->orderby('id','desc')->get();
        return view('dashboard.teachers.index')->with('teachers',$teachers);
    }
    public function create(){
        return view('dashboard.teachers.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('teachers', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                Rule::unique('companies', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                Rule::unique('users', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                // Rule::unique('admins', 'email'),
            ],
            'whataspp_number'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'cv' => 'required|mimes:pdf',
            'country' => 'required',
            'years_of_experience' => 'required',
            'job' => 'required',
            'educational_material' =>$request->job == 'معلم'? 'required':'',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password'
        ]);
        $taecher = new Teacher();
        $taecher->type = 'teacher';
        $taecher->name = $request->name;
        $taecher->email = $request->email;
        $taecher->whataspp_number = $request->whataspp_number;
        $taecher->password = Hash::make($request->input('password'));
        $taecher->country = $request->country;
        $taecher->export_number = $request->years_of_experience;
        $taecher->educational_material = $request->educational_material;
        $taecher->cv = $request->cv->store('teacher_cv');
        $taecher->image = $request->image->store('teacher');
        $taecher->job = $request->job;
        $taecher->save();
        return redirect()->route('teachers.index')->with(['success'=>'تم اضافة المعلم بنجاح']);
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
