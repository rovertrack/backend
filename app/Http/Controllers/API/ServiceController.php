<?php

namespace App\Http\Controllers\API;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function Index(){
        return Services::all(); 
    }
    
    //
}
