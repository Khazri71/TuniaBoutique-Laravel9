
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- **** Partie style ****-->
    <base href="/public">
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
                

                <!-- ***** Partie Body Produit ***** -->
                <div class="container-fluid pt-4 px-4">
                <div class="row g-4">  

                 <!-- ***** Partie Modifier Produit ***** -->
                <div class="col-sm-6 col-xl-10 mx-auto">
                        <div class="bg-light rounded h-100 p-4">
                
                        @if(session()->has('messageUpdateProduct'))
                            <div class="alert alert-success">
                                  {{session()->get('messageUpdateProduct')}}
                            </div>
                        @endif

                            <h6 class="mb-4">Modifier Produit</h6>
                            <form  action="{{url('/modifier-produit-fn' , $product->id)}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="name" placeholder="Nom Produit" value="{{$product->name}}">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="description" placeholder="Description"  value="{{$product->description}}">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="number" min="1" class="form-control"  name="quantity" placeholder="Quantité" value="{{$product->quantity}}">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="number" min="1" class="form-control"  name="price" placeholder="Prix" value="{{$product->price}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="number" min="0" class="form-control"  name="discount_price" placeholder="Prix bas" value="{{$product->discount_price}}">
                                    </div>
                                </div>
                                <!-- fichier -->

                                <div class="row mb-3  text-center">
                                    <div class="col-sm-6 col-xl-12 ">
                                        <label for="image">Image Courante</label>
                                        
                                        <img class="mx-auto rounded" src="/ImagesProduits/{{$product->image}}" alt="" height="100px" width="100px" id="image">
                                    </div>
                                </div>
                                

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <label for="image">Choisir une nouvelle image</label>
                                        <input type="file" class="form-control"  name="image" id="image">
                                    </div>
                                </div>
                                
                                <!-- selection et options -->
                                <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="category_name">
                                    <option name="category_name" value="{{$product->category_name}}" selected>{{$product->category_name}}</option>
                                    @foreach( $categories as $ctgr)
                                    <option name="category_name" value="{{$ctgr->category_name}}">{{$ctgr->category_name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Nom Catégorie</label>
                            </div>
                            
                                <button type="submit" class="btn btn-primary bg-primary">Modifier Produit</button>
                            
                               
                            </form>
                        </div>
                    </div>
                    <!-- ***** Fin Partie Modifier Produit ***** -->

                </div>
                </div>
                <!-- ***** Fin Partie Body Produit ***** -->
             


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