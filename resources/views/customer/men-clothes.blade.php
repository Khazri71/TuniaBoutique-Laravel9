<section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Vêtements pour Hommes</h2>
                        <p class="text-secondary">vêtements pour hommesvêtements pour hommesvêtements pour hommes .</p>
                      
                    <!-- rechercher Produit selon name  -->
  <!--                   <form action="{{url('/rechercher-produit-homme')}}" method="get"   class="d-none d-md-flex ms-4 float-right  col-md-4">
                    <input class="form-control border-1 rounded" type="search" placeholder="Rechercher Nom Produit" name="search" >
                       <input type="submit" class="btn btn-primary bg-primary  " value="Rechercher">
                    </form> -->




                     

                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
      

             
            @foreach($productmen as $pdmen)

                <div class="item  col-md-4" >    
                    <div class="thumb ">
                       <div class="hover-content bg-white">
                          <div class="inner-content ">
                    
                       
                               
                                    <!-- <div class="main-border-button">
                                        <a href="#men">Découvrir plus</a>
                                    </div> -->

                            

                        </div>
                    </div>
                   
                   <a href="{{url('/détails-produit' , $pdmen->id)}}" > <img src="/ImagesProduits/{{ $pdmen->image}}" style="border-radius:15px;  height:260px; width:250px;"   class="mx-auto" > </a>
                </div>

                
                <div class="down-content">
                <h4 style="margin-left:10px;" >{{ $pdmen->name}}</h4>
                        @if($pdmen->discount_price  == null)
                        <p  style="margin-left:10px; " class="text-primary">{{ $pdmen->price}} DT</p>
                        @else
                        <p  style="margin-left:10px;" class="text-danger d-inline">{{ $pdmen->discount_price}} DT</p>
                        <p  style="margin-left:10px; text-decoration:line-through; " class="text-primary d-inline">{{ $pdmen->price}} DT</p>
                        @endif
                        
               </div>

             
              </div>


              
             
            @endforeach  


                            
                           
            
        </div>  
        <!-- Pagination -->
        <!-- Apparaitre Si il ya une Pagination -->
        @if(method_exists($productmen , 'links'))
        <div class="d-flex justify-content-center text-center">
            {!! $productmen->links() !!}
           </div>
        @endif
    </section>

      