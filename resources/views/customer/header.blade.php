
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                 
                        <!-- ***** Partie Logo  ***** -->
            
                        @if (Route::has('login'))
                            @auth
                        <a href="/redirection" class="logo">
                            <img src="/logo0.jpg" height="50" width="50" >
                           
                        </a>
                        @else
                        <a href="/" class="logo">
                            <img src="/logo0.jpg" height="50" width="50" >
                        </a>
                        @endauth
                       @endif
                     <span class="text-warning">TuniaBoutique</span>
                        <!-- *****Fin Partie Logo  ***** -->
                        <!-- ***** Partie Menu ***** -->
                        <ul class="nav">
                           
                            @if (Route::has('login'))
                            @auth
                            <li class="scroll-to-section"><a href="/redirection" class="active">Accueil</a></li>
                            @else
                            <li class="scroll-to-section"><a href="/" class="active">Accueil</a></li>
                            @endauth
                            @endif
                         
                            
                            <li class="scroll-to-section"><a href="#men">Homme</a></li>
                            <li class="scroll-to-section"><a href="#women">Femme</a></li>
                            <li class="scroll-to-section"><a href="#kids">Enfant</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="{{url('/à-propos-de-nous')}}">À propos de nous</a></li>
                                    <li><a href="{{url('/consulter-tous-produits')}}">Produits</a></li>
                                    <li><a href="contact.html">Contacter Nous </a></li>
                                </ul>
                            </li>
                          <li>

                          </li>

                     @if (Route::has('login'))
                        @auth
                        <!-- Panier (Carte) -->
                        <li class="scroll-to-section"><a href="{{url('/consulter-carte')}}">  <i class="fa-solid fa-cart-shopping"  style="font-size:20px;"></i>[{{$count}} ] </a></li>
                        <!-- Commande (Ordre) -->
                        <li class="scroll-to-section"><a href="{{url('/consulter-ordres-cust')}}"><i class="fa-solid fa-basket-shopping" style="font-size:20px;"></i></a></li>
                        <x-app-layout>
                        </x-app-layout>
                        <!-- connecter et s'inscrire -->
                         @else
                            <li class="scroll-to-section">  <a href="{{ route('login') }}"  class="btn pt-0 pb-0" style="border:solid 2px #25282dbf; color:#000; ">Connecter</a></li>
                         @if (Route::has('register'))
                            <li class="scroll-to-section"><a href="{{ route('register') }}" class="btn pt-0 pb-0" style="border:solid 2px #25282dbf; color:#000; ">S'inscrire</a></li>
                         @endif
                        @endauth
                     @endif
                        </ul>        
                       <!--  <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> -->
                        <!-- ***** Fin Partie Menu ***** -->
                    </nav>
                    
                </div>
            </div>
        </div>
    </header>



    