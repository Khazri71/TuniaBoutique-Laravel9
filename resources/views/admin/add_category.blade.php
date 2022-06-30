
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

                 <!-- ***** Partie Ajouter Catégorie ***** -->
                <div class="col-sm-6 col-xl-10 mx-auto">
                        <div class="bg-light rounded h-100 p-4">
                            @if( session()->has('messageAddCategory'))
                            <div class="alert alert-success">
                                {{session()->get('messageAddCategory')}}
                            </div>

                            @endif
                            <h6 class="mb-4">Ajouter Catégorie</h6>
                            <form  action="{{url('/ajouter-categorie-fn')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="category_name" placeholder="Nom Catégorie">
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary bg-primary">Ajouter Catégorie</button>
                            </form>
                        </div>
                    </div>
                    <!-- ***** Fin Partie Ajouter Catégorie ***** -->

                    <!-- ***** Partie Consulter Catégories ***** -->
                    <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Consulter Catégories  </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            @if(session()->has('messageDeleteCategory'))
                              <div class="alert alert-danger">
                                  {{session()->get('messageDeleteCategory')}}
                              </div>
                            @endif
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nom Catégorie</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $ctgr)
                                <tr>
                                    <td>{{$ctgr->category_name}}</td>
                                    <td>
                                    <div class="text-center">  
                                    <a class="btn btn-sm btn-danger " href="{{url('/supprimer-categorie-fn' , $ctgr->id)}}" >Supprimer</a>
                                    </div>
                                   </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                    <!-- ***** Fin Partie Consulter Catégories ***** -->


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