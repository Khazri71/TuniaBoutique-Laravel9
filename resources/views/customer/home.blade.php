<!DOCTYPE html>
<html lang="en">
   <head>
    <!-- **** Partie style ****-->
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
       @include('customer.banner')
    <!-- ***** Fin Partie Banner ***** -->

    <!-- ***** Partie Men Clothes ***** -->
       @include('customer.men-clothes')
    <!-- ***** Fin Partie Men Clothes ***** -->

    <!-- ***** Partie Women Clothes ***** -->
       @include('customer.women-clothes')
    <!-- ***** Fin Partie Women Clothes ***** -->

    <!-- ***** Partie Kid Clothes ***** -->
      @include('customer.kid-clothes')
    <!-- ***** Fin Partie Kid Clothes ***** -->

    <!-- ***** Partie Explore ***** -->
      @include('customer.explore')
    <!-- ***** Fin Partie Explore ***** -->

    <!-- ***** Partie Info Detail ***** -->
      @include('customer.infodetail')
    <!-- ***** Fin Partie Info Detail ***** -->
    
    <!-- ***** Partie Footer ***** -->
      @include('customer.footer')
    <!-- ***** Fin Partie Footer ***** -->

    <!-- ***** Partie Script ***** -->
       @include('customer.script')
    <!-- ***** Fin Partie Script ***** -->

  </body>
</html>