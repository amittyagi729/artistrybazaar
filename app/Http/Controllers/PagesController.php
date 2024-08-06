<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function list()
    {
        $pages = Post::where('post_type', 'page')->orderBy("id", "ASC")->get();
        return view("admin.pages.list", compact("pages"));
    }

    public function create()
    {
        return view("admin.pages.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate(
            [
                "title" => "required",
                "slug" => "required|unique:core_posts,slug",
            ],
            [
                "title.required" => "The title name field is required.",
                "slug.required" => "The slug name field is required.",
            ]
        );

        if ($request->file("bannerpic")) {
            $file = $request->file("bannerpic");
            $filename = rand() . date("YmdHi") . $file->getClientOriginalName();
            $file->move(public_path("/assets/uploads/banners/"), $filename);
        } else {
            $filename = "";
        }

        $pages = new Post();
        $pages->title = $request->title;
        $pages->slug = $request->slug;
        $pages->description = $request->description;
        $pages->image = $filename;
        $pages->post_type = $request->post_type;
        $pages->meta_title = $request->meta_title;
        $pages->meta_description = $request->meta_description;
        $pages->meta_keyword = $request->meta_keyword;
        $pages->status = $request->status;
        $pages->save();

        notify()->success("Page has been successfully saved.");
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $pages = Post::find($id);
        return view("admin.pages.edit", ["pages" => $pages]);
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
        $page = Post::find($id);
        $validated = $request->validate([
            "title" => "required",
            "slug" => "required|unique:core_posts,slug," . $page->id . ",id",
        ]);

        $page->title = $request->title;
        $page->description = $request->description;
        $page->slug = Str::slug($request->slug);
        $page->status = $request->status;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keyword = $request->meta_keyword;

        if ($request->file("bannerpic")) {
            $file = $request->file("bannerpic");
            $filename = rand() . date("YmdHi") . $file->getClientOriginalName();
            $file->move(public_path("/assets/uploads/banners/"), $filename);
            $page->image = $filename;
            if (isset($request->oldpic) && !empty($request->oldpic)) {
                $path1 = public_path("/assets/uploads/banners/");
                $path = $path1 . $request->oldpic;
                if (!empty($path)) {
                    unlink($path);
                }
            }
        }

        $page->save();
        notify()->success("Pages updated !!!");
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletepage($id)
    {
        $id = base64_decode($id);
        $pages = Post::find($id);
        $pages->delete();
        notify()->success("Page has been deleted successfully.");
        return redirect()->back();
    }
    public function removeimage($id)
    {
        $id = base64_decode($id);
        $pages = Post::find($id);
        $pages->image = "";
        $pages->save();
        notify()->success("Remove image");
        return redirect()->back();
    }
}
