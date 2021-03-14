<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

class PostController extends Controller
{
    public function post( post $post){

    	//passa na url o post mas o slug do post selecionado
    	//return $post;
    	return view('user.post',compact('post'));
    }
}
