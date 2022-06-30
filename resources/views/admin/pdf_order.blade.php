<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
<br>
<span  style="font-size:15px; color:grey; float:left;">TuniaBoutique 2020-2023</span>
      <br>
     <h3>PDF : Détails de la commande</h3>
      <hr>
      <!-- ***** Partie Body Ordre ***** -->
     

                    <!-- ***** Partie Consulter Utilisateur***** -->
                <h3 style="color:grey;">Informations sur l'Utilisateur</h3>
                        <table style="border:solid grey 1px;">

                            <thead style="border-bottom:solid grey 1px;">
                                <tr>
                                    <th>ID Utilisateur</th>
                                    <th>Nom </th>
                                    <th>Prénom</th>
                                    <th>Num Tél</th>
                                    <th>Adresse</th>
                                    <th>Email</th>

                                </tr>
                            </thead>
                            <tbody>

                        
                            <!-- Order Produit Utilisateur Informations-->
                                <tr>
                                    <!-- Utilisateur -->
                                    <td >{{$order_product->user_id}}</td>
                                    <td >{{$order_product->user_name}}</td>
                                    <td >{{$order_product->user_lastname}}</td>
                                    <td >{{$order_product->user_phone}}</td>
                                    <td >{{$order_product->user_address}}</td>
                                    <td >{{$order_product->user_email}}</td>
                                </tr>
                         

                            </tbody>
                        </table>
           <br><br>
           <hr>
                    <!-- ***** Fin Partie Consulter Utilisateur ***** -->



                      <!-- ***** Partie Consulter Produit ***** -->
                      <h3 style="color:grey;">Informations sur le Produit</h3>
                      <table style="border:solid grey 1px;">

<thead style="border-bottom:solid grey 1px;" >
    <tr>
       
        <th>ID Produit</th>
        <th>Nom </th>
        <th>Description</th>
        <th>Quantité</th>
        <th>Prix</th>
        <th>Nom Catégorie</th>

    </tr>
</thead>
<tbody>


<!-- Order Produit Produit Informations-->
    <tr>
        <!-- Produit -->
        <td >{{$order_product->product_id}}</td>
        <td >{{$order_product->product_name}}</td>
        <td >{{$order_product->product_description}}</td>
        <td >{{$order_product->product_quantity}}</td>
        <td >{{$order_product->product_price}}</td>
        <td >{{$order_product->product_category_name}}</td>

    </tr>


</tbody>
</table>
<br><br>
<hr>
<!-- ***** Fin Partie Consulter Produit ***** -->





       <!-- ***** Partie Consulter Livraison ***** -->
       <h3 style="color:grey;">Informations sur l'État Paiement et Livraison</h3>              
       <table style="border:solid grey 1px;">

<thead style="border-bottom:solid grey 1px;">
    <tr>

        <th>État de Paiement </th>
        <th>État de Livraison </th>

    </tr>
</thead>
<tbody>


<!-- Order Produit Produit Informations-->
    <tr>

        <!-- état de paiment -->
        <td >{{$order_product->payement_status}}</td>
        <!-- état de livraison -->
        <td >{{$order_product->delivery_status}}</td>
    </tr>


</tbody>
</table>
<br><br>
<hr>
<br><br> <br>
<!-- ***** Fin Partie Consulter Produit ***** -->



                <!-- ***** Fin Partie Body Ordre ***** -->



    <h3 style="color:grey; position:center">Image du produit</h3> <br>
   <img src="ImagesProduits/{{$order_product->product_image}}"   height="200px" width="200px"  alt="" style="position:center; border-radius:5px;">
  
   <br><br><br>
   
   <br><br>

   <hr>
   <span  style="font-size:15px; color:grey; float:right;">Nom de l'entreprise  2020-2023</span>
</body>
</html>