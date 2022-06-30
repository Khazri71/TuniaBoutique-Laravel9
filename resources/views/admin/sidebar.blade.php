<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h4 class="text-warning " style="margin-left:30px; margin-top:10px;">TuniaBoutique</h4>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{$username}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/redirection" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Tableau de Bord</a>
                    <a href="{{url('/ajouter-categorie')}}" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Ajouter Catégorie</a>
                   
                   <!--  <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Produit</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{url('/ajouter-produit')}}" class="dropdown-item  nav-item nav-link"  style="padding-left:70px; background-color:transparent;" >Ajouter</a>
                            <a href="{{url('/consulter-produits')}}" class="dropdown-item  nav-item nav-link" style="padding-left:70px; background-color:transparent;">Consulter</a>
                        </div>
                    </div>  -->
                    <a href="{{url('/ajouter-produit')}}" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Ajouter Produit</a>
                    <a href="{{url('/consulter-produits')}}" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Consulter Produits</a>


                    <a href="{{url('/consulter-ordres')}}" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Consulter Ordre</a>
                    
                </div>
            </nav>
        </div>