<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('Categories.addCategory');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
        ]);

       try{
          $category=new Category();
          $category->category_name = $request->category_name;
          $category->save();
          // echo 'added';
          session()->flash('success', 'Category added successfully!');
          return redirect('/show-category');
       } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to add Category. Please try again.');
        }
    }

    public function showCategory(){
        try{
            $category=Category::all();
            return view('Categories.showCategory')->with('category',$category);
        } catch(\Exception $e) {
                return $e->getMessage(); // This will display the actual error message
            }
    }

    public function deleteCategory($id){
        try{
            $category=Category::find($id);
            $category->delete();
            session()->flash('success', 'Category removed successfully!');
            return redirect('/show-category');
        } catch (\Exception) {
            return redirect('/show-category')->with('Error', 'Failed to Remove Record. Please Try Again');
        }
    }
}
