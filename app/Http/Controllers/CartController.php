<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Auth
use Illuminate\Support\Facades\Auth;
//Model Product
use App\Models\Product;
//Model Cart
use App\Models\Cart;

class CartController extends Controller
{
    //Ajouter une Carte fonction
    public function add_cart_fn(Request $request , $id){
         
        if(Auth::id()){
            //Utilisateur connecté
            $user=Auth::user();
            //Produit courant
            $product=Product::find($id);

            //Carte
            $cart= new Cart();

             //Utilisateur
            $cart->user_name=$user->name;
            $cart->user_lastname=$user->lastname;
            $cart->user_phone=$user->phone;
            $cart->user_address=$user->address;
            $cart->user_email=$user->email;

            $cart->user_id=$user->id;

         
             //Produit
            $cart->product_name=$product->name;
            $cart->product_description=$product->description;
                 //Quantité envoyée par la requéte
            $cart->product_quantity=$request->quantity_required;
                 //Prix selon prix ou prix bas et calculer Prix = quantité requise*prix
            if($product->discount_price !== null){
                $cart->product_price=$product->discount_price * $request->quantity_required ;
            }
            else{
                $cart->product_price=$product->price * $request->quantity_required;
            }
            
            $cart->product_image=$product->image;
            $cart->product_category_name=$product->category_name;
         
            $cart->product_id=$product->id;
            
            
            $cart->save();

            return redirect()->back()->with('messageAddCart' , 'Produit Ajoutée Au Panier avec succés');
            
        }
        //Si utilisateur est non connecté rediriger vers login
        else{
             return view('login');
        }
    }

    //Consulter Carte vue
    public function show_cart(){
         //---
         $user = Auth::user();
         //---

        //---
        //Nombre des Produits Ajoutées au Panier (Carte) par un utilisateur connecté
        $count = Cart::where('user_id' , 'Like' , $user->id)->count();
        //---

        $cart = Cart::where('user_id' , 'Like' , $user->id)->paginate(4);
       
        return view('customer.show_cart' ,compact('cart' ,'count'));
    }

    //Supprimer Produit(s) du Panier (Carte)
    public function delete_cart($id){
         
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back()->with('messageDeleteCarte' , 'Produit Supprimé du Panier avec succés');
    }
}
