<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Auth
use Illuminate\Support\Facades\Auth;
//Model Cart
use App\Models\Cart;
//Model Order
use App\Models\Order;
//Stripe
use Session;
use Stripe;
//PDF
use PDF;
//Envoyer Email
use App\Notifications\SendEmailNotification;
use Notification;

class OrderController extends Controller
{
    //Ajouter Ordre fonction
    public function add_order_fn(){
        
        $user=Auth::user();
 
        $cart_products = Cart::where('user_id' , 'Like' , $user->id)->get();

        foreach( $cart_products as $crt_pd){
              
            $order = new Order();

            
             //Utilisateur
             $order->user_name=$crt_pd->user_name;
             $order->user_lastname=$crt_pd->user_lastname;
             $order->user_phone=$crt_pd->user_phone;
             $order->user_address=$crt_pd->user_address;
             $order->user_email=$crt_pd->user_email;
 
             $order->user_id=$crt_pd->user_id;

            //Produit
            $order->product_name=$crt_pd->product_name;
            $order->product_description=$crt_pd->product_description;
            $order->product_price=$crt_pd->product_price;
            $order->product_price=$crt_pd->product_quantity;
            $order->product_image=$crt_pd->product_image;
            $order->product_category_name=$crt_pd->product_category_name;

            $order->product_id=$crt_pd->product_id;

            $order->payement_status ='Paiement à La Livraison';
            $order->delivery_status ='En traitement';

            $order->save();

            $cart_product_id = $crt_pd->id;

            $cart_product_destroy = Cart::find($cart_product_id );
 
            $cart_product_destroy->delete();
            
        }

        return redirect()->back()->with('messageAddOrder' ,'Nous avons reçu votre commande nous vous contactons Bientôt ');
    }


    //Stripe Payment Processing vue
    public function stripe($totalPrice)
    {
      //---
      $user = Auth::user();
      //---
      if(Auth::id()){
        //---
        //Nombre des Produits Ajoutées au Panier (Carte) par un utilisateur connecté
        $count = Cart::where('user_id' , 'Like' , $user->id)->count();
        //---
      }
        return view('customer.stripe' , compact('totalPrice' , 'count'));
    }

    //Stripe Payment Processing fonction
    public function stripePost(Request $request , $totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalPrice *  30 ,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Merci pour le paiement" 
        ]);
      
        Session::flash('success', 'Paiement réussi!');



        //Ajouter Ordre Supprimer Carte
        $user=Auth::user();
 
        $cart_products = Cart::where('user_id' , 'Like' , $user->id)->get();
        foreach( $cart_products as $crt_pd){
              
            $order = new Order();

            
             //Utilisateur
             $order->user_name=$crt_pd->user_name;
             $order->user_lastname=$crt_pd->user_lastname;
             $order->user_phone=$crt_pd->user_phone;
             $order->user_address=$crt_pd->user_address;
             $order->user_email=$crt_pd->user_email;
 
             $order->user_id=$crt_pd->user_id;

            //Produit
            $order->product_name=$crt_pd->product_name;
            $order->product_description=$crt_pd->product_description;
            $order->product_price=$crt_pd->product_price;
            $order->product_image=$crt_pd->product_image;
            $order->product_category_name=$crt_pd->product_category_name;

            $order->product_id=$crt_pd->product_id;

            $order->payement_status ='Paiement à La Livraison';
            $order->delivery_status ='En traitement';

            $order->save();

            $cart_product_id = $crt_pd->id;

            $cart_product_destroy = Cart::find($cart_product_id );
 
            $cart_product_destroy->delete();
            
        }
              
        return back();
    }

    
    //Consulter Ordres vue
    public function show_orders(){

        $orders=Order::paginate(4);
         //Nom Admin Connecté 
         $username = Auth::user()->name;   
        return view('admin.show_orders', compact('orders' , 'username'));
    }

    //Modifier État Produit Liver Oui ou Rester en traitement
    public function update_deliver_fn($id){

        $order_product = Order::find($id);

        $order_product->delivery_status='Livré';
        $order_product->payement_status='payé';

        $order_product->save();

        return redirect()->back();
    }

    //Imprimer PDF
    public function print_pdf($id){

        $order_product = Order::find($id);

        $pdf = PDF::loadView('admin.pdf_order' , compact('order_product'));
        return $pdf->download('Détails de la commande.pdf');

    }

    //Envoyer Email vue
    public function send_email($id){
        $order_product = Order::find($id);
        return view('admin.send_email' , compact('order_product'));
    }

    //Envoyer Email fonction
    public function send_email_fn(Request $request , $id){
       $order_product = Order::find($id);

       $details = [
           'greeting'=> $request->greeting,
           'firstline'=> $request->firstline,
           'body'=> $request->body,
           'button'=> $request->button,
           'url'=> $request->url,
           'lastline'=> $request->lastline,

       ];

       Notification::send($order_product ,  new SendEmailNotification($details));

       return redirect()->back()->with('messageEnvoyerEmail' , 'Email Envoyé avec succés');
    }


    //Rechercher Ordre (Commande) selon user_name product_name product_price
    public function search_Order_Product(Request $request){
        
         $searchinput = $request->search;

         $orders = Order::where('user_name' , 'Like' , "%$searchinput%")->orWhere('product_name' , 'Like' , "%$searchinput%")->orWhere('product_price' , 'Like' , "%$searchinput%")->get();

         return view('admin.show_orders' , compact('orders'));
    }

    //Consulter Ordre (Commande) vue
    public function show_orders_cust(){

        if(Auth::id()){

             //---
             $user = Auth::user();
             //---

             //---
            //Nombre des Produits Ajoutées au Panier (Carte) par un utilisateur connecté
             $count = Cart::where('user_id' , 'Like' , $user->id)->count();
            //---
            $customer_id = $user->id;

            $orders = Order::where('user_id' , 'LIKE' , $customer_id)->paginate(4);
            return view('customer.show_orders',compact('orders' , 'count'));
        }
        else{
            return view('login');
        }
    }

    //Annuler Ordre (Commande) fonction
    public function cancel_order_fn($id){

        $order_product = Order::find($id);

        $order_product->delivery_status = 'Commande Annulée';

        $order_product->save();

        return redirect()->back();
    }
}
