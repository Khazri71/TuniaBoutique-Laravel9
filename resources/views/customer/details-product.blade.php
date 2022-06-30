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
    @if( $product->category_name == 'Vêtements pour Femmes')
    <div class="page-heading" style="background-image: url(customer/assets/images/details-1.jpg); " id="top">
    @elseif($product->category_name == 'Vêtements pour Hommes')
    <div class="page-heading" style="background-image: url(customer/assets/images/detailshomme.jpg);" id="top">
    @elseif($product->category_name == 'Vêtements pour Enfants')
    <div class="page-heading" style="background-image: url(customer/assets/images/detailskids.jpg); " id="top">
    @endif

         <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Détails du produit</h2>
                        <span>Détails du produitDétails du produitDétails du produit</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Fin Partie Banner ***** -->

    
    <!-- ***** Partie Détails Produit ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                
                @if(session()->has('messageAddCart'))
                   <div class="alert alert-primary">
                       {{session()->get('messageAddCart')}}
                   </div>
                @endif
                <div class="left-images">
                    <img src="ImagesProduits/{{$product->image}}" alt=""  style="width:300px; height:auto; border-radius:15px;" class="mx-auto ">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4 >{{$product->name}}</h4>
                  
                      @if($product->discount_price == null)
                        <h1 class="text-primary">{{ $product->price}} DT</h1>
                        @else
                        <p class="text-danger d-inline">{{ $product->discount_price}} DT</p>
                        <p  style=" text-decoration:line-through; " class="text-primary d-inline">{{ $product->price}} DT</p>
                        @endif
                    <p class="float-right  text-danger">(Quantité Disponible {{$product->quantity}})</p>
                      
                    
                    <span>
                        <h4 class="text-secondary">Description</h4>
                        {{$product->description}}</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</p>
                    </div>

                    <span>
                    <h4 class="text-secondary">Nom Catégorie</h4>
                        {{$product->category_name}}</span>

                <form action="{{url('/ajouter-carte-fn' , $product->id)}}" method="post">
                    @csrf
                    <div class="quantity-content">
                       
                        <h4 class="text-secondary">Entrez la quantité requise</h4> 
                        
                        <input type="number" min="1"  class=" p-2 "  name="quantity_required" style="border-radius:10px;  width:100px; margin-right:20px:"   >
                         
                        <!-- <br>  -->
                        <!-- <div class="total"> -->
                        <!-- <h4>Total: $210.00</h4> -->
                        <input type="submit" style=" padding:9px; margin-top : 20px; background-color: #998253; border-radius:10px" class="main-border-button  text-white" value="Ajouter Au Panier" >  </div>
                        <!-- </div>  -->
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Fin Partie Détails Produit ***** -->

    <!-- ***** Partie Footer ***** -->
      @include('customer.footer')
    <!-- ***** Fin Partie Footer ***** -->

    <!-- ***** Partie Script ***** -->
       @include('customer.script')
    <!-- ***** Fin Partie Script ***** -->

  </body>
</html>