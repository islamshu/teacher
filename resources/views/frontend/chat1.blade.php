@extends('layouts.index')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        @vite('resources/js/app.js')
        <style>
        .inbox_msg {
            padding: 10px;
            height: 400px;
            overflow: auto;
        }
    </style>
    <style>
        body {
            margin-top: 20px;
            background: #eee;
        }

        .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            /* width: 100%; */
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .box.box-primary {
            border-top-color: #3c8dbc;
        }

        .app {
            margin-top: 10% !important;
        }

        .box-body {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 10px;
        }

        .direct-chat .box-body {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            position: relative;
            overflow-x: hidden;
            padding: 0;
        }

        .chat {
            background: #e9e9e9;
            padding: 2px;
            border-radius: 4px;
        }

        .direct-chat-messages {
            padding: 10px;
            height: 400px;
            overflow: auto;
        }
        .chat_ib{
            margin: 5%
        }
        a{
            text-decoration:none !important
        }
    </style>
@endsection
@section('content')
    <div class="container app" style="margin-top:10%">
        <div class="row justify-content-center">
            <div class="section-header">
                <h2>Chat with : {{ $teacher->name }}</h2>
              </div>
            <div class="inbox_people col-md-3">
                <!-- Display list of users -->
                @foreach ($users->where('id','!=',auth('teacher')->id()) as $user)
                    <div class="chat_list" id="{{ $user->id }}" onclick="loadMessages(this.id)">
                        <div class="chat_people">
                            <div class="chat_img" style="display: flex;/* border: beige; */border-style: groove;height: 20% !important;margin: 5px;">
                                <img style="height: 100%" src="{{ asset('uploads/' . $user->image) }}" width="50" height="50"
                                    alt="{{ $user->name }}">
                                <div class="chat_ib" >
                                    <h5><a href="{{ route('chat_user',encrypt($user->id)) }}">{{ $user->name }}</a> <br>
                                       </h5>
                                       @php
                                       $id1 =$user->id;
                                       $id2=auth('teacher')->id();
                                           $message = App\Models\Messagee::where('sender_id',$id1)->Where('receiver_id',$id2)->orwhere('sender_id',$id2)->where('receiver_id',$id1)->orderby('id','desc')->first()
                                       @endphp
                                       <span>{{ $message->created_at }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="col-md-8 box box-primary direct-chat direct-chat-primary">
                <div class="box-body">
                    <div class="direct-chat-messages" id="messages">
                        @foreach ($messages as $item)
                            <p class="chat"><strong>({{ $item->created_at->format('Y-m-d H:m:s') }}) <br>{{   $item->sender_id == get_guard_id() ? 'me' : get_tacher($item->sender_id)->name }}</strong>:
                                {{ $item->message }}</p>
                        @endforeach

                    </div>



                </div>

                <div class="box-footer">
                    <form action="#" method="post" id="message_form">
                        <div class="input-group">
                            <input type="text" name="message" id="message" placeholder="Type Message ..."
                                class="form-control">
                            <input type="hidden" value="{{ $teacher->id }}" id="reseve_id">
                            <input type="hidden" value="{{ get_guard_id() }}" id="user_id">


                            <span class="input-group-btn">
                                <button type="submit" id="send_message" class="btn btn-primary btn-flat">Send</button>
                            </span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
