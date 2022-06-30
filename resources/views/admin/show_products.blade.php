
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
                

                <!-- ***** Partie Body Catégorie ***** -->
                <div class="container-fluid pt-4 px-4">
                <div class="row g-4">  

                    <!-- ***** Partie Consulter Produits ***** -->
                    <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Consulter Produits  </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">

                           @if(session()->has('messageDeleteProduct'))
                                <div class="alert alert-danger">
                                     {{session()->get('messageDeleteProduct')}}
                                </div>

                           @endif
                           
                            <thead>
                                <tr class="text-dark text-center">
                                    <th scope="col">Nom Produit</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Prix bas</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom Catégorie</th>
                                    <th scope="col" class="text-center">Modifier</th>
                                    <th scope="col" class="text-center">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>

                            @forelse($products as $pd)
                                <tr class="text-center">
                                    <td >{{$pd->name}}</td>
                                    <td>{{$pd->description}}</td>
                                    <td>{{$pd->quantity}}</td>
                                    <td>{{$pd->price}}</td>
                                    <td>{{$pd->discount_price}}</td>
                                    <td>
                                        <img src="/ImagesProduits/{{$pd->image}}" class="rounded"  height="100px" width="100px" alt="">
                                    </td>
                                    <td>{{$pd->category_name}}</td>
                                    <td>
                                    <div class="text-center">  
                                    <a class="btn btn-sm btn-primary " href="{{url('/modifier-produit', $pd->id)}}" >Modifier</a>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="text-center">  
                                    <a class="btn btn-sm btn-danger " href="{{url('/supprimer-produit-fn' , $pd->id)}}" >Supprimer</a>
                                    </div>
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
        @if(method_exists($products , 'links'))
        <div class="d-flex justify-content-center text-center">
            {!! $products->links() !!}
           </div>
        @endif
                    <!-- ***** Fin Partie Consulter Produits ***** -->


                </div>
                </div>
                <!-- ***** Fin Partie Body Catégorie ***** -->
             


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