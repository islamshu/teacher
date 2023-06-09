<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sliders.index')->with('sliders',Slider::orderby('id','desc')->get());
    }
    public function update_status(Request $request){
        $slider = Slider::find($request->sliders_id);
        $slider->status = $request->status;
        $slider->save();
        return $slider;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
        ]);
        $slider = new Slider();
        $slider->image = $request->image->store('sliders');
        if($slider->url == null){
            $slider->url = '#';  
        }else{
            $slider->url = $request->url;
        }
        $slider->status = 1;
        $slider->save();
        return redirect()->route('sliders.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit')->with('slider',$slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'url'=>'required'
        ]);
        $slider->image = $request->image->store('sliders');
        if($slider->url == null){
            $slider->url = '#';  
        }else{
            $slider->url = $request->url;
        }
        $slider->save();
        return redirect()->route('sliders.index')->with(['success'=>'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
}
