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
    <style>
    .member-filter {
    display: flex;
    justify-content: flex-start; /* Aligns to the left */
    margin-bottom: 40px;
    padding: 0 20px;
}

.member-filter select {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 8px;
    border: 2px solid #ddd;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: border-color 0.3s ease;
    min-width: 200px;
}


    .member-filter select:focus {
        outline: none;
        border-color: #2a9d8f;
    }

    .team-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
    }

    .member-card {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
        text-align: center;
        padding: 20px;
        max-width: 250px;
        transition: transform 0.3s ease;
    }

    .member-card:hover {
        transform: translateY(-10px);
    }

    .member-card img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .member-card h4 {
        font-size: 18px;
        color: #2a2a2a;
        margin-bottom: 5px;
    }

    .member-card p {
        font-size: 14px;
        color: #666;
    }

    .member-section {
        display: none;
    }

    .member-section.active {
        display: flex;
    }
</style>

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
                                <h2>Our Team</h2>
                            </div>
                            <div class="border-box"></div>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><span class="flaticon-right-arrow"></span></li>
                                    <li class="active">Our Team</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start Team Style1 Area-->
        <section class="team-style1-area">
            <div class="container">
                <div class="sec-title text-center">
                    <div class="sub-title">
                        <div class="inner">
                            <h3>We Change Your Life & World</h3>
                        </div>
                        <div class="outer"><img src="assets/images/icon/loveicon.png" alt=""></div>
                    </div>
                    <h2 id="teamHeading">Trustees</h2>
                </div>
                <!-- Dropdown Filter -->
<div class="member-filter">
    <select id="memberType" onchange="filterMembers()">
        <option value="trustees">Trustees</option>
        <option value="advisory">Advisory Board</option>
        <option value="mentors"> Our Mentors</option>
        <option value="working">Working Body</option>
    </select>
</div>



<!-- Trustees -->
<div class="team-cards member-section active" id="trustees">
    <div class="member-card">
        <img src="assets/images/team/team-v1-1.jpg" alt="Trustee 2">
        <h4>Mr. Pradip Mishra</h4>
        <p>Chairman</p>
    </div>
    <div class="member-card">
        <img src="assets/images/team/team-v1-2.jpg" alt="Trustee 2">
        <h4>Adv. Prakashchandra N. Patel</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/team-v1-5.jpg" alt="Trustee 1">
        <h4>Mrs. Rupa Mishra</h4>
        
    </div>
    
    <div class="member-card">
        <img src="assets/images/team/team-v1-3.jpg" alt="Trustee 2">
        <h4>Mr. Chandan Kumar Mishra</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/team-v1-4.jpg" alt="Trustee 2">
        <h4>Mr. Anand Kumar Jha</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/navindra_mishra.jpg" alt="Trustee 2">
        <h4>Mr. Navindra Mishra</h4>
        
    </div>
</div>

<!-- Advisory Board -->
<div class="team-cards member-section" id="advisory">
    <div class="member-card">
        <img src="assets/images/team/chandras.jpg" alt="Advisor 1">
        <h4>Dr.K.S. Chandrashekhar</h4>
        <p> Advisory Board Chairman</p>
    </div>
    <div class="member-card">
        <img src="assets/images/team/nagendra_mishra.jpg" alt="Advisor 2">
        <h4>Mr. Nagendra Singh</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/pinky_khimani.jpg" alt="Advisor 2">
        <h4>Mrs. Pinky Khimani</h4>
        
    </div>

    <div class="member-card">
        <img src="assets/images/team/surya_prakash.jpg" alt="Advisor 2">
        <h4>Mr. Surya Prakash Agarwal</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/sanjeev.jpg" alt="Advisor 2">
        <h4>Mr. Sanjeev Bhuwalka</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/anil_dixit.jpg" alt="Advisor 2">
        <h4>Mr. Anil Dixit</h4>
        
    </div>
</div>

<!-- Mentors -->
<div class="team-cards member-section" id="mentors">
    <div class="member-card">
        <img src="assets/images/team/dilip_barnwal.jpg" alt="Advisor 2">
        <h4>Mr. Dilip Barnwal</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/blank.webp" alt="Advisor 2">
        <h4>Mr. Durgesh Rajpurohit</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/blank.webp" alt="Advisor 2">
        <h4>Mr. Kapil Kanodiya</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/Dr.laksham_rohit.jpg" alt="Advisor 2">
        <h4>Dr. Lakshman Rohit</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/G_L_patel.png" alt="Mentor 1">
        <h4>Dr. G L Patel</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/sanjay_singh.jpg" alt="Mentor 2">
        <h4>Mr. Sanjay Singh</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/rashmi.jpg" alt="Mentor 2">
        <h4>Ms. Rashmi Nair</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/rajjev_ranjan.jpg" alt="Mentor 2">
        <h4>Mr. Rajeev Ranjan</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/blank.webp" alt="Advisor 2">
        <h4>Dr. Rajesh Shah</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/blank.webp" alt="Advisor 2">
        <h4>Mr. Mohan K.S</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/blank.webp" alt="Advisor 2">
        <h4>Mr. Priyank Singh Parmar</h4>
        
    </div>
    
    
    
