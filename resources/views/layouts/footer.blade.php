<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">


    <!-- Footer Links -->
    <div style="background-color: white" class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <img id="nav_logo_footer" src="{{ asset('res/png_noir.png') }}">

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-center text-uppercase font-weight-bold">Réseaux</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <div id="networkwrapper">
                    <div class="text-center">
                        <a href="https://www.facebook.com/AtmosSeries/" target="_blank"><img class="logo" src="{{ asset('res/logo/fb.png') }}"></a>
                    </div>
                    <div class="text-center">
                        <a href="https://twitter.com/AtmosSeries" target="_blank"><img class="logo" src="{{ asset('res/logo/twitter.png') }}"></a>
                    </div>
                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Liens utiles</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    @if(Auth::check())
                        <a href="{{route('accueilUser',Auth::id())}}">Votre compte</a>
                    @else
                        <a href="{{route('login')}}">Connexion</a>
                    @endif
                </p>
                <p>
                    <a href="#!">Mentions légales</a>
                </p>


            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    </i>Lens 62300</p>
                <p>
                    </i>contact@atmos.fr</p>
                <p>
                    </i> 01.23.45.67.89</p>


            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div style="color:white;background-image: linear-gradient(45deg,#9B2A8D,#1F3896)" class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="#"> Atmos.fr</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
