<?php

if (!function_exists('is_user_followed')) {
    function is_user_followed(\App\Models\Product $product) : bool
    {
        if(auth()->user()){
            return (bool)auth()->user()->wishes()->find($product->id);
        }
        return false;
    }
}
