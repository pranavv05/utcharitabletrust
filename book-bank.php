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
        .book-table thead th {
            cursor: pointer;
        }
        .book-table thead th .sort-icon {
            margin-left: 5px;
            color: #ddd;
        }
        .book-table thead th.sorted-asc .sort-icon,
        .book-table thead th.sorted-desc .sort-icon {
            color: white;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .pagination .page-item .page-link {
            color: #034D6E;
        }
        .pagination .page-item.active .page-link {
            background-color: #034D6E;
            border-color: #034D6E;
            color: white;
        }
        .loader-container {
            display: none;
            text-align: center;
            padding: 50px;
        }
        .loader {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #034D6E;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            margin: auto;
        }
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
    </style>

</head>

<body>

    <div class="boxed_wrapper ltr">

        <?php include('header.php'); ?>

        <!--Start breadcrumb area-->
        <section class="breadcrumb-area" style="background-image: url(assets/images/breadcrumb/breadcrumb-7.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content text-center">
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

        <!--Book List Area-->
        <section class="causes-gallery-area" style="padding-top: 50px;">
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
                                    $classQuery = mysqli_query($con, "SELECT DISTINCT class FROM book_lists WHERE status = 'active' ORDER BY class");
                                    while ($classRow = mysqli_fetch_assoc($classQuery)) {
                                        echo '<option value="' . htmlspecialchars($classRow['class']) . '">' . htmlspecialchars($classRow['class']) . '</option>';
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
                                    $authorQuery = mysqli_query($con, "SELECT DISTINCT author FROM book_lists WHERE status = 'active' ORDER BY author");
                                    while ($authorRow = mysqli_fetch_assoc($authorQuery)) {
                                        echo '<option value="' . htmlspecialchars($authorRow['author']) . '">' . htmlspecialchars($authorRow['author']) . '</option>';
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
                                <th scope="col" width="35%" data-sort="book_name">Book Name <i class="fa fa-sort sort-icon"></i></th>
                                <th scope="col" width="25%" data-sort="author">Author <i class="fa fa-sort sort-icon"></i></th>
                                <th scope="col" width="15%" data-sort="class">Class <i class="fa fa-sort sort-icon"></i></th>
                                <th scope="col" width="20%">ISBN No.</th>
                            </tr>
                        </thead>
                        <tbody id="bookTableBody">
                            <!-- Book rows will be inserted here by JavaScript -->
                        </tbody>
                    </table>
                    
                    <!-- Loader -->
                    <div class="loader-container" id="loader">
                        <div class="loader"></div>
                        <p>Loading Books...</p>
                    </div>

                    <!-- No results message -->
                    <div id="noResults" class="no-results" style="display: none;">
                        <h5>No books match your search criteria</h5>
                        <p>Try adjusting your filters or search term</p>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination-container" id="pagination"></div>
            </div>
        </section>
        <!--End Book List Area-->

        <?php include('footer.php'); ?>

        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-angle-up"></span>
        </button>

    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Add other necessary JS files here if needed -->
    
    <script>
        $(document).ready(function() {
            let currentPage = 1;
            let currentSort = 'class';
            let currentSortDir = 'asc';
            let searchTimeout;

            function loadBooks() {
                $('#loader').show();
                $('#bookTable').hide();
                $('#noResults').hide();

                const params = {
                    page: currentPage,
                    class: $('#classFilter').val(),
                    author: $('#authorFilter').val(),
                    search: $('#searchInput').val(),
                    sort_by: currentSort,
                    sort_dir: currentSortDir
                };

                $.ajax({
                    url: 'fetch_books.php',
                    type: 'GET',
                    data: params,
                    dataType: 'json',
                    success: function(response) {
                        $('#loader').hide();
                        const tableBody = $('#bookTableBody');
                        tableBody.empty();

                        if (response.books && response.books.length > 0) {
                            $('#bookTable').show();
                            let index = (response.pagination.current_page - 1) * 50 + 1;
                            response.books.forEach(function(book) {
                                const row = `<tr>
                                    <th scope="row">${index++}</th>
                                    <td>${book.book_name}</td>
                                    <td>${book.author}</td>
                                    <td><span class="class-badge">${book.class}</span></td>
                                    <td>${book.isbn}</td>
                                </tr>`;
                                tableBody.append(row);
                            });
                        } else {
                            $('#noResults').show();
                        }

                        updateBookCount(response.pagination);
                        updatePagination(response.pagination);
                        updateSortIcons();
                    },
                    error: function() {
                        $('#loader').hide();
                        $('#noResults').show().find('h5').text('An error occurred while fetching data.');
                    }
                });
            }

            function updateBookCount(pagination) {
                if (pagination.total_records > 0) {
                    $('#bookCount').text(`Showing ${((pagination.current_page - 1) * 50) + 1} - ${Math.min(pagination.current_page * 50, pagination.total_records)} of ${pagination.total_records} books`);
                } else {
                    $('#bookCount').text('No books found');
                }
            }

            function updatePagination(pagination) {
                const paginationContainer = $('#pagination');
                paginationContainer.empty();
                if (pagination.total_pages <= 1) return;

                let paginationHTML = '<ul class="pagination">';
                
                // Previous button
                paginationHTML += `<li class="page-item ${pagination.current_page === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${pagination.current_page - 1}">Previous</a></li>`;

                // Page numbers
                for (let i = 1; i <= pagination.total_pages; i++) {
                    paginationHTML += `<li class="page-item ${i === pagination.current_page ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
                }

                // Next button
                paginationHTML += `<li class="page-item ${pagination.current_page === pagination.total_pages ? 'disabled' : ''}">
                    <a class="page-link" href="#" data-page="${pagination.current_page + 1}">Next</a></li>`;

                paginationHTML += '</ul>';
                paginationContainer.html(paginationHTML);
            }
            
            function updateSortIcons() {
                $('.sort-icon').removeClass('fa-sort-asc fa-sort-desc').addClass('fa-sort');
                $(`th[data-sort='${currentSort}'] .sort-icon`)
                    .removeClass('fa-sort')
                    .addClass(currentSortDir === 'asc' ? 'fa-sort-asc' : 'fa-sort-desc');
            }

            // --- Event Handlers ---

            $('#classFilter, #authorFilter').on('change', function() {
                currentPage = 1;
                loadBooks();
            });

            $('#searchInput').on('keyup', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(function() {
                    currentPage = 1;
                    loadBooks();
                }, 300); // Debounce for 300ms
            });

            $('#resetFilters').on('click', function() {
                $('#classFilter, #authorFilter, #searchInput').val('');
                currentPage = 1;
                loadBooks();
            });

            $('#pagination').on('click', '.page-link', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                if (page) {
                    currentPage = page;
                    loadBooks();
                }
            });
            
            $('.book-table thead').on('click', 'th[data-sort]', function() {
                const newSort = $(this).data('sort');
                if (newSort === currentSort) {
                    currentSortDir = currentSortDir === 'asc' ? 'desc' : 'asc';
                } else {
                    currentSort = newSort;
                    currentSortDir = 'asc';
                }
                currentPage = 1;
                loadBooks();
            });

            // Initial load
            loadBooks();
        });
    </script>

</body>
</html>
