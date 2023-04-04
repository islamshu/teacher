<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::orderby('id','desc')->get();
        return view('dashboard.services.index')->with('services',$services);
    }
    public function create(){
        return view('dashboard.services.create');
    }
    public function store(Request $request){
        $service =  new Service();
        $service->title = $request->title;
        $service->image = $request->image->store('services');
        $service->description = $request->description;
        $service->save();
        return redirect()->route('services.index')->with(['success'=>'تم الاضافة بنجاح']);
    }
    public function edit($id){
        return view('dashboard.services.edit')->with('serive',Service::find($id));
    }
    public function update(Request $request,$id){
        $service =  Service::find($id);
        $service->title = $request->title;
        if($request->image != null){
            $service->image = $request->image->store('services');
        }
        $service->description = $request->description;
        $service->save();
        return redirect()->route('services.index')->with(['success'=>'تم التعديل بنجاح']);
    }
    public function destroy($id){
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('services.index')->with(['success'=>'تم الحذف بنجاح']);

    }
}
