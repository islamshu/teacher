<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
}