</div>

<!-- Working Body -->
<div class="team-cards member-section" id="working">
    <div class="member-card">
        <img src="assets/images/team/dhiraj.jpg" alt="Worker 1">
        <h4>Mr. Dhiraj Kumar Singh</h4>
        <p>President</p>
    </div>
    <div class="member-card">
        <img src="assets/images/team/jagdish.jpg" alt="Worker 2">
        <h4>Mr. Jagdish Singh Kang </h4>
        <p>Raktveer President</p>
    </div>
    <div class="member-card">
        <img src="assets/images/team/prabha.jpg" alt="Worker 2">
        <h4>Ms. Prabha Kathiria</h4>
        <p>Narishakti President</p>
    </div>
    <div class="member-card">
        <img src="assets/images/team/bipin_tiwari.jpg" alt="Worker 2">
        <h4>Mr. Bipin Tiwari</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/team-v1-10.jpg" alt="Worker 2">
        <h4>Mr. Ravi Shankar Pandey</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/rahul_shah.jpg" alt="Worker 2">
        <h4>Mr. Rahul Shah</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/jatin_mistry.jpg" alt="Worker 2">
        <h4>Mr. Jatin Mistry</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/bhiswaranjan.jpg" alt="Worker 2">
        <h4>Mr. Biswaranjan Muderla</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/team-v1-14.jpg" alt="Worker 2">
        <h4>Mr. Dilip Pusti</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/kumar_kanat.jpg" alt="Worker 2">
        <h4>Mr. Kumarkant Jha</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/ram_sonar.jpg" alt="Worker 2">
        <h4>Mr. Ram Raksha Sonkar</h4>
        
    </div>
        <div class="member-card">
        <img src="assets/images/team/team-v1-7.jpg" alt="Worker 1">
        <h4>Mr. Pankaj Jha</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/sudhir_jha.jpg" alt="Worker 2">
        <h4>Mr. Sudhir Jha</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/team-v1-8.jpg" alt="Worker 2">
        <h4>Mr. Sadik Meghani</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/blank.webp" alt="Worker 2">
        <h4>Mr. Biswanath Mishra</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/gopal.jpg" alt="Worker 2">
        <h4>Mr. Gopal Agarwal</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/murlidhar.jpg" alt="Worker 2">
        <h4>Mr. Murlidhar Mali</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/dinkar.jpg" alt="Worker 2">
        <h4>Mr. Dinkar Dubey</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/mathan_bhanushali.jpg" alt="Worker 2">
        <h4>Mr. Manthan Bhanushali</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/blank.webp" alt="Worker 2">
        <h4>Mr. Pyarelal Sinsinwar</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/munna_lal.jpg" alt="Worker 2">
        <h4>Mr. Munna Lal Shah</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/dinkar.jpg" alt="Worker 2">
        <h4>Mr. Dinkar Dubey</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/prem.jpg" alt="Worker 2">
        <h4>Mr. Prem Prakash Patel</h4>
        
    </div>
    <div class="member-card">
        <img src="assets/images/team/rahul_shah.jpg" alt="Worker 2">
        <h4>Mr. Rahul Shah</h4>
        
    </div>


</div>

            </div>
        </section>
        <!--End Team Style1 Area-->
          
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
    <script src="assets/js/jquery.polyglot.language.switcher.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/knob.js"></script>
    <script src="assets/js/map-script.js"></script>
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
    <script>
    function filterMembers() {
        const selected = document.getElementById('memberType').value;
        const sections = document.querySelectorAll('.member-section');
        const teamHeading = document.getElementById('teamHeading');
        
        // Update heading based on selection
        switch(selected) {
            case 'trustees':
                teamHeading.textContent = 'Trustees';
                break;
            case 'advisory':
                teamHeading.textContent = 'Advisory Board';
                break;
            case 'mentors':
                teamHeading.textContent = ' Mentors';
                break;
            case 'working':
                teamHeading.textContent = 'Working Body';
                break;
            default:
                teamHeading.textContent = 'Meet Our Team';
        }

        sections.forEach(section => {
            section.classList.remove('active');
        });

        document.getElementById(selected).classList.add('active');
    }
</script>

</body>

</html>