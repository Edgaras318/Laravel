<?php

namespace App\Http\Controllers;
use App\User;
use Image;
use Storage;
use Illuminate\Http\Request;
use Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $user_id = auth()->user()->id;
    //     $user = User::find($user_id);
    //     return view('/user/profile')->with('blogs', $user->blogs);
    // }
    public function index()
    {
        $avatar = auth()->user()->avatar;
        //$user = User::find($avatar);
        return view('/user/profile', array('user' => auth()->user()->avatar));
    }
    public function update_avatar(Request $request){
        //$user = User::find($id);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('/uploads/avatars/' . $filename);
            $watermark = Image::make(public_path('images/' . 'watermark.png'))->brightness(51);
            // create empty canvas with background color
            $mask =Image::make($avatar)->resize(200,200);
            //Image::make($image)->resize(250,250)->insert($watermark->resize(250), 'center')->save($location);
            $img = Image::canvas(200, 200);

            // define polygon points
            $points = array(
                99,0,
                0,0,
                0,200,
                200,200,
                200,0,
                101,0,
                120,60,
                180,60,
                135,100,
                165,180,
                100,130,
                35,180,
                65,100,
                20,60,
                80,60
            );

            // draw a filled blue polygon with red border
            $img->polygon($points, function ($draw) {
                $draw->background('#ffffff');
            });
            
            $mask->fill($img);
            Image::make($mask)->save($location);
            //$user = Auth::user();
            $user = auth()->user();
            $user->avatar = $filename;
            $user->save();
    }
    return view('/user/profile', array('user' => auth()->user()->avatar));
}
   // public function display_image(Request $request)
  //  {
      //  $watermark = Image::make(public_path('images/' . 'watermark.png'))->brightness(51);
        //->insert($watermark->resize(250), 'center')
   // }
    public function edit(){
        if(auth()->user()){
            $user = User::find(auth()->user()->id);
            if($user){
            return view('user.edit')->withUsers($user);
            } else {
                return redirect()->back();
            }
        }
     else {
        return redirect()->back();
    }
    }
    public function update(Request $request){
        $user = User::find(auth()->user()->id);
        if($user){
            $validate = null;
            if(auth()->user()->email === $request['email']){
                $validate = $request->validate([
                    'name' => 'required|min:2',
                    'email' => 'required|email'
                ]);
            }else{
            $validate = $request->validate([
                'name' => 'required|min:2',
                'email' => 'required|email|unique:users'
            ]);
            }
            if($validate){
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->save();

                $request->session()->flash('success', 'Your details have now been updated!');
                return redirect('/user/profile');
                //return redirect()->back();
            }else{
            return redirect()->back();
            }
        }else{
            return redircet()->back();
        }
    }
    public function passwordUpdate(Request $request){
        //$validate = null;
        $validate = $request->validate([
            'oldPassword' => 'required|min:3',
            'password' => 'required|min:7|required_with:password_confirmation'
        ]);
        $user = User::find(auth()->user()->id);
        if($user){
            if (Hash::check($request['oldPassword'], $user->password) && $validate){
                $user->password = Hash::make($request['password']);

                $user->save();
                $request->session()->flash('success', 'Your password have been updated!');
                return redirect('/user/profile');

            }else{
                $request->session()->flash('error', 'The entered password doest not match your current password!');
                return redirect()->back();
        }
        }
    }
    public function passwordEdit(){
        if(auth()->user()){
            return view('user.password');
        }
     else {
        return redircet()->back();
    }
}
}

