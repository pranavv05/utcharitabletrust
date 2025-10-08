<?php
require('./config.php');

// Set the number of records to display per page
$records_per_page = 50;

// Get the current page number from the request, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Base query
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM book_lists WHERE status = 'active'";
$params = [];
$types = '';

// --- Filtering ---
// Filter by class
if (!empty($_GET['class'])) {
    $sql .= " AND class = ?";
    $params[] = $_GET['class'];
    $types .= 's';
}

// Filter by author
if (!empty($_GET['author'])) {
    $sql .= " AND author = ?";
    $params[] = $_GET['author'];
    $types .= 's';
}

// Filter by search term
if (!empty($_GET['search'])) {
    $searchTerm = '%' . $_GET['search'] . '%';
    $sql .= " AND (book_name LIKE ? OR author LIKE ? OR class LIKE ? OR isbn LIKE ?)";
    // Add the search term for each placeholder
    for ($i = 0; $i < 4; $i++) {
        $params[] = $searchTerm;
        $types .= 's';
    }
}

// --- Sorting ---
$orderBy = 'class, book_name'; // Default sort
if (!empty($_GET['sort_by'])) {
    // Whitelist allowed sort columns to prevent SQL injection
    $allowed_sorts = ['book_name', 'author', 'class'];
    if (in_array($_GET['sort_by'], $allowed_sorts)) {
        $direction = isset($_GET['sort_dir']) && strtolower($_GET['sort_dir']) === 'desc' ? 'DESC' : 'ASC';
        $orderBy = $_GET['sort_by'] . ' ' . $direction;
    }
}
$sql .= " ORDER BY $orderBy";

// --- Pagination ---
$sql .= " LIMIT ? OFFSET ?";
$params[] = $records_per_page;
$params[] = $offset;
$types .= 'ii';

// --- Execute Query ---
$stmt = mysqli_prepare($con, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Get total number of records found (for pagination)
    $total_records_query = mysqli_query($con, "SELECT FOUND_ROWS()");
    $total_records = mysqli_fetch_array($total_records_query)[0];
    $total_pages = ceil($total_records / $records_per_page);

    // --- Send Response ---
    header('Content-Type: application/json');
    echo json_encode([
        'books' => $books,
        'pagination' => [
            'current_page' => $page,
            'total_pages' => $total_pages,
            'total_records' => $total_records
        ]
    ]);

    mysqli_stmt_close($stmt);
} else {
    // Handle query preparation error
    header('Content-Type: application/json', true, 500);
    echo json_encode(['error' => 'Database query failed.']);
}

mysqli_close($con);
?>
