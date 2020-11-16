<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
//use Intervention\Image\ImageManagerStatic as Image;
//use Illuminate\Support\Facades\Storage;
use Image;
use Storage;
use PDF;
use Gate;
class BlogController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        $blog = Blog::take(3)->latest()->paginate(3);

        return view('blogs.index', ['blogs' => $blog]);
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        //$this->authorize('update', $blog);
        return view('blogs.show', ['blogs' => $blog]);
        //return response()->json(Blog::get(),200);
/* return response()
            ->view('blogs.show',$blog, 200)
            ->header('blogs', $blog);*/
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        Gate::authorize('update', $blog);
        // Gate::define('update', function ($user,$blog) {
        //     return $user->id === $blog->user_id
        //                 ? Response::allow()
        //                 : Response::deny('You must be a super administrator.');
        // });
        //$this->authorize('view', $blog);
        // check for correct user
        //if(auth()->user()->id !==$blog->user_id)
        //{
          //  return redirect('/blogs')->with('error', 'Unauthorized page!');
      //  }
        return view('blogs.edit', ['blogs' => $blog]);
    }
    public function update(Request $request, $id)
    {

        $blog = Blog::find($id);
        $this->authorize('update', $blog);
       // $id->can('update', $blog);
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required|min:5|max:255'
        ]);
        // update blog
       // $blog = Blog::find($id);

        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
            // Add the new photo
            if($request->hasFile('featured_image')){
                $image = $request->file('featured_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $filename2 = 'pixelated'. time() . '.' . $image->getClientOriginalExtension();
                $location2 = public_path('images/' . $filename2);
                $location = public_path('images/' . $filename);
                $watermark = Image::make(public_path('images/' . 'watermark.png'))->brightness(51);
                //$img = Image::make('public/foo.jpg')->greyscale();
                Image::make($image)->resize(250,250)->insert($watermark->resize(250), 'center')->save($location);
                $img = Image::make($image)->resize(250,250)->insert($watermark->resize(250), 'center')->pixelate();
                $img->save($location2);
               //Image::make($image)->text('The quick brown fox jumps over the lazy dog.', 120, 100)->resize(250,250)->save($location);
                $oldFilename = $blog->featured_image;
            // Update the database
            $blog->featured_image = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }
        $blog->save();

        return redirect('/blogs/'.$id)->with('success', 'Blog Updated!');
    }
    public function create()
    {
        return view('blogs.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'featured_image' => 'image|nullable|max:1999'
        ]);

        // Create Post
        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->user_id = auth()->user()->id;
         if($request->hasFile('featured_image')){
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $filename2 = 'pixelated'. time() . '.' . $image->getClientOriginalExtension();
        $filename3 = 'original'. time() . '.' . $image->getClientOriginalExtension();
        $location3 = public_path('images/' . $filename3);
        $location2 = public_path('images/' . $filename2);
        $location = public_path('images/' . $filename);
        $watermark = Image::make(public_path('images/' . 'watermark.png'))->brightness(51);
        Image::make($image)->save($location);
        //$img = Image::make('public/foo.jpg')->greyscale();
        Image::make($image)->resize(250,250)->insert($watermark->resize(250), 'center')->save($location);
        $img = Image::make($image)->resize(250,250)->insert($watermark->resize(250), 'center')->pixelate();
        $img->save($location2);
        $blog->featured_image = $filename;

        }
        $blog->save();

        return redirect('/blogs')->with('success', 'Blog Created!');
    }
    public function displayImage(Request $request)
    {
        $watermark = Image::make(public_path('images/' . 'watermark.png'))->brightness(51);
        //->insert($watermark->resize(250), 'center')
    }
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $this->authorize('delete', $blog);
           // return redirect('/blogs')->with('error', 'Unauthorized page!');
       // if($blog->cover_image != 'noimage.jpg')
       // {
            Storage::delete($blog->featured_image);
       // }
        $blog->delete();
        return redirect('/blogs')->with('success', 'Blog deleted!');
    }
    public function downloadPDF($id) {
        $blogs = Blog::find($id);
        $pdf = PDF::loadView('pdf', compact('blogs'));

        return $pdf->download('blog_'.$id.'.pdf');
}
}

