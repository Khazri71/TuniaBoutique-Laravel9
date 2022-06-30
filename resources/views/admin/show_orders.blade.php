<!DOCTYPE html>
<html lang="en">
<head>
    <!-- **** Partie style ****-->
       @include('admin.style')
    <!-- **** Fin Partie style **** -->
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner  -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Fin Spinner -->


         <!-- **** Partie SideBar ****-->
           @include('admin.sidebar')
         <!-- **** Fin Partie SideBar**** -->


        <!-- Partie Contenu -->
        <div class="content">
                <!-- ***** Partie Header ***** -->
                  @include('admin.header')
                <!-- ***** Fin Partie Header ***** -->
                

                <!-- ***** Partie Body Ordre ***** -->
                <div class="container-fluid pt-4 px-4">
                <div class="row g-4">  

                    <!-- ***** Partie Consulter Produits ***** -->
                    <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Consulter Ordres  </h6>
                    </div>
                    <div class="table-responsive">

                        <!-- rechercher selon user_name product_name product_price -->
                     
                      <br>
                      <form action="{{url('/rechercher-ordre-produit')}}" method="get"   class="d-none d-md-flex ms-4">
                        @csrf
                         <input class="form-control border-1 rounded" type="search" placeholder="Rechercher Nom Client , Nom Produit , Prix Produit" name="search" >
                         <input type="submit" class="btn btn-primary bg-primary  " value="Rechercher">
                      </form>

                      <br>
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                        
                            <thead>
                                <tr class="text-dark text-center">
                                   
                                    <th scope="col">Nom Utilisateur</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Num Tél</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Email </th>

                                    <th scope="col">Nom Produit</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom Catégorie</th>
                                    <th scope="col" class="text-center">État de Paiement </th>
                                    <th scope="col" class="text-center">État de Livraison </th>

                                    <th scope="col" class="text-center">Livrer</th>
                                    <th scope="col" class="text-center">Imprimer PDF</th>
                                    <th scope="col" class="text-center">Envoyer Email</th>
                                </tr>
                            </thead>
                            <tbody>

                            <!-- Orders -->
                            @forelse($orders as $ord)
                            <!-- Order -->
                                <tr class="text-center">
                                    <!-- Utilisateur -->
                                    <td >{{$ord->user_name}}</td>
                                    <td >{{$ord->user_lastname}}</td>
                                    <td >{{$ord->user_phone}}</td>
                                    <td >{{$ord->user_address}}</td>
                                    <td >{{$ord->user_email}}</td>

                                    <!-- Produit -->
                                    <td >{{$ord->product_name}}</td>
                                    <td >{{$ord->product_description}}</td>
                                    <td >{{$ord->product_quantity}}</td>
                                    <td >{{$ord->product_price}}</td>
                                    <td >
                                        <img src="/ImagesProduits/{{$ord->product_image}}" class="rounded"  height="200px" width="200px"  alt="">
                                   </td>
                                    <td >{{$ord->product_category_name}}</td>

                                    <!-- état de paiment -->
                                    <td class="text-warning" >{{$ord->payement_status}}</td>
                                    <!-- état de livraison -->
                                    <td class="text-primary">{{$ord->delivery_status}}</td>
                                   @if( $ord->delivery_status =='En traitement') 
                                    <td>
                                        <a href="{{url('/modifier-Livrer-fn' , $ord->id)}}" class="btn btn-primary">Livrer</a>
                                    </td>
                                    @elseif($ord->delivery_status =='Livré') 
                                    <td>
                                         <i class="fa-solid fa-circle-check"  style="font-size:25px; color:green;"></i>
                                    </td>
                                    @elseif($ord->delivery_status =='Commande Annulée') 
                                    <td>
                                         <i class="fa-solid fa-ban"  style="font-size:25px; color:red;"></i>
                                         
                                    </td>
                                      
                                   @endif

                                   <!-- Imprimer PDF -->
                                   <td>
                                         <a href="{{url('/imprimer-pdf' , $ord->id)}}" style="font-size:25px; color:grey;" ><i class="fa-solid fa-file-pdf"></i></a>
                                   </td>

                                   <!-- Envoyer Email -->
                                   <td>
                                        <a href="{{url('/envoyer-email' , $ord->id)}}" style="font-size:20px; color:grey;" > <i class="fa-solid fa-envelope"></i></a>
                                    </td>
                                </tr>
                            @empty

                            
            <!-- Partie Aucune donnée disponible  -->
            <tr>
                <td colspan="16">
                
                    <div class="col-md-6 p-4" >
                        <i class="bi bi-exclamation-triangle display-1 text-primary " style="margin-left:350px;"></i>
                        <!-- <h1 class="display-1 fw-bold" style="margin-left:310px;">Aucune donnée disponible</h1> -->
                        <h1 class="mb-4 fw-bold text-primary" style="margin-left:310px;" >Aucune donnée disponible</h1>
                       
                    </div>
         
                </td>
            </tr>
         
            <!-- Fin Partie Aucune donnée disponible -->
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

              <!-- Pagination -->
        <!-- Apparaitre Si il ya une Pagination -->
        @if(method_exists($orders , 'links'))
        <div class="d-flex justify-content-center text-center">
            {!! $orders->links() !!}
           </div>
        @endif
                    <!-- ***** Fin Partie Consulter Produits ***** -->


                </div>
                </div>
                <!-- ***** Fin Partie Body Ordre ***** -->
             


                <!-- ***** Partie Footer ***** -->
                   @include('admin.footer')
                <!-- ***** Fin Partie Footer ***** -->
        </div>
        <!-- Partie Contenu -->


        <!-- Retour au sommet-->
          <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
         <!-- Fin Retour au sommet-->
    </div>

    <!-- ***** Partie Script ***** -->
    @include('admin.script')
    <!-- ***** Fin Partie Script ***** -->
</body>

</html>