<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- **** Partie style ****-->
    
      @include('customer.style')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="page-heading" style="background-image: url(customer/assets/images/detailshmfm.jpg); " id="top">
         <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Tous les produits</h2>
                        <span>Tous les produitsTous les produitsTous les produitsTous les produits</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br><br>
                         <!-- rechercher Produit selon name  -->
                         <form action="{{url('/rechercher-produit')}}" method="get"   class="d-none d-md-flex ms-4 float-right  col-md-4" style="margin-right:50px;">
                       <input class="form-control border-1 rounded" type="search" placeholder="Rechercher Nom Produit" name="search" >
                       <input type="submit" class="btn btn-primary bg-primary  " value="Rechercher">
                    </form> 

                    <br><br>  <br><br>
    <!-- ***** Fin Partie Banner ***** -->

      <!-- ***** Fin Partie Tous Produits ***** -->  
    <div class="container">
            <div class="row">

            @forelse($products as $pd)

                <div class="item  col-md-4" >    
                    <div class="thumb ">
                       <div class="hover-content bg-white">
                          <div class="inner-content ">
                                    <!-- <div class="main-border-button">
                                        <a href="#men">Découvrir plus</a>
                                    </div> -->
                        </div>
                    </div>
                   <a href="{{url('/détails-produit' , $pd->id)}}" > <img src="/ImagesProduits/{{ $pd->image}}" style="border-radius:15px; height:260px; width:250px;"    class="mx-auto" > </a>
                </div>

                <br>
                <div class="down-content" style="margin-left:50px;" >
                <h4 style="font-weight:bold; font-size:20px;">{{ $pd->name}}</h4>
                        @if($pd->discount_price  == null)
                        <p   class="text-primary">{{ $pd->price}} DT</p>
                        @else
                        <p   class="text-danger d-inline">{{ $pd->discount_price}} DT</p>
                        <p  style="text-decoration:line-through; " class="text-primary d-inline">{{ $pd->price}} DT</p>
                        @endif    
                </div>
              </div>
              @empty                 
            <!-- Partie Aucune donnée disponible  -->
                    <div class="col-md-12 p-4 text-center" >
                    <i class="fa-solid fa-triangle-exclamation text-primary"  style="font-size:40px;"></i>
                           <h1 class="mb-4 fw-bold text-primary">Aucune donnée disponible</h1>
                       
                    </div>
            <!-- Fin Partie Aucune donnée disponible -->





            @endforelse
        </div>  
        <br>
        <!-- Pagination -->
        <!-- Apparaitre Si il ya une Pagination -->
        @if(method_exists($products , 'links'))
        <div class="d-flex justify-content-center text-center">
            {!! $products->links() !!}
           </div>
        @endif
</div>
        <br><br>
    <!-- ***** Fin Partie Tous Produits ***** -->  
    
    <!-- ***** Partie Footer ***** -->
      @include('customer.footer')
    <!-- ***** Fin Partie Footer ***** -->

    <!-- ***** Partie Script ***** -->
       @include('customer.script')
    <!-- ***** Fin Partie Script ***** -->

  </body>
</html>