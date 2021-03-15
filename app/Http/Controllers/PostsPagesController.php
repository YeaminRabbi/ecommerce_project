<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
class PostsPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $posts = Post::all();
        return view ('pages.posts.list',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'title' => 'required|string',
            'category' => 'required|string',
            'firstDescription' => 'required|string',
            'secondDescription' => 'required|string',
            'thirdDescription' => 'required|string',
            'fourthDescription' => 'required|string',
            'fifthDescription' => 'required|string',
            'highlightedText' => 'required|string',
            'image' => 'required|image',

        ]);

        $posts = new Post;

        $posts->title = $request->title;
        $posts->category= $request->category;
        $posts->firstDescription = $request->firstDescription;
        $posts->secondDescription = $request->secondDescription;
        $posts->thirdDescription = $request->thirdDescription;
        $posts->fourthDescription = $request->fourthDescription;
        $posts->fifthDescription = $request->fifthDescription;
        $posts->highlightedText = $request->highlightedText;
        

        $image  = $request->file('image');
        Storage::putFile('public/img/',$image);
        $posts->image ="storage/img/".$image->hashName();

        $posts->save();
        
        return redirect()->route('admin.posts.create')->with('success','New Posts Category & details created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts = Post::find($id);
        return view('pages.posts.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->category= $request->category;
        $posts->firstDescription = $request->firstDescription;
        $posts->secondDescription = $request->secondDescription;
        $posts->thirdDescription = $request->thirdDescription;
        $posts->fourthDescription = $request->fourthDescription;
        $posts->fifthDescription = $request->fifthDescription;
        $posts->highlightedText = $request->highlightedText;
        
        if($request->file('image')){
            $image  = $request->file('image');
            Storage::putFile('public/img/',$image);
            $posts->image ="storage/img/".$image->hashName();
        }
        $posts->save();
        
        return redirect()->route('admin.posts.create')->with('success','New Posts Category & details updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('admin.posts.list')->with('success',"Post Deleted Successfully");
    }
}
