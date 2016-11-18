<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Photo;
class UsersDashController extends Controller
{
    //
    public function index(){
        $user_id=Auth::user()->id;
        $categories=Category::where('user_id','=',$user_id)->get();
        $photos=Photo::where('user_id',$user_id)->get();
        return view('dashboard.main',compact('categories','photos'));
    }

    public function create($id){

    	
    	
        $category=Category::findOrFail($id);
        
    	return view('dashboard.create',compact('category'));
    }
   

    public function store(Request $request){

    		$file=$request->file('file');

            $filename=$file->getClientOriginalname();
            

        

            

            $file->move('files',$filename);

            Photo::create([
                'path'=>$filename,
                'file'=>'/files/'.$filename,
                'user_id'=>Auth::user()->id,
                'category_id'=>$request->input('category_id'),
                
                ]);
            

        }

    public function display($id){

        $user_id=Auth::user()->id;
        $categories=Category::where('user_id','=',$user_id)->get();
        $photos=Photo::where('user_id',$user_id)->where('category_id',$id)->get();
        return view('dashboard.main',compact('categories','photos'));

    }    
}
