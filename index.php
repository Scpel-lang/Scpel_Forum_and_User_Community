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
    header("Location: login.php"); // Redirect to login page after logout
    exit();
}

// Function to fetch latest discussions
function fetchLatestDiscussions($db) {
    $discussions = [];
    $query = "SELECT * FROM scpel_forum ORDER BY ID DESC";
    $result = mysqli_query($db, $query);
    if ($result) {
        while ($fetch = mysqli_fetch_assoc($result)) {
            $discussions[] = $fetch;
        }
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
    }
    return $replies;
}

// Function to insert reply into the database
function insertReply($db, $forumID, $username, $subject, $message) {
    $query = "INSERT INTO scpel_forum_replies (FORUM_ID, USER_NAME, SUBJECT, MESSAGE) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "isss", $forumID, $username, $subject, $message);
    mysqli_stmt_execute($stmt);
    return $stmt;
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

<section class="max-w-screen-xl items-center h-[100vh] justify-between mx-auto">
    <div class="flex">
        <!-- Side Panel (left div) -->
        <?php include_once "sidepanel.php"; ?>

        <!-- Main Content (right div) -->
        <div class="flex-1 h-full items-center justify-center relative">
            <div class="m-auto ml-4 h-screen pb-20 text-justify">
                <h2 class="text-2xl font-semibold mb-6">Latest Threads</h2>
                <?php
                $discussions = fetchLatestDiscussions($conn);
                foreach ($discussions as $discussion) {
                    echo '<div class="border border-4 mb-4 border-gray-500">';
                    echo '<div class="h-10 flex justify-between w-full bg-gray-200">';
                    echo '<p class="m-2">' . $discussion['SUBJECT'] . '</p>';
                    echo '<p class="m-2">' . $discussion['CREATION_DATE'] . '</p>';
                    echo '</div>';
                    echo '<div class="flex  w-full">';
                    echo '<div class="p-4 w-60 bg-gray-100">';
                    echo '<div class="w-full">';
                    echo '<h1>' . $discussion['USER_NAME'] . '</h1>';
                    echo '<div class=""><img class="" src="https://ui-avatars.com/api/?name=' . urlencode($discussion['USER_NAME']) . '&background=random"></div>';
                    echo '</div>';
                    echo '<div class="mt-20">';
                    echo '<ul>';
                    echo '<li><a>Share Post</a></li>';
                    echo '<li><a href="./forum_reply.php?forum=' . $discussion['ID'] . '">Reply to Post</a></li>';
                    echo '<li>Github Account</li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="w-full p-4 bg-white">';
                    echo '<p>' . $discussion['MESSAGE'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    // Fetch and display replies for this thread
                    $replies = fetchReplies($conn, $discussion['ID']);
                    foreach ($replies as $reply) {
                        echo '<div class="border ml-10 border-4 mb-4 border-gray-500">';
                        echo '<div class="h-10 flex justify-between w-full bg-gray-200">';
                        echo '<p class="m-2">RE: ' . $reply['SUBJECT'] . '</p>';
                        echo '<p class="m-2">' . $reply['CREATION_DATE'] . '</p>';
                        echo '</div>';
                        echo '<div class="flex  w-full">';
                        echo '<div class="p-4 w-60 bg-gray-100">';
                        echo '<div class="w-full">';
                        echo '<h1>' . $reply['USER_NAME'] . '</h1>';
                        echo '<div class=""><img class="" src="https://ui-avatars.com/api/?name=' . urlencode($reply['USER_NAME']) . '&background=random"></div>';
                        echo '</div>';
                        echo '<div class="mt-20">';
                        echo '<ul>';
                        echo '<li><a>Share Post</a></li>';
                        echo '<li><a href="./forum_reply.php?forum=' . $reply['ID'] . '">Reply to Post</a></li>';
                        echo '<li>Github Account</li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="w-full p-4 bg-white">';
                        echo '<p>' . $reply['MESSAGE'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Reply Form -->
<section class="max-w-screen-xl items-center h-[100vh] justify-between mx-auto">
    <div class="flex">
        <div class="m-auto ml-4 h-screen pb-20 text-justify">
            <h2 class="text-2xl font-semibold mb-6">Reply to Thread</h2>
            <form action="" method="post">
                <input type="hidden" name="forum_id" value="<?php echo $_GET['forum']; ?>">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                        Subject
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subject" type="text" placeholder="Enter Subject" name="subject" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                        Message
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Enter Message" name="message" required></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="reply">
                        Reply
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>

<?php
// Reply submission
if (isset($_POST['reply'])) {
    $forumID = $_POST['forum_id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $username = $_SESSION['username'];

    // Insert reply into the database
    $inserted = insertReply($conn, $forumID, $username, $subject, $message);
    if ($inserted) {
        echo '<script>alert("Reply submitted successfully!");</script>';
        // Redirect to the same page to avoid form resubmission
        echo '<script>window.location.href = "./index.php";</script>';
    } else {
        echo '<script>alert("Failed to submit reply!");</script>';
    }
}
?>
