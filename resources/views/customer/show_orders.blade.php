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
    <div class="page-heading" style="background-image: url(customer/assets/images/order1.jpg);" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Votre Commande</h2>
                        <span>Votre CommandeVotre CommandeVotre CommandeVotre Commande</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <!-- ***** Fin Partie Banner ***** -->

    
    <!-- ***** Partie Consulter Ordre (Commandes) ***** -->




<div class=" container col-md-10 ">
    <table class="table table-striped">

    <thead>
                            <tr class="text-dark text-center">
                              

                                <th scope="col">Nom Produit</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Image</th>
                                <th scope="col">Nom Catégorie</th>
                                <th scope="col" class="text-center">État de Paiement </th>
                                <th scope="col" class="text-center">État de Livraison </th>
                                <th scope="col">Annuler</th>

                            </tr>
                        </thead>
                        <tbody>

                        <!-- Orders -->
                        @forelse($orders as $ord)
                        <!-- Order -->
                            <tr class="text-center">
                             
                                <!-- Produit -->
                                <td >{{$ord->product_name}}</td>
                                <td >{{$ord->product_description}}</td>
                                <td >{{$ord->product_quantity}}</td>
                                <td >{{$ord->product_price}}</td>
                                <td >
                                    <img src="/ImagesProduits/{{$ord->product_image}}" class="rounded"  height="100px" width="100px"  alt="">
                               </td>
                                <td >{{$ord->product_category_name}}</td>

                                <!-- état de paiment -->
                                <td class="text-warning" >{{$ord->payement_status}}</td>
                                <!-- état de livraison -->
                                <td class="text-primary">{{$ord->delivery_status}}</td>

                                @if($ord->delivery_status == 'En traitement')
                                 <!-- Annuler Ordre (Commande) -->
                                 <td> <a href="{{url('/annuler-ordre-fn' , $ord->id)}}"  class="btn btn-danger ">Annuler</a> </td>
                             
                                @elseif($ord->delivery_status == 'Livré')
                                <td> <i class="fa-solid fa-circle-check text-success " style="font-size:25px; margin-top:35px;"></i></td>
                            
                                @elseif($ord->delivery_status == 'Commande Annulée')
                                <td ><i class="fa-solid fa-ban text-danger " style="font-size:25px; margin-top:35px;"></i></td>
                                @endif

                             
                            </tr>
                        @empty

                        
        <!-- Partie Aucune donnée disponible  -->
        <tr>
            <td colspan="32">
            
                <div class="col-md-12 p-4" >
               
                <i class="fa-solid fa-triangle-exclamation display-1  text-primary" style="margin-left:400px;"></i>
                <br>
                    <!-- <h1 class="display-1 fw-bold" style="margin-left:310px;">Aucune donnée disponible</h1> -->
                    <h1 class="mb-4 fw-bold text-primary" style="margin-left:350px;" >Aucune donnée disponible</h1>
                   
                </div>
     
            </td>
        </tr>
     
        <!-- Fin Partie Aucune donnée disponible -->
                        @endforelse

                        </tbody>
       



  </table>     
</div>

    <!-- Pagination -->
    <!-- Apparaitre Si il ya une Pagination -->
    @if(method_exists($orders , 'links'))
    <div class="d-flex justify-content-center">
         {!! $orders->links()!!}
    </div>
    @endif

    <br>
  
    <!-- ***** Fin Partie Consulter Ordre (Commandes) ***** -->

    <!-- ***** Partie Footer ***** -->
      @include('customer.footer')
    <!-- ***** Fin Partie Footer ***** -->

    <!-- ***** Partie Script ***** -->
       @include('customer.script')
    <!-- ***** Fin Partie Script ***** -->

  </body>
</html>










                    