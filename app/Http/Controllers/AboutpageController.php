<?php

namespace App\Http\Controllers;

use App\Models\Aboutpage;
use Illuminate\Http\Request;

class AboutpageController extends Controller
{
    public function index(){
        return view('dashboard.about')->with('about',Aboutpage::first());
    }
    public function update(Request $request){
        $about = Aboutpage::first();
        if($request->image != null){
            $about->image = $request->image->store('about');
        }
        $about->title = $request->title;
        $about->body = $request->body;
        $about->save();
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
}
