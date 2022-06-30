<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//Auth
use Illuminate\Support\Facades\Auth;

//Model Category
use App\Models\Category;


class CategoryController extends Controller
{
    //Admin
   //Ajouter Catégorie vue
   public function add_category(){

       //Consulter Catégories
       $categories=Category::all();
        //Nom Admin Connecté 
        $username = Auth::user()->name;
       return view('admin.add_category' , compact('categories' , 'username'));
   }

    //Ajouter Catégorie fonction
    public function add_category_fn(Request $request){
       $category = new Category();
       $category->category_name= $request->category_name;
       $category->save();
     
       return redirect()->back()->with('messageAddCategory' , 'Catégorie Ajoutée avec succés');
    }

   //Supprimer Catégorie fonction
   public function delete_category_fn($id){
    $category=Category::find($id);
    $category->delete();
    return redirect()->back()->with('messageDeleteCategory', 'Catégorie Supprimer avec succés');
   }
   
}
