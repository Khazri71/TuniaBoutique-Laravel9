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
                

                <!-- ***** Partie Body Email ***** -->
                <div class="container-fluid pt-4 px-4">
                <div class="row g-4">  

                 <!-- ***** Partie Envoyer email ***** -->
                <div class="col-sm-6 col-xl-10 mx-auto">
                        <div class="bg-light rounded h-100 p-4">
                           

                        @if(session()->has('messageEnvoyerEmail'))
                          <div class="alert alert-primary">
                               {{session()->get('messageEnvoyerEmail')}}
                          </div>
                        @endif

                            <h6 class="mb-4">Envoyer Email</h6>
                            <form  action="{{url('/envoyer-email-fn' , $order_product->id)}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="greeting" placeholder="Salutation">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="firstline" placeholder="Première ligne">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="body" placeholder=" Contenu">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="button" placeholder="Boutton">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="url" placeholder="Url">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-xl-12">
                                        <input type="text" class="form-control"  name="lastline" placeholder="Dernière ligne">
                                    </div>
                                </div>
                            
                               
                              
                                <button type="submit" class="btn btn-primary bg-primary">Envoyer Email</button>
                            </form>
                        </div>
                    </div>
                    <!-- ***** Fin Partie Envoyer email ***** -->

                </div>
                </div>
                <!-- ***** Fin Partie Body Email ***** -->
             


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