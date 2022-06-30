<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Envoyer Email
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    
    use HasFactory;
     //Envoyer Email 
     use Notifiable;

    protected $fillable = [

        //Ordre
        //Utilisateur
        'user_name',
        'user_lastname',
        'user_phone',
        'user_address',
        'user_email',
        //Produit
        'product_name',
        'product_description',
        'product_quantity',
        'product_price',
        'product_image',
        'product_category_name',

        'user_id',
        'product_id',
         
        //état de paiment
        'payement_status',
        //état de livraison
        'delivery_status',
    ];
}
