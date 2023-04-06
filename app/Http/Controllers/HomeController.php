<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function teachers(Request $request)
    {
        $query = Teacher::query();
        if ($request->has('country') &&  $request->country != null) {
            $query->where('country', 'like', '%' . $request->input('country') . '%');
        }
    
        if ($request->has('educational_material') &&  $request->educational_material != null) {

            $query->where('educational_material', $request->input('educational_material'));
        }
        if ($request->has('years_experince') &&  $request->education_level != null) {
            $query->where('export_number', $request->input('years_experince'));
        }
                
        

        
        $teachers = $query->orderby('id','desc')->paginate(9);
        
        return view('frontend._fillter',compact('teachers','request'));
    }
    public function setting(){
        return view('dashboard.setting');
    }
    public function socal(){
        return view('dashboard.socal');
    }

    
    public function add_general(Request $request)
    {
        if ($request->hasFile('general_file')) {
            foreach ($request->file('general_file') as $name => $value) {
                if ($value == null) {
                    continue;
                }
                GeneralInfo::setValue($name, $value->store('general'));
            }
        }

        foreach ($request->input('general') as $name => $value) {
            if ($value == null) {
                continue;
            }
            GeneralInfo::setValue($name, $value);
        }

        return redirect()->back()->with(['success'=>'تم تعديل البيانات بنجاح']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
