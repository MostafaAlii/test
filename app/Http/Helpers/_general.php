<?php

// Admin Guard is (admin)
if(!function_exists('admin_guard')){
    function admin_guard(){
        return auth('admin');
    }
}

if(!function_exists('get_user_data')) {
    function get_user_data() {
        $guards = ['admin', 'web'];
        foreach($guards as $guard){
            if(auth($guard)->check()){
                return auth($guard)->user();
            }
        }
        return null;
    }
}

if(!function_exists('get_guard_name')) {
    function get_guard_name() {
        $guards = ['admin', 'web'];
        foreach($guards as $guard){
            if(auth($guard)->check()){
                return $guard;
            }
        }
        return null;
    }
}

function uploadImage($folder,$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
 }