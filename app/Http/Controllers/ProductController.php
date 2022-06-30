<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Auth
use Illuminate\Support\Facades\Auth;
//Model Product
use App\Models\Product;
//Model Category
use App\Models\Category;

//Model Cart
use App\Models\Cart;

class ProductController extends Controller
{
    //Ajouter Produit vue
    public function add_product(){

        //Noms Catégories
        $categories= Category::all();
         //Nom Admin Connecté 
         $username = Auth::user()->name;
        return view('admin.add_product' , compact('categories' , 'username'));
    }

    //Ajouter Produit fonction
    public function add_product_fn(Request $request){
        $product = new Product();

        $product->name=$request->name;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->category_name=$request->category_name;

        
        $image= $request->image;
        if($image){
         $imagename = time(). '.' .$image->getClientOriginalExtension();
         $image->move('ImagesProduits',$imagename);
         $product->image=$imagename; 
        }

        $product->save();
        

        return redirect()->back()->with('messageAddProduct' , 'Produit Ajouté avec succés');
    }
    
    //Consulter Produits
    public function show_products(){

        $products = Product::paginate(4);
         //Nom Admin Connecté 
         $username = Auth::user()->name;
        return view('admin.show_products' , compact('products', 'username'));
    }

    //Supprimer Produit
    public function delete_product($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('messageDeleteProduct', 'Produit Supprimé avec succés');
    }

    //Modifier Produit vue
    public function update_product($id){

        $product= Product::find($id);
        $categories=Category::all();
        return view('admin.update_product' , compact('product', 'categories'));
    }
    
    //Modifier Produit fonction
    public function update_product_fn(Request $request , $id){
        
        $product=Product::find($id);

        $product->name=$request->name;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->category_name=$request->category_name;

        
        $image= $request->image;
        if($image){
         $imagename = time(). '.' .$image->getClientOriginalExtension();
         $image->move('ImagesProduits',$imagename);
         $product->image=$imagename; 
        }

        $product->save();

        return redirect()->back()->with('messageUpdateProduct' , 'Produit Modifié avec succés');


    }


    //Customer
    //Détails d'un Produit
    public function details_product($id){
         //---
         $user = Auth::user();
         //---
       
        $product= Product::find($id);
        if(Auth::id()){
              //---
             //Nombre des Produits Ajoutées au Panier (Carte) par un utilisateur connecté
               $count = Cart::where('user_id' , 'Like' , $user->id)->count();
             //---
             return view('customer.details-product' , compact('product' , 'count'));
        }
        else{
            return view('auth.login');
        }
       
    }

    //Consulter Tous Les Produits
    public function show_all_products(){
           //---
           $user = Auth::user();
           //---
           if(Auth::id()){
            //---
           //Nombre des Produits Ajoutées au Panier (Carte) par un utilisateur connecté
             $count = Cart::where('user_id' , 'Like' , $user->id)->count();
           //---
            $products = Product::paginate(6);
             return view('customer.show-all-products'  , compact('products' , 'count'));

           }
           else{
            return view('auth.login');
           }

       
    }
    

    
}
