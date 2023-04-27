<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageSent;
use App\Events\Message;
use App\Events\NewChatMessage;
use App\Models\Chat;
use App\Models\Messagee;
use App\Models\StartChat;
use App\Models\Teacher;
use App\Notifications\chat as NotificationsChat;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Crypt;

class ChatController extends Controller
{
    public function chat_user($id)
    {
        $id = Crypt::decrypt($id);
        if (check_login() == 1) {
            if (auth('teacher')->check()) {
                if ($id == get_guard_id()) {
                    return abort(404);
                }
                $teacher = Teacher::find($id);
                $id1 = get_guard_id();
                $id2 = $teacher->id;

                $conversations = Messagee::where('sender_id', $id1)->orWhere('receiver_id', $id1)->get();
                $users = $conversations->map(function ($conversation) use ($id1) {
                    if ($conversation->sender_id == $id1) {
                        return $conversation->receiver;
                    }
                    return $conversation->sender;
                })->unique();
                $messages = Messagee::where('sender_id', $id1)->Where('receiver_id', $id2)->orwhere('sender_id', $id2)->where('receiver_id', $id1)->get();
                return view('frontend.chat1')->with('users', $users)->with('teacher', $teacher)->with('messages', $messages);
            }
        }
        return abort(404);
    }
    public function send_message(Request $request)
    {
        if ($request->message != null) {
            $chat = StartChat::where('school_id', get_guard_id())->where('teacher_id', $request->reserve_id)->first();
            if (!$chat) {
                $c = new StartChat();
                $c->school_id = get_guard_id();
                $c->teacher_id = $request->reserve_id;
                $c->save();
                $user = Teacher::find(get_guard_id());
                $ss = Teacher::find($request->reserve_id);
                $url = route('chat_user',encrypt($c->school_id));
                $data=[
                    'title'=>'تم بدء المحادثة مع مدرسة ' .$ss->name,
                    'url'=>$url,
                    'time'=>now(),
                ];
                $user->notify(new NotificationsChat($data));
            }
            $mesagee = new Messagee();
            $mesagee->sender_id = get_guard_id();
            $mesagee->receiver_id = $request->reserve_id;
            $mesagee->message = $request->message;
            $mesagee->save();
            $time = $mesagee->created_at->format('Y-m-d H:m:s');
            event(new Message(get_guard_user()->name, get_guard_user()->email, $request->message, $mesagee->receiver_id, $mesagee, $time));
            return ['success' => true];
        }
        return ['success' => true];
    }
    public function index()
    {
        return view('frontend.chat');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $user = get_guard_user();
        $chat = new Chat();
        $chat->sender_id = get_guard_id();
        $chat->sender_guard = get_guard_name();
        $chat->message = $request->message;
        $chat->resever_id = $request->resever_id;
        $chat->resever_guard = $request->resever_guard;
        $chat->save();
        $userr = Teacher::find($chat->sender_id);
        
        $data = [
            'username' => $userr->name,
            'message' => $message,
            'avatar' => asset('uploads/general/8PN9WLSMkOajpp8BLLRN9xPE2jvmsMNlj9POnF91.jpg'),
        ];

        event(new NewChatMessage($data));
    }
    public function end_chat(Request $request)
    {
        $school = (int)$request->school_id;
        $teacher = (int)$request->teacher_id;
        $chat = StartChat::where('school_id',$school)->where('teacher_id',$teacher)->orderby('id','desc')->first();
        $chat->is_finish = 1;
        $chat->save();
        $user = Teacher::find($teacher);
        $ss = Teacher::find($school);
        $url = route('chat_user',encrypt($school));

        $data=[
            'title'=>'تم انتهاء المحادثة مع مدرسة ' .$ss->name,
            'url'=>$url,
            'time'=>now(),
        ];
        $user->notify(new NotificationsChat($data));
    }
    public function start_chat(Request $request)
    {
        $school = (int)$request->school_id;
        $teacher = (int)$request->teacher_id;
        $c = new StartChat();
        $c->school_id = $school;
        $c->teacher_id = $teacher;
        $c->save();
        $user = Teacher::find($teacher);
        $ss = Teacher::find($school);
        $url = route('chat_user',encrypt($school));

        $data=[
            'title'=>'تم بدء المحادثة مع مدرسة ' .$ss->name,
            'url'=>$url,
            'time'=>now(),
        ];
        $user->notify(new NotificationsChat($data));



      
    }
}
