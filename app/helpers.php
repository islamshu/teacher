<?php

use App\Models\General;
use App\Models\GeneralInfo;
use App\Models\Product;
use App\Models\Teacher;

function check_login(){
    if(auth('company')->check() || auth('teacher')->check()   || auth()->check()){
        return 1;
    }else{
        return 0;
    }
}
function school_login(){
    if(auth('teacher')->check() &&  auth('teacher')->user()->type =='school' ){
        return 1;
    }else{
        return 0;
    }
}
function get_general_value($key)
{
   $general = GeneralInfo::where('key', $key)->first();
   if($general){
       return $general->value;
   }

   return '';
}
function get_guard_name(){
    if(auth('company')->check()){
        return 'company';
    }elseif(auth('teacher')->check()){
        return 'teacher';
    }elseif(auth()->check()){
        return 'web';
    }
}
function get_guard_id(){
    if(auth('company')->check()){
        return auth('company')->id();
    }elseif(auth('teacher')->check()){
        return auth('teacher')->id();
    }elseif(auth()->check()){
        return auth('web')->id();
    }
}
function get_tacher($id){
   $teacher =  Teacher::find($id);
    return $teacher;
}
function get_guard_user(){
    if(auth('company')->check()){
        return auth('company')->user();
    }elseif(auth('teacher')->check()){
        return auth('teacher')->user();
    }elseif(auth()->check()){
        return auth('web')->user();
    }
}
function notif(){
    if(auth('teacher')->check()){
        return auth('teacher')->user()->unreadNotifications;
    }elseif(auth()->check()){
        return auth('web')->user()->unreadNotifications;
    }
}
function get_status_class_teacher($status){
    if($status == 1){
        return 'success';
    }elseif($status == 2){
        return 'warning';
    }elseif($status == 3){
        return 'danger';
    }
}
function get_status_teacher($status){
    if($status == 1){
        return 'متاح';
    }elseif($status == 2){
        return 'في محادثة مع مدرسة';
    }elseif($status == 3){
        return 'تم التعيين';
    }
}



 
