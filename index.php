<?php
    ini_set("SMTP", "smtp.baloniarnia.com.pl");
    ini_set("sendmail_from", "kontakt@baloniarnia.com.pl");

    $formInvalid = false;
    $formSent = false;
    $success = 'Dziekujemy za wiadomość';
    $error = 'Wysłanie nie powiodło się, spróbuj później';

    if($_POST['contact-form'] && 'contact-form' == $_POST['contact-form']){

        $formSent = true;
        $errors = array();

        if(!isset($_POST['name']) || '' == trim($_POST['name'])){
            $errors['name'] = 'Imie nie może być puste';
        }

        if(!isset($_POST['email']) || '' == trim((string)$_POST['email'])){
            $errors['email'] = 'Email nie moze byc pusty';
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email jest błędny';
        }

        if(!isset($_POST['subject']) || '' == trim((string)$_POST['subject'])){
            $errors['subject'] = 'Temat nie może być pusty';
        }

        if(!isset($_POST['message']) || '' == trim((string)$_POST['message'])){
            $errors['message'] = 'Wiadomość nie może być pusta';
        }

        if(empty($errors)){
            $headers ='From: ' . $_POST['email'] . "\n";
            $headers .='Reply-To: ' . $_POST['email'] . "\n";
            $headers .='Content-Type: text/plain; charset="UTF-8"'."\n";

            $message = 'Od: '.$_POST['name']."\n";
            $message .= 'Email: '.$_POST['email']."\n";
            $message .= 'Temat: '.$_POST['subject']."\n";
            $message .= 'Wiadomość: '.$_POST['message']."\n";

            if (
            !mail(
                    'kontakt@baloniarnia.com.pl',
                    'Wiadomość z formularza kontaktowego na stronie Baloniarnia.com.pl',
                    $message,
                    $headers
            )
            ){
                $formInvalid = true;
            }
        }else{
            $formInvalid = true;
        }


    }

?>
<!DOCTYPE html>
<html>
<head lang="pl">
    <meta charset="UTF-8">
    <title>Balony i dekoracje</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <!-- Global CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/image/favicon.ico" type="image/x-icon">
</head>
<body data-spy="scroll" data-target="#navbar-collapse" data-offset="80">
<!-- Header -->
<header id="header" class="header navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="#home" class="logo scrollto" title="Strona główna">
                <img src="assets/image/stars-balloons.png" class="img-responsive" alt="Stars balloons">
                <span>Baloniarnia</span>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse">
            <ul class="nav navbar-nav pull-right">
                <li><a href="#home" class="scrollto">Strona Główna</a></li>
                <li><a href="#offer" class="scrollto">Oferta</a></li>
                <li><a href="#contact" class="scrollto">Kontakt</a></li>
            </ul>
        </div>
    </div>
</header>
<!-- End Header -->
<!-- O firmie -->
<section class="about" id="home">
    <!--<div class="box-about">-->
        <!--<div class="box-content">-->
            <!--<div class="container">-->
                <!--<div class="row">-->
                    <!--<div class="section-header text-center">-->
                        <!--<h1>Lorem ipsum</h1>-->
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam</p>-->
                        <!--<a href="#" class="btn btn-lg btn-about">Napisz do nas</a>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item item-1 active">
                <div class="carousel-caption col-xs-12 col-md-10 col-md-offset-2">
                    <h2><span>Dekoracje</span> urodzinowe</h2>
                    <p>Balony, Konfeti, Czapeczki</p>
                </div>
            </div>
            <div class="item item-2">
                <div class="carousel-caption col-xs-12 col-md-10 col-md-offset-2">
                    <h2><span>Dekoracje</span> ślubne</h2>
                    <p>Balony, Serca, Zaproszenia</p>
                </div>
            </div>
            <div class="item item-3">
                <div class="carousel-caption col-xs-12 col-md-10 col-md-offset-2">
                    <h2><span>Dekoracje</span> Halloweenowe</h2>
                    <p>Naklejaki, Balony, Dynie, Pajęczyny</p>
                </div>
            </div>
            <div class="item item-4">
                <div class="carousel-caption col-xs-12 col-md-10 col-md-offset-2">
                    <h2><span>Dekoracje</span> inne</h2>
                    <p>Lampiony, itp.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End O firmie -->
