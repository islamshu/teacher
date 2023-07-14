<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function index(){
        $companys =Teacher::where('type','school')->orderby('id','desc')->get();
        return view('dashboard.companies.index')->with('companies',$companys); 
    }
    public function create(){
        return view('dashboard.companies.create'); 
    }
    public function login_school($id){
        $seller = Teacher::findOrFail(($id));
        auth('teacher')->login($seller, true);
        return redirect()->route('home');
    }
    public function store(Request $request){
        // dd($request->all());
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
            ],
            'commercialRegister' => 'required|mimes:pdf',
            'password' => 'required|string|min:8',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'confirm_password' => 'required|same:password'
        ]);
        $company = new Teacher();
        $company->type ='school';
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->password = Hash::make($request->input('password'));
        $company->commercialRegister = $request->commercialRegister->store('commercialRegister');
        $company->image =  $request->image->store('image');
        $company->save();
        return redirect()->route('schools.index')->with(['success'=>'تم اضافة المدرسة بنجاح']); 
    }
    public function show($id){
        $companys =Teacher::find($id);
        return view('dashboard.companies.show')->with('school',$companys); 
    }
    public function destroy($id){
        $companys =Teacher::find($id);
        $jobs = Job::where('user_id',$id)->delete();
        $companys->delete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
}
