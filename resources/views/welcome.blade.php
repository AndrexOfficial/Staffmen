<!doctype html>
<html lang="en">
<head>
    <title>StaffMen - Welcome</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                             @if (Route::has('login'))
                            <ul class="navbar-nav ml-auto">
                                @if (Auth::check())
                                <li class="nav-item"> <a class="nav-link active" href="{{ url('/dashboard') }}">DASHBOARD <span class="sr-only">(current)</span></a> </li>
                                @else
                                <li class="nav-item"> <a class="btn btn-outline-light my-3 my-sm-0 ml-lg-3" href="{{ url('/login') }}"">LOGIN</a> </li>
                                <li class="nav-item"> <a class="btn btn-outline-light my-3 my-sm-0 ml-lg-3" href="{{ url('/register') }}">REGISTRAZIONE</a> </li>
                                @endif
                            </ul>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <body>

                <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1>Staffmen</h1>
            <p class="tagline">La nuova piattaforma innovativa per trovare lavori part-time come Steward ad eventi. </p>
        </div>
        <div class="img-holder mt-3"><img src="images/iphonex.png" alt="phone" class="img-fluid"></div>
    </header>

    

    <div class="section light-bg" id="features">


        <div class="container">

            <div class="section-title">
                <small>CARATTERISTICHE</small>
                <h3>3 Killing Features</h3>
            </div>


            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-face-smile gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Semplice</h4>
                                    <p class="card-text">Bastano pochi click per poter trovare un lavoro come Steward </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-settings gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Personalizzabile</h4>
                                    <p class="card-text">La piattaforma offre la possibilità di personalizzare la ricerca in base ai propri gusti personali </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-lock gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Sicuro</h4>
                                    <p class="card-text">Tutte le società e privati che offrono lavoro sono certificati e verificati dal team di StaffMen </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
    <!-- // end .section -->
    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                    <h2>Ah la nostra app...</h2>
                    <p class="mb-4">L'app di StaffMen offre la possibilità di cercare lavoro e gestire le offerte in tutta comodità e ovunque con il proprio smartphone iOS o Android </p>
                </div>
            </div>
            <div class="perspective-phone">
                <img src="images/perspective.png" alt="perspective phone" class="img-fluid">
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/dualphone.png" alt="dual phone" class="img-fluid">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>
                        <h2>Un vero lancio nel mondo del lavoro</h2>
                        <p class="mb-4">Grazie a StaffMen potrai sperimentare il mondo del lavoro in modo sicuro e veloce, preparandosi cosí ad affrontare qualsiasi difficoltà </p>
                        </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->


    <div class="section light-bg">

        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <ul class="list-unstyled ui-steps">
                        <li class="media">
                            <div class="circle-icon mr-4">1</div>
                            <div class="media-body">
                                <h5>Crea un Account</h5>
                                <p>Crea il tuo account in soli 2 Minuti! </p>
                                <p>Inserisci i tuoi dati pesonali, carica la tua foto del profilo e il tuo curriculum personale </p>
                                <p>Et Voilà! </p>
                            </div>
                        </li>
                        <li class="media my-4">
                            <div class="circle-icon mr-4">2</div>
                            <div class="media-body">
                                <h5>Cerca un lavoro</h5>
                                <p>Cerca un lavoro tra le tante proposte offerte dalle società e privati e inizia a guadagnare!</p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">3</div>
                            <div class="media-body">
                                <h5>Enjoy!</h5>
                                <p>Una volta organizzato il tutto, recati nel luogo alla data dell'evento e segui le direttive del tuo manager/organizzatore </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <img src="images/iphonex.png" alt="iphone" class="img-fluid">
                </div>

            </div>

        </div>

    </div>
    <!-- // end .section -->


    <div class="section">
        <div class="container">
            <div class="section-title">
                <small>TESTIMONIALS</small>
                <h3>Cosa dicono i nostri clienti</h3>
            </div>

            <div class="testimonials owl-carousel">
                <div class="testimonials-single">
                    <img src="images/client.png" alt="client" class="client-img">
                    <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                    <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                    <p class="text-primary">United States</p>
                </div>
                <div class="testimonials-single">
                    <img src="images/client.png" alt="client" class="client-img">
                    <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                    <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                    <p class="text-primary">United States</p>
                </div>
                <div class="testimonials-single">
                    <img src="images/client.png" alt="client" class="client-img">
                    <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                    <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                    <p class="text-primary">United States</p>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->


    <div class="section light-bg" id="gallery">
        <div class="container">
            <div class="section-title">
                <small>GALLERY</small>
                <h3>Il minimalismo è tutto</h3>
            </div>

            <div class="img-gallery owl-carousel owl-theme">
                <img src="images/screen10.png" alt="image">
                <img src="images/screen11.png" alt="image">
                <img src="images/screen12.png" alt="image">
                <img src="images/screen13.png" alt="image">
            </div>

        </div>

    </div>
    <!-- // end .section -->

    <div class="section pt-0">
        <div class="container">
            <div class="section-title">
                <small>FAQ</small>
                <h3>Domande più frequenti</h3>
            </div>

            <div class="row pt-4">
                <div class="col-md-6">
                    <h4 class="mb-3">Posso provare prima di comprare?</h4>
                    <p class="light-font mb-5">La piattaforma di StaffMen è completamente gratuita e offre la migliore sicurezza in ambito lavorativo. </p>
                    <h4 class="mb-3">Come verrò pagato?</h4>
                    <p class="light-font mb-5">StaffMen non paga direttamente gli Steward, ma saranno gli stessi organizzatori dell'evento a stabilire il medoto di pagamento. </p>

                </div>
                <div class="col-md-6">
                    <h4 class="mb-3">Se ho un problema durante l'evento?</h4>
                    <p class="light-font mb-5">Se durante l'evento c'è un qualsiasi problema, parlane prima con il tuo manager. </p>
                    <p class="light-font mb-5">Se il problema è dovuto a qualche comportamento del tuo manager, contatta il team di StaffMen. </p>
                    <h4 class="mb-3">Bisogna firmare un contratto?</h4>
                    <p class="light-font mb-5">L'utilizzo della piattaforma di StaffMen è gratuito e non viene chiesta alcuna firma in fase di registrazione. </p>

                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->



    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">

                <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                <h2>Scaricala Adesso!</h2>
                <p class="tagline">Disponibile per iOS e per Android. Se ti piace l'app lasciaci una recensione sullo store mobile. </p>
                <div class="my-4">

                    <a href="#" class="btn btn-light"><img src="images/appleicon.png" alt="icon"> App Store</a>
                    <a href="#" class="btn btn-light"><img src="images/playicon.png" alt="icon"> Google play</a>
                </div>
                <p class="text-primary"><small><i>*Funziona da iOS 10.1+, Android Kitkat e versioni superiori. </i></small></p>
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <div class="light-bg py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> Via Gesù 3, Milano, MI 20121 ITALIA</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:support@staffmen.com">support@staffmen.com</a>
                        </p>
                    </div>
                    <div class="d-block d-sm-inline-block">
                        <p class="mb-0">
                            <span class="ti-headphone-alt mr-2"></span> <a href="tel:80036369900">800-3636-9900</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->
    <footer class="my-5 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small>STAFFMEN © 2018. ALL RIGHTS RESERVED.</a></small></p>
    </footer>

    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>

</body>

</html>
