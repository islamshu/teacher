<?php

use App\Models\General;
use App\Models\GeneralInfo;
use App\Models\Product;


function check_login(){
    if(auth('company')->check() || auth('teacher')->check()   || auth()->check()){
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



 
