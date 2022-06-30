<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 text-center">
                    <div class="first-item">
                        <!-- <div class="logo">
                            <img src="/logo0.jpg" height="60" width="60"  alt="" class="mx-auto" >
                        </div> -->
                        <h4 class="text-warning">TuniaBoutique</h4>
                        <ul>
                            <li><a href="#"> Bienvenu!</a></li>
                            <li><a href="#">TuniaBoutique@e-commerce.com</a></li>
                            <li><a href="#">90 400 700</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4 class="text-warning">Categories</h4>
                    <ul>
                        <li><a href="#men">Vêtements Homme  Shopping</a></li>
                        <li><a href="#women">Vêtements Femme  Shopping</a></li>
                        <li><a href="#kids">Vêtements Enfants Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3  mx-auto">
                    <h4 class="text-warning">Liens utiles</h4>
                    <ul>
                           @if (Route::has('login'))
                            @auth
                            <li><a href="/redirection" class="active">Accueil</a></li>
                            @else
                            <li><a href="/" class="active">Accueil</a></li>
                            @endauth
                            @endif
                         
                        <li><a href="{{url('/à-propos-de-nous')}}">À propos de Nous</a></li>
                        <li><a href="#">Contacter Nous</a></li>
                       
                    </ul>
                </div>
              <!--   <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div> -->
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022-2023 , Tous droits réservés.
                        
                        
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook text-warning"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram text-warning"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin text-warning"></i></a></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
