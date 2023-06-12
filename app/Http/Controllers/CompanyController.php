<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $companys =Teacher::where('type','school')->orderby('id','desc')->get();
        return view('dashboard.companies.index')->with('companies',$companys); 
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
