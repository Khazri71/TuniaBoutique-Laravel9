<section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Vêtements pour Enfants</h2>
                        <span>Vêtements pour EnfantsVêtements pour EnfantsVêtements pour EnfantsVêtements pour Enfants.</span>
                        
                     <!-- rechercher Produit selon name  -->
                     <!-- <form action="{{url('/rechercher-produit-enfant')}}" method="get"   class="d-none d-md-flex ms-4 float-right  col-md-4">
                     <input class="form-control border-1 rounded" type="search" placeholder="Rechercher Nom Produit" name="search" >
   
                               
                       <input type="submit" class="btn btn-primary bg-primary  " value="Rechercher">
                    </form> -->

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
               
           
            @foreach($productKid as $pdkid)


            <div class="item  col-md-4" >    
                    <div class="thumb ">
                       <div class="hover-content bg-white">
                          <div class="inner-content ">
                      
                      
                        
                               
                                    <!-- <div class="main-border-button">
                                        <a href="#men">Découvrir plus</a>
                                    </div> -->

                        </div>
                    </div>
                   
                    <a  href="{{url('/détails-produit' , $pdkid->id)}}"> <img src="/ImagesProduits/{{ $pdkid->image}}" style="border-radius:15px;  height:260px; width:250px;"  class="mx-auto" ></a>
                </div>

                
                <div class="down-content ">
                <h4 style="margin-left:10px;">{{ $pdkid->name}}</h4>
                        @if($pdkid->discount_price  == null)
                        <p  style="margin-left:10px; " class="text-primary">{{ $pdkid->price}} DT</p>
                        @else
                        <p  style="margin-left:10px;" class="text-danger d-inline">{{ $pdkid->discount_price}} DT</p>
                        <p  style="margin-left:10px; text-decoration:line-through; " class="text-primary d-inline">{{ $pdkid->price}} DT</p>
                        @endif
               </div>



              </div>


              
             

                            
            @endforeach  
            
        </div> 
       <!-- Pagination -->
       <!-- Apparaitre Si il ya une Pagination -->
    @if(method_exists( $productKid , 'links'))
       <div class="d-flex justify-content-center text-center">
            {!! $productKid->links() !!}
       </div>
    @endif 
    </section>

     