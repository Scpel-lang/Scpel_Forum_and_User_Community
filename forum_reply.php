<?php
session_start();

// Include database connection
include_once "./db_connection.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Function to fetch thread details
function fetchThreadDetails($db, $threadID) {
    $query = "SELECT * FROM scpel_forum WHERE ID=?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $threadID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

// Function to fetch replies for a specific thread
function fetchReplies($db, $threadID) {
    $replies = [];
    $query = "SELECT * FROM scpel_forum_replies WHERE FORUM_ID=?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $threadID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($fetch = mysqli_fetch_assoc($result)) {
        $replies[] = $fetch;
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

// Check if thread ID is provided in URL
if (isset($_GET['forum'])) {
    $threadID = $_GET['forum'];
    // Fetch thread details
    $thread = fetchThreadDetails($conn, $threadID);
    if (!$thread) {
        // Thread not found, redirect to index page
        header("Location: index.php");
        exit();
    }
    // Fetch replies for the thread
    $replies = fetchReplies($conn, $threadID);
} else {
    // If no thread ID provided, redirect to index page
    header("Location: index.php");
    exit();
}

// Reply submission
if (isset($_POST['reply'])) {
    $forumID = $_POST['forum_id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $username = $_SESSION['username'];

    // Insert reply into the database
    $inserted = insertReply($conn, $forumID, $username, $subject, $message);
    if ($inserted) {
        // Redirect to the same page to avoid form resubmission
        header("Location: forum_reply.php?forum=$forumID");
        exit();
    } else {
        // Handle error
        $error = "Failed to submit reply!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Reply - <?php echo $thread['SUBJECT']; ?></title>
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
                <h2 class="text-2xl font-semibold mb-6">Thread: <?php echo $thread['SUBJECT']; ?></h2>
                <div class="border border-4 mb-4 border-gray-500">
                    <div class="h-10 flex justify-between w-full bg-gray-200">
                        <p class="m-2"><?php echo $thread['SUBJECT']; ?></p>
                        <p class="m-2"><?php echo $thread['CREATION_DATE']; ?></p>
                    </div>
                    <div class="flex  w-full">
                        <div class="p-4 w-60 bg-gray-100">
                            <div class="w-full">
                                <h1><?php echo $thread['USER_NAME']; ?></h1>
                                <div class=""><img class="" src="https://ui-avatars.com/api/?name=<?php echo urlencode($thread['USER_NAME']); ?>&background=random"></div>
                            </div>
                            <div class="mt-20">
                                <ul>
                                    <li><a>Share Post</a></li>
                                    <li><a href="./forum_reply.php?forum=<?php echo $thread['ID']; ?>">Reply to Post</a></li>
                                    <li>Github Account</li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-full p-4 bg-white">
                            <p><?php echo $thread['MESSAGE']; ?></p>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-6">Replies</h3>
                <?php foreach ($replies as $reply): ?>
                    <div class="border ml-10 border-4 mb-4 border-gray-500">
                        <div class="h-10 flex justify-between w-full bg-gray-200">
                            <p class="m-2"><?php echo $reply['SUBJECT']; ?></p>
                            <p class="m-2"><?php echo $reply['CREATION_DATE']; ?></p>
                        </div>
                        <div class="flex  w-full">
                            <div class="p-4 w-60 bg-gray-100">
                                <div class="w-full">
                                    <h1><?php echo $reply['USER_NAME']; ?></h1>
                                    <div class=""><img class="" src="https://ui-avatars.com/api/?name=<?php echo urlencode($reply['USER_NAME']); ?>&background=random"></div>
                                </div>
                                <div class="mt-20">
                                    <ul>
                                        <li><a>Share Post</a></li>
                                        <li><a href="./forum_reply.php?forum=<?php echo $reply['ID']; ?>">Reply to Post</a></li>
                                        <li>Github Account</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="w-full p-4 bg-white">
                                <p><?php echo $reply['MESSAGE']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Reply Form -->
                <h3 class="text-xl font-semibold mb-6">Reply to Thread</h3>
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
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>
