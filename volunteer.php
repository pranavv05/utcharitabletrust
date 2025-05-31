<?php
require('./config.php');
if (isset($_POST['send'])) {
    $name = checkInput($_POST['form_name']);
    $email = checkInput($_POST['form_email']);
    $phone_number = checkInput($_POST['form_phone']);
    $blood = checkInput($_POST['form_blood']);
    $address = checkInput($_POST['form_address']);
    $city = checkInput($_POST['form_city']);
    $message = checkInput($_POST['form_message']);

    if (!empty($name) || !empty($email) || !empty($phone_number) || !empty($blood) || !empty($address) || !empty($city) || !empty($message)) {
        $sql = "INSERT INTO members(membarId,name,email,phone,bloodgroup,address,city,purpose) VALUES (rand(),'$name','$email','$phone_number','$blood','$address','$city','$message')";
        $result = mysqli_query($con, $sql);
        if ($result == true) {
            echo "<script>alert('Your Member Form Submitted Successfully')</script>";
        } else {
            echo "<script>alert('Member Form Submitted Failed Please Try Again!!')</script>";
        }
    } else {
        echo "<script>alert('Please Fill All The Details')</script>";
    }
}

function checkInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UT Charitable Trust</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/imp.css">
    <link rel="stylesheet" href="assets/css/custom-animate.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">
    <link rel="stylesheet" href="assets/css/hiddenbar.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <!-- Module css -->
    <link rel="stylesheet" href="assets/css/module-css/header-section.css">
    <link rel="stylesheet" href="assets/css/module-css/banner-section.css">
    <link rel="stylesheet" href="assets/css/module-css/about-section.css">
    <link rel="stylesheet" href="assets/css/module-css/blog-section.css">
    <link rel="stylesheet" href="assets/css/module-css/fact-counter-section.css">
    <link rel="stylesheet" href="assets/css/module-css/faq-section.css">
    <link rel="stylesheet" href="assets/css/module-css/contact-page.css">
    <link rel="stylesheet" href="assets/css/module-css/breadcrumb-section.css">
    <link rel="stylesheet" href="assets/css/module-css/team-section.css">
    <link rel="stylesheet" href="assets/css/module-css/partner-section.css">
    <link rel="stylesheet" href="assets/css/module-css/testimonial-section.css">
    <link rel="stylesheet" href="assets/css/module-css/footer-section.css">

    <link rel="stylesheet" href="assets/css/color.css">
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rtl.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/images/favicon/favicon-16x16.png" sizes="16x16">

    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

</head>

<body>

    <div class="boxed_wrapper ltr">

        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

        <!-- Main header-->
        <?php include('header.php'); ?>

        <!--Start breadcrumb area-->
        <section class="breadcrumb-area" style="background-image: url(assets/images/breadcrumb/breadcrumb-7.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content text-center">
                            <div class="parallax-scene parallax-scene-1">
                                <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                    <div class="shape1">
                                        <img class="float-bob" src="assets/images/shape/breadcrumb-shape1.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="parallax-scene parallax-scene-1">
                                <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                    <div class="shape2">
                                        <img class="zoominout" src="assets/images/shape/breadcrumb-shape2.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="title">
                                <h2>Member Form</h2>
                            </div>
                            <div class="border-box"></div>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><span class="flaticon-right-arrow"></span></li>
                                    <li class="active">Member Form</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start Contact Style1 Area-->
        <section class="contact-style1-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-style1_form">
                            <div class="sec-title">
                                <div class="sub-title martop0">
                                    <div class="inner">
                                        <h3>Support UT Charitable Trust With Heart!</h3>
                                    </div>
                                </div>
                                <h2>Become a Member</h2>
                                <p>Connect With Us
                                </p>
                            </div>
                            <div class="contact-form">
                                <form class="default-form2" method="POST">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                                                <div class="icon"><span class="flaticon-user"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="email" name="form_email" value="" placeholder="Email" required="">
                                                <div class="icon"><span class="flaticon-opened"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="text" name="form_phone" value="" placeholder="Phone" required="">
                                                <div class="icon"><span class="fa fa-phone"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="text" name="form_blood" value="" placeholder="Blood Group" required="">
                                                <div class="icon"><span class="fa fa-plus"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="text" name="form_address" value="" placeholder="Address" required="">
                                                <div class="icon"><span class="fa fa-map-marker"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="text" name="form_city" value="" placeholder="City" required="">
                                                <div class="icon"><span class="fa fa-map-marker"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="input-box">
                                                <textarea name="form_message" placeholder="Why Do You Want To Join Us"></textarea>
                                                <div class="icon"><span class="fa fa-pencil"></span></div>
                                            </div>
                                            <div class="button-box">
                                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                                <button class="btn-one" type="submit" data-loading-text="Please wait..." name="send">
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i> Submit
                                                        Now</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Contact Style1 Area-->

        <!--Start footer area -->
        <?php include('footer.php'); ?>
        <!--End footer area-->

        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-angle-up"></span>
        </button>

    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/jquery.bxslider.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.enllax.min.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.paroller.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/knob.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/pagenav.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/scrollbar.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/timePicker.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/jquery-sidebar-content.js"></script>
    <!-- thm custom script -->
    <script src="assets/js/custom.js"></script>

</body>

</html>