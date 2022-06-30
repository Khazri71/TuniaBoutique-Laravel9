<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- **** Partie style ****-->
    <base href="/public">
      @include('customer.style')
    <!-- **** Fin Partie style **** -->
   </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    <!-- ***** Partie Header ***** -->
       @include('customer.header')
    <!-- ***** Fin Partie Header ***** -->

    <!-- ***** Partie Banner ***** -->
    <div class="page-heading" style="background-image: url(customer/assets/images/carte0.jpg);"  id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Votre Panier</h2>
                        <span>Votre PanierVotre PanierVotre PanierVotre PanierVotre Panier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <!-- ***** Fin Partie Banner ***** -->

    
    <!-- ***** Partie Consulter Carte (Produits Ajoutés Au Panier) ***** -->




<div class=" container col-md-10 ">
    <table class="table table-striped">

       <!-- Message aprés Supprimer un Produit du Panier (Carte) -->
       @if(session()->has('messageDeleteCarte'))
          <div class="alert alert-danger">
             {{session()->get('messageDeleteCarte')}}
          </div>

       @endif
      

       <!-- Message aprés Ajouter un Produit à un Ordre (Passer une Commande) -->
       @if(session()->has('messageAddOrder'))
         <div class="alert alert-primary">
            {{session()->get('messageAddOrder')}}
         </div>
       @endif


  <thead>
    <tr>
      <th scope="col">Nom Utilisateur</th>
      <th scope="col">Prénom</th>
      <!-- <th scope="col">Num Tél</th>
      <th scope="col">Adresse</th>
      <th scope="col">E-mail</th> -->

      <th scope="col">Nom Produit</th>
      <th scope="col">Description</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
      <th scope="col">Nom Catégorie</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php  $totalPrice = 0 ?>
  @foreach($cart as $crt)
    <tr>
      
      <td>{{$crt->user_name}}</td>
      <td>{{$crt->user_lastname}}</td>
      <!-- <td>{{$crt->user_phone}}</td>
      <td>{{$crt->user_address}}</td>
      <td>{{$crt->user_email}}</td> -->

      <td>{{$crt->product_name}}</td>
      <td>{{$crt->product_description}}</td>
      <td class="text-center">{{$crt->product_quantity}}</td>
      <td>{{$crt->product_price}} DT</td>
      <td>
        <img src="/ImagesProduits/{{$crt->product_image}}" class="rounded"  height="100px" width="100px"  alt="">
      </td>
      <td>{{$crt->product_category_name}}</td>
      <td class="text-center">
         <a href="{{url('/supprimer-cart' , $crt->id)}}" ><i class="fa-solid fa-trash  text-danger" style="font-size:20px;"></i></a>
      </td>
  
    </tr>
    <?php  $totalPrice += $crt->product_price ?>
   
  @endforeach
  </tbody>
</table>

<!-- Pagination -->  
<!-- Apparaitre Si il ya une Pagination -->
@if (method_exists($cart ,  'links' ))
<div class="d-flex justify-content-center ">
  
      {!! $cart->links() !!}
    
</div>
@endif
<br>


 <h1 class="text-center text-secondary  font-weight-bold "  style=" text-decoration: underline;"> Prix ​​total : {{$totalPrice}} DT</h1>
 <br>
 <h1 class="text-secondary  font-weight-bold"> Procéder à la commande</h1> 
 <br>
 <a href="{{url('/ajouter-ordre-fn')}}" class="btn btn-primary">Paiement à La Livraison</a>
 <a href="{{url('/stripe', $totalPrice)}}" class="btn btn-secondary">Payer par Carte</a>
</div>
    <!-- ***** Fin Partie onsulter Carte (Produits Ajoutés Au Panier) ***** -->

    <!-- ***** Partie Footer ***** -->
      @include('customer.footer')
    <!-- ***** Fin Partie Footer ***** -->

    <!-- ***** Partie Script ***** -->
       @include('customer.script')
    <!-- ***** Fin Partie Script ***** -->

  </body>
</html>