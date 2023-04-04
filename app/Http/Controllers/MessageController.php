<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Validator;

class MessageController extends Controller
{
    public function index(){
        $message = Message::orderby('id','desc')->get();
        return view('dashboard.messages.index')->with('messages',$message);
    }
    public function show($id){
        $message = Message::find($id);
        $message->status = 1;
        $message->save();
        return view('dashboard.messages.show')->with('message',$message);
    }
    public function contact_us(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message'=>'required'
        ]);

        // If validation fails, return the errors as JSON
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->status = 0;
        $message->save();
        return response()->json(['success' => 'true'], 200);
    }
    public function destroy($id){
        $message = Message::find($id);
      
        $message->delete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
}
