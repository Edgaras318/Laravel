<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use Validator;
class APIController extends Controller
{
   public function Blog()
   {
       return response()->json(Blog::get(),200);
   }
    public function BlogById($id){
        $blog=Blog::find($id);
        if(is_null($blog)){
            return response()->json(["message"=>"Record not found!"],404);
        }
        return response()->json( $blog, 200);
    }
    public function BlogSave(Request $request){
        $rules = [
            'user_id'=>'required',
            'title'=>'required|min:3',
            'description'=>'required|min:10',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $blog=Blog::create($request->all());
        return response()->json($blog,201);
    }
    public function BlogUpdate(Request $request,$id){
        $blog=Blog::find($id);
        if(is_null($blog)){
            return response()->json(["message"=>"Record does not exist!"],404);
        }
        $blog->update($request->all());
        return response()->json($blog,200);
    }
    public function BlogDelete(Request $request,$id){
        $blog=Blog::find($id);
        if(is_null($blog)){
            return response()->json(["message"=>"Record does not exist!"],404);
        }
        $blog->delete();
        return response()->json(null,204);
    }
    public function User()
    {
        return response()->json(User::get(),200);
    }
     public function UserById($id){
         $user=User::find($id);
         if(is_null($user)){
             return response()->json(["message"=>"Record not found!"],404);
         }
         return response()->json( $user, 200);
     }
     public function UserSave(Request $request){
         $rules = [
             'password'=>'required|min:9',
             'email'=>'required|min:3',
             'name'=>'required|min:3',
         ];
         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()){
             return response()->json($validator->errors(),400);
         }
         $user=User::create($request->all());
         return response()->json($user,201);
     }
     public function UserUpdate(Request $request,$id){
         $user=User::find($id);
         if(is_null($user)){
             return response()->json(["message"=>"Record does not exist!"],404);
         }
         $user->update($request->all());
         return response()->json($user,200);
     }
     public function UserDelete(Request $request,$id){
         $user=User::find($id);
         if(is_null($user)){
             return response()->json(["message"=>"Record does not exist!"],404);
         }
         $user->delete();
         return response()->json(null,204);
     }
}
