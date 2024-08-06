<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class BlogcategoriesController extends Controller
{
    public function createCategory(Request $request)
    {
        $categories = BlogCategory::where('parent_id', null)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('admin.blogs.create-category', compact('categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
              /*  'slug'      => 'required|unique:categories',*/
                'parent_id' => 'nullable|numeric'
            ]);

            $postcategory = BlogCategory::create([
                'name' => $request->name,
                'parent_id' =>$request->parent_id
            ]);
            $newPost = $postcategory->replicate();
            $newPost->slug;
            notify()->success('Category has been created successfully.');
            return redirect()->back();
        }
    }
     public function allblogCategories()
        {
            $categories = BlogCategory::where('parent_id', null)->orderby('name', 'asc')->get();
            //echo "<pre>";
            //print_r($categories);
            return view('admin.blogs.all-category', compact('categories'));
        }

         public function editCategory($id, Request $request)
    {   
        $id =  base64_decode($id);
        $category = BlogCategory::findOrFail($id);
        if($request->method()=='GET')
        {
            $categories = BlogCategory::where('parent_id', null)->where('id', '!=', $category->id)->orderby('name', 'asc')->get();
            return view('admin.blogs.edit-category', compact('category', 'categories'));
        }

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'     => 'required',
                'slug' => ['required', Rule::unique('blog_categories')->ignore($category->id)],
                'parent_id'=> 'nullable|numeric'
            ]);
            if($request->name != $category->name || $request->parent_id != $category->parent_id)
            {
                if(isset($request->parent_id))
                {
                    $checkDuplicate = BlogCategory::where('name', $request->name)->where('parent_id', $request->parent_id)->first();
                    if($checkDuplicate)
                    {
                        
                         notify()->warning('Category already exist in this parent.');
                         return redirect()->back();
                    }
                }
                else
                {
                    $checkDuplicate = BlogCategory::where('name', $request->name)->where('parent_id', null)->first();
                    if($checkDuplicate)
                    {
                        
                        notify()->warning('Category already exist with this name.');
                        return redirect()->back();
                    }
                }
            }

            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->slug = Str::slug($request->slug, '-'); 
            $category->is_active = $request->status;
            $category->save();
          
           
            notify()->success('Category has been updated successfully.');
            return redirect()->back();
        }
    }

     public function blogdeleteCategory($id)
        {
            $category = BlogCategory::findOrFail($id);
            if(count($category->subcategory))
            {
                
                $subcategories = $category->subcategory;
                foreach($subcategories as $cat)
                {
                    $cat = BlogCategory::findOrFail($cat->id);
                    $cat->parent_id = null;
                    $cat->save();
                }
               
            }
           $category->delete();
           notify()->success('Category has been deleted successfully.');
            return redirect()->back();
        }
        

}
