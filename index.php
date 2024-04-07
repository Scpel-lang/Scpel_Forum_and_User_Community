<?php
// Include database configuration file
require_once "./db/config.php";

// Function to sanitize input data
function sanitizeInput($input) {
    // Remove leading and trailing whitespaces
    $input = trim($input);
    // Remove HTML and PHP tags
    $input = strip_tags($input);
    // Escape special characters to prevent SQL injection
    global $db;
    $input = mysqli_real_escape_string($db, $input);
    return $input;
}

// Function to validate page number
function validatePageNumber($page) {
    // Ensure page number is numeric and greater than zero
    return is_numeric($page) && $page > 0;
}

// Function to validate discussion ID
function validateDiscussionID($id) {
    // Ensure discussion ID is numeric and greater than zero
    return is_numeric($id) && $id > 0;
}

// Pagination configuration
$results_per_page = 10; // Number of discussions per page

// Get current page number from URL, or set it to 1 if not provided or invalid
$current_page = isset($_GET['page']) ? sanitizeInput($_GET['page']) : 1;
if (!validatePageNumber($current_page)) {
    $current_page = 1;
}

// Calculate the SQL LIMIT starting point for the current page
$start_from = ($current_page - 1) * $results_per_page;

// Fetch discussions from the database with pagination
$query = $db->query("SELECT * FROM scpel_forum ORDER BY ID DESC LIMIT $start_from, $results_per_page");

// Error handling for database query
if (!$query) {
    echo "Error: " . $db->error;
    exit();
}
?>

<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Welcome to Scpel - A Systems reflective meta-programming language for AI</title>
    <!-- Include Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../docs/styles.css"/>
    <link rel="stylesheet" href="./sheety.css"/>
</head>

<body class="h-screen">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Scpel</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                       aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="latest-discussions">
    <h2>Latest Discussions</h2>
    <ul>
        <?php while ($row = $query->fetch_assoc()): ?>
            <li>
                <a href="view_discussion.php?id=<?php echo $row['ID']; ?>">
                    <?php echo htmlspecialchars($row['SUBJECT']); ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

<!-- Pagination links -->
<div class="pagination">
    <?php
    // Calculate total number of pages
    $total_pages_query = $db->query("SELECT COUNT(*) AS total FROM scpel_forum");
    $total_rows = $total_pages_query->fetch_assoc()['total'];
    $total_pages = ceil($total_rows / $results_per_page);

    // Display pagination links
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $current_page) ? "active" : "";
        echo "<a href='?page=$i' class='$active'>" . htmlspecialchars($i) . "</a> ";
    }
    ?>
</div>

<section class="max-w-screen-xl items-center h-[100vh] justify-between mx-auto">
    <div class="flex">
        <!-- Side Panel (left div) -->
        <div class="w-1/5 flex flex-col p-2">
            <!-- Content for the left panel -->
        </div>

        <!-- Main Content (right div) -->
        <div class="flex-1 h-full items-center justify-center relative">
            <a href="forum_reply.php" class="text-blue-400 hover:underline">Create a thread</a>
            <div class="m-auto ml-4 h-screen pb-20 text-justify">
                <!-- Display individual discussion and its replies -->
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>
