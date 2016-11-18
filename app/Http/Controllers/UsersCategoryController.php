<?php

namespace App\Http\Controllers;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UsersCategoryController extends Controller
{
    //
    public function index(){

        return view('layouts.category');
    }

    public function store(Request $request){
        
        
        $user_id=Auth::user()->id;
        $users = Category::where('user_id',$user_id)->get();
        
        $arr=[];
        foreach($users as $user )
            {

                array_push($arr,$user->category_name);

            }
        $arr;

        $search=$request->category_name;
        if(in_array($search,$arr))
        {

            Session::flash('category_name','The Category Already exits');
            return  view('layouts.category');
        }

        $category_name=$request['category_name'];

        Category::create(['user_id'=>$user_id,'category_name'=>$category_name]);

       $categories=Category::where('user_id',$user_id)->get();
       $photos=Photo::where('user_id',$user_id)->get();
        return view('dashboard.main',compact('categories','photos'));
    }
}
