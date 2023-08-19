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
    public function update_status_paid(Request $request){
        $slider = Teacher::find($request->teacher_id);
        $slider->is_paid = $request->is_paid;
        $slider->save();
        return $slider;
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
    public function edit_teacher_stauts(Request $request){
        $teacher = Teacher::find($request->user_id);
        $teacher->status = $request->new_value; 
        $teacher->save();
        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);


    }
    public function show($id){
        $teacher = Teacher::find($id);
        return view('dashboard.teachers.show')->with('teacher',$teacher);
    }
    public function edit($id){
        $teacher = Teacher::find($id);
        return view('dashboard.teachers.edit')->with('teacher',$teacher);
    }
    public function update(Request $request , $id){
        $taecher =  Teacher::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('teachers', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($id),
                Rule::unique('companies', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($id),
                Rule::unique('users', 'email')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })->ignore($id),
            ],
            'whataspp_number'=>'required',
            'country' => 'required',
            'years_of_experience' => 'required',
            'job' => 'required',
            'educational_material' =>$request->job == 'معلم'? 'required':'',
        
        ]);
        if($request->password != null){
            $request->validate([
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|same:password'
            ]);
        }
        if($request->image != null){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $taecher->image = $request->image->store('teacher');

        }
        if($request->cv != null){
            $request->validate([
                'cv' => 'required|mimes:pdf',
            ]);
            $taecher->cv = $request->cv->store('teacher_cv');

        }
        $taecher->type = 'teacher';
        $taecher->name = $request->name;
        $taecher->email = $request->email;
        $taecher->whataspp_number = $request->whataspp_number;
        if($request->password != null){
            $taecher->password = Hash::make($request->input('password'));
        }
        $taecher->country = $request->country;
        $taecher->export_number = $request->years_of_experience;
        $taecher->educational_material = $request->educational_material;
        $taecher->job = $request->job;
        $taecher->save();
        return redirect()->route('teachers.index')->with(['success'=>'تم تعديل المعلم بنجاح']);
    }
    public function destroy($id){
        $teacher = Teacher::find($id);
        $teacher->forceDelete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
}