<!-- Offer -->
<section id="offer" class="offer">
    <div class="container">
        <div class="row">
            <div class="section-header section-header-primary text-center">
                <h2>Oferta</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="offer-box box-1">
                    <div class="offer-image">
                        <img src="assets/image/birthday-cake.png" alt="Balony urodzinowe">
                    </div>
                    <div class="offer-slogan">
                        <h3>Urodziny</h3>
                    </div>
                    <div class="offer-hide-text">
                        <p>Balony urodzinowe oraz na inne okazje</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="offer-box box-2">
                    <div class="offer-image">
                        <img src="assets/image/engagement-rings.png" alt="">
                    </div>
                    <div class="offer-slogan">
                        <h3>Ślub</h3>
                    </div>
                    <div class="offer-hide-text">
                        <p>Balony oraz inne dekoracje ślubne</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="offer-box box-3">
                    <div class="offer-image">
                        <img src="assets/image/terror-ghost.png" alt="">
                    </div>
                    <div class="offer-slogan">
                        <h3>Halloween</h3>
                    </div>
                    <div class="offer-hide-text">
                        Różnego rodzaju dekoracje Halloweenowe
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="offer-box box-4">
                    <div class="offer-image">
                        <img src="assets/image/comedy-and-tragedy.png" alt="">
                    </div>
                    <div class="offer-slogan">
                        <h3>Inne</h3>
                    </div>
                    <div class="offer-hide-text">
                        <p>Inne dokoracje</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Offer -->
<!-- Google-map -->
<div class="google">
    <div id="google-map" class="google-map"  data-latitude="53.4330206" data-longitude="14.5483543"></div>
</div>
<!-- End Google-map -->
<!-- Contact -->
<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2>Kontakt</h2>
                <p>Zapraszamy do kontaktu z Nami</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="contact-address">
                    <h3>Baloniarnia</h3>
                    <address>
                        <div>
                            <p>ul. Deptak Bogusława 1/1</p>
                            <p>Szczecin 71-001</p>
                        </div>
                        <div>
                            <p>Pon - Pt 9:00 do 17:00 </p>
                            <p>Sob. 9:00 do 15:00</p>
                        </div>
                        <div>
                            <strong class="phone">Tel. 500-000-000</strong>
                            <strong class="mail"><a href="mailto:kontakt@baloniarnia.com.pl">kontakt@baloniarnia.com.pl</a></strong>
                        </div>
                    </address>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="contact-form-wrapper">
                    <form id="contact-form" name="contact-form" method="post" action="#contact">
                        <input type="hidden" name="contact-form" value="contact-form">
                        <div class="form-group <?php if($formInvalid && $errors['name']){ echo 'has-error';} ?>">
                            <input type="text" name="name" class="form-control" placeholder="Imię" value="<?php if($formInvalid && isset($_POST['name'])){echo $_POST['name'];};?>" required>
                        </div>
                        <div class="form-group <?php if($formInvalid && $errors['email']){ echo 'has-error';} ?>">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if($formInvalid && isset($_POST['email'])){echo $_POST['email'];};?>" required>
                        </div>
                        <div class="form-group <?php if($formInvalid && $errors['subject']){ echo 'has-error';} ?>">
                            <input type="text" name="subject" class="form-control" placeholder="Temat" value="<?php if($formInvalid && isset($_POST['subject'])){echo $_POST['subject'];};?>" required>
                        </div>
                        <div class="form-group <?php if($formInvalid && $errors['message']){ echo 'has-error';} ?>">
                            <textarea name="message" class="form-control" rows="4" placeholder="Wiadomość" value="<?php if($formInvalid && isset($_POST['message'])){echo $_POST['message'];};?>" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-contact"><i class="fa fa-paper-plane" aria-hidden="true"></i> Wyślij wiadomość</button>
                    </form>
                    <div>
                        <?php

                        if($formSent){
                            if(!$formInvalid){
                                echo '<p class="success">' . $success . '</p>';
                            }else if(!empty($errors)){
                                foreach($errors as $er){
                                    echo '<p class="error">' . $er . '</p>';
                                }
                            }else{
                                echo '<p class="error">' . $error . '</p>';
                            }
                        }
                        ?>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact -->
<!-- Footer -->
<footer id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Copyright © 2016 Baloniarnia - by <a href="http://netitout.pl/" title="NETITOUT">NET<span>IT</span>OUT</a></p>
                </div>
            </div>
        </div>
    </footer>
<!-- End Footer -->
<!-- Javascritp -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD_7iaQVyA8wJ8f7Ov7_M734cIjBffEZ4&libraries=geometry,places">
</script>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>