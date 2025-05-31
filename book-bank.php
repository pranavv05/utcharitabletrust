<?php
require('./config.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UT Charitable Trust - Book Bank</title>

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

    <!-- Custom styles for book bank -->
    <style>
        .filter-section {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .filter-section .form-group {
            margin-bottom: 15px;
        }
        
        .book-table {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .book-table thead {
            background-color: #034D6E;
            color: white;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .no-results {
            padding: 30px;
            text-align: center;
            background: #f9f9f9;
        }
        
        .class-badge {
            display: inline-block;
            padding: 5px 10px;
            background-color: #034D6E;
            color: white;
            border-radius: 4px;
            font-size: 12px;
        }
        
        .book-count {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box .form-control {
            padding-right: 40px;
        }
        
        .search-box .search-icon {
            position: absolute;
            right: 15px;
            top: 10px;
            color: #666;
        }
        
        .filter-btn {
            background-color: #034D6E;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .filter-btn:hover {
            background-color: #023D5E;
        }
        
        .reset-btn {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .reset-btn:hover {
            background-color: #5a6268;
        }
        
        @media (max-width: 768px) {
            .filter-row .col-md-3 {
                margin-bottom: 10px;
            }
            
            .table-responsive {
                margin-top: 15px;
            }
        }
    </style>

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
                                <h2>Book Bank</h2>
                            </div>
                            <div class="border-box"></div>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><span class="flaticon-right-arrow"></span></li>
                                    <li class="active">Book Bank</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start Causes Gallery Area-->
        <section class="causes-gallery-area">
            <div class="container">
                <div class="sec-title text-center">
                    <div class="sub-title">
                        <div class="inner">
                            <h3>We Change Your Life &amp; World</h3>
                        </div>
                        <div class="outer"><img src="assets/images/icon/loveicon.png" alt=""></div>
                    </div>
                    <h2>Book Bank</h2>
                </div>
                <!--Start Blog Details Text 2-->
                <div class="blog-details-text-2" style="padding-bottom: 30px;">
                    <p class="justify-text-center">More Than 400 students use the Book Bank, which is sponsored by the UT Charitable Trust. Many students may find it difficult to access educational resources, but we work to change that. With the help of our Book Bank programme, students can access textbooks and study resources for Standard 9 through Standard 12, JEE, NEET, CS, and CA. Join us in supporting students and assisting them in achieving their academic objectives.</p>
                    <p class="justify-text-center">The following group of needy pupils receives the books when they are returned at the end of the school year.</p>
                    <p class="justify-text-center">There is also scope for expanding the reach of the book bank to a larger number of needy students.</p>
                </div>
                <!--End Blog Details Text 2-->
            </div>
        </section>
        <!--End Causes Gallery Area-->

        <!--Book List Area-->
        <section class="causes-gallery-area" style="padding-top: 0px;margin-top: -30px;">
            <div class="container">
                <h2 class="text-center mb-4">Book Collection</h2>
                
                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="row filter-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="classFilter">Filter by Class:</label>
                                <select class="form-control" id="classFilter">
                                    <option value="">All Classes</option>
                                    <?php
                                    // Get unique classes from the database
                                    $classQuery = mysqli_query($con, "SELECT DISTINCT class FROM book_lists WHERE status = 'active' ORDER BY class");
                                    while ($classRow = mysqli_fetch_assoc($classQuery)) {
                                        echo '<option value="' . $classRow['class'] . '">' . $classRow['class'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="authorFilter">Filter by Author:</label>
                                <select class="form-control" id="authorFilter">
                                    <option value="">All Authors</option>
                                    <?php
                                    // Get unique authors from the database
                                    $authorQuery = mysqli_query($con, "SELECT DISTINCT author FROM book_lists WHERE status = 'active' ORDER BY author");
                                    while ($authorRow = mysqli_fetch_assoc($authorQuery)) {
                                        echo '<option value="' . $authorRow['author'] . '">' . $authorRow['author'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group search-box">
                                <label for="searchInput">Search:</label>
                                <input type="text" class="form-control" id="searchInput" placeholder="Search by book name, author, etc.">
                                <span class="search-icon"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group" style="margin-top: 32px;">
                                <button id="resetFilters" class="reset-btn"><i class="fa fa-refresh"></i> Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Book Count -->
                <div class="book-count" id="bookCount"></div>
                
                <!-- Table of books -->
                <div class="table-responsive">
                    <table class="table table-bordered book-table" id="bookTable">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">ID</th>
                                <th scope="col" width="35%">Book Name</th>
                                <th scope="col" width="25%">Author</th>
                                <th scope="col" width="15%">Class</th>
                                <th scope="col" width="20%">ISBN No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM book_lists WHERE status = 'active' ORDER BY class, book_name");
                            $index = 0;
                            $rowcount = mysqli_num_rows($query);
                            if ($rowcount > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $index++;
                            ?>
                                    <tr data-class="<?php echo $row['class']; ?>" data-author="<?php echo $row['author']; ?>">
                                        <th scope="row"><?php echo $index; ?></th>
                                        <td><?php echo $row['book_name']; ?></td>
                                        <td><?php echo $row['author']; ?></td>
                                        <td><span class="class-badge"><?php echo $row['class']; ?></span></td>
                                        <td><?php echo $row['isbn']; ?></td>
                                    </tr>
                            <?php  }
                            }
                            ?>
                        </tbody>
                    </table>
                    
                    <!-- No results message -->
                    <div id="noResults" class="no-results" style="display: none;">
                        <h5>No books match your search criteria</h5>
                        <p>Try adjusting your filters or search term</p>
                    </div>
                </div>
            </div>
        </section>
        <!--End Book List Area-->

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
    
    <!-- Book filtering script -->
    <script>
        $(document).ready(function() {
            // Update book count
            function updateBookCount() {
                var visibleRows = $('#bookTable tbody tr:visible').length;
                $('#bookCount').text('Showing ' + visibleRows + ' of ' + $('#bookTable tbody tr').length + ' books');
                
                // Show/hide no results message
                if (visibleRows === 0) {
                    $('#noResults').show();
                    $('#bookTable').hide();
                } else {
                    $('#noResults').hide();
                    $('#bookTable').show();
                }
            }
            
            // Initialize book count
            updateBookCount();
            
            // Filter function
            function filterBooks() {
                var classFilter = $('#classFilter').val().toLowerCase();
                var authorFilter = $('#authorFilter').val().toLowerCase();
                var searchTerm = $('#searchInput').val().toLowerCase();
                
                $('#bookTable tbody tr').each(function() {
                    var $row = $(this);
                    var bookClass = $row.data('class').toLowerCase();
                    var bookAuthor = $row.data('author').toLowerCase();
                    var bookName = $row.find('td:eq(0)').text().toLowerCase();
                    var bookIsbn = $row.find('td:eq(3)').text().toLowerCase();
                    
                    // Check if row matches all filters
                    var classMatch = classFilter === '' || bookClass === classFilter;
                    var authorMatch = authorFilter === '' || bookAuthor === authorFilter;
                    var searchMatch = searchTerm === '' || 
                                      bookName.includes(searchTerm) || 
                                      bookAuthor.includes(searchTerm) || 
                                      bookClass.includes(searchTerm) || 
                                      bookIsbn.includes(searchTerm);
                    
                    if (classMatch && authorMatch && searchMatch) {
                        $row.show();
                    } else {
                        $row.hide();
                    }
                });
                
                // Update book count after filtering
                updateBookCount();
            }
            
            // Event listeners for filters
            $('#classFilter, #authorFilter').on('change', filterBooks);
            $('#searchInput').on('keyup', filterBooks);
            
            // Reset filters
            $('#resetFilters').on('click', function() {
                $('#classFilter').val('');
                $('#authorFilter').val('');
                $('#searchInput').val('');
                $('#bookTable tbody tr').show();
                updateBookCount();
            });
        });
    </script>

</body>

</html>