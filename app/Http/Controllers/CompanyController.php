<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $companys =Company::orderby('id','desc')->get();
        return view('dashboard.companies.index')->with('companies',$companys); 
    }
    public function show($id){
        $companys =Company::find($id);
        return view('dashboard.companies.show')->with('school',$companys); 
    }
}
