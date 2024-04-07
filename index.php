<?php
session_start();

// Include database connection
include_once "./db_connection.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy session data
    header("Location: login.php");
    exit();
}

// Initialize error variable
$error = "";

// Function to fetch latest discussions
function fetchLatestDiscussions($db) {
    $discussions = [];
    $query = "SELECT * FROM scpel_forum ORDER BY ID DESC";
    $result = mysqli_query($db, $query);
    if ($result) {
        while ($fetch = mysqli_fetch_assoc($result)) {
            $discussions[] = $fetch;
        }
    } else {
        $error = "Error fetching discussions: " . mysqli_error($db);
    }
    return $discussions;
}

// Function to fetch replies for a specific thread
function fetchReplies($db, $threadID) {
    $replies = [];
    $query = "SELECT * FROM scpel_forum_replies WHERE FORUM_ID=?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $threadID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        while ($fetch = mysqli_fetch_assoc($result)) {
            $replies[] = $fetch;
        }
    } else {
        $error = "Error fetching replies: " . mysqli_error($db);
    }
    return $replies;
}

// Check if thread ID is provided in URL, then fetch thread and replies
if (isset($_GET['thread'])) {
    $threadID = $_GET['thread'];
    $threadQuery = mysqli_query($db, "SELECT * FROM scpel_forum WHERE ID='$threadID'");
    if ($threadQuery) {
        $thread = mysqli_fetch_assoc($threadQuery);
        $replies = fetchReplies($db, $threadID);
    } else {
        $error = "Error fetching thread: " . mysqli_error($db);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Scpel - A Systems reflective meta-programming language for AI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../docs/styles.css">
    <link rel="stylesheet" href="./sheety.css">
</head>
<body class="h-screen">

<!-- Navigation Bar -->
<?php include_once "navbar.php"; ?>

<!-- Main Content -->
<section class="max-w-screen-xl items-center h-[100vh] justify-between mx-auto">
    <div class="flex">
        <!-- Side Panel (left div) -->
        <?php include_once "sidepanel.php"; ?>

        <!-- Main Content (right div) -->
        <div class="flex-1 h-full items-center justify-center relative">
            <a href="create_thread.php" class="text-blue-400 hover:underline">Create a thread</a>
            <div class="m-auto ml-4 h-screen pb-20 text-justify">
                <?php if(isset($_GET['thread'])): ?>
                    <!-- Display Thread and Replies -->
                    <?php include_once "thread_display.php"; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>
<?php
// Display error message if there's an error
if (isset($error)) {
    echo "<p>Error: $error</p>";
}
?>
