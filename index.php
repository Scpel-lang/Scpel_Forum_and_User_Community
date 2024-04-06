<?php
session_start();

// Include necessary PHP files for database connection and authentication
include "./db/connections.php";

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Function to fetch latest discussions
function fetchLatestDiscussions($db) {
    $query = mysqli_query($db, "SELECT * FROM scpel_forum ORDER BY ID DESC");
    $discussions = [];
    while ($fetch = mysqli_fetch_assoc($query)) {
        $discussions[] = $fetch;
    }
    return $discussions;
}

// Function to fetch replies for a specific thread
function fetchReplies($db, $threadID) {
    $query = mysqli_query($db, "SELECT * FROM scpel_forum_replies WHERE FORUM_ID='$threadID'");
    $replies = [];
    while ($fetch = mysqli_fetch_assoc($query)) {
        $replies[] = $fetch;
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

// Check for database connection errors
if (!$db) {
    $error = "Error connecting to the database: " . mysqli_connect_error();
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

<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Scpel</span>
        </a>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li><a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="max-w-screen-xl items-center h-[100vh] justify-between mx-auto">
    <div class="flex">
        <!-- Side Panel (left div) -->
        <div class="w-1/5 flex flex-col p-2">
            <div class="w-full h-80">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Discussions</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <?php foreach(fetchLatestDiscussions($db) as $discussion): ?>
                            <li class="py-1 hover:bg-gray-100 cursor-pointer">
                                <a href="?thread=<?php echo $discussion['ID']; ?>" class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo urlencode($discussion['USER_NAME']); ?>&background=random" alt="User Image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white"><?php echo $discussion['SUBJECT']; ?></p>
                                        <div class="mt-2 flex justify-between w-full pl-2 pr-2">
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">by <?php echo $discussion['USER_NAME']; ?></p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">1 day ago</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content (right div) -->
        <div class="flex-1 h-full items-center justify-center relative">
            <a href="create_thread.php" class="text-blue-400 hover:underline">Create a thread</a>
            <div class="m-auto ml-4 h-screen pb-20 text-justify">
                <?php if(isset($_GET['thread'])): ?>
                    <div class="border border-4 mb-4 border-gray-500">
                        <div class="h-10 flex justify-between w-full bg-gray-200">
                            <p class="m-2"><?php echo $thread['SUBJECT']; ?></p>
                            <p class="m-2">5 hours ago</p>
                        </div>
                        <div class="flex  w-full">
                            <div class="p-4 w-60 bg-gray-100">
                                <div class="w-full">
                                    <h1><?php echo $thread['USER_NAME']; ?></h1>
                                    <div class="">
                                        <img class="" src="https://ui-avatars.com/api/?name=<?php echo urlencode($thread['USER_NAME']); ?>&background=random">
                                    </div>
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
                    <?php foreach($replies as $reply): ?>
                        <div class="border ml-10 border-4 mb-4 border-gray-500">
                            <div class="h-10 flex justify-between w-full bg-gray-200">
                                <p class="m-2">RE: <?php echo $reply['SUBJECT']; ?></p>
                                <p class="m-2">5 hours ago</p>
                            </div>
                            <div class="flex  w-full">
                                <div class="p-4 w-60 bg-gray-100">
                                    <div class="w-full">
                                        <h1><?php echo $reply['USER_NAME']; ?></h1>
                                        <div class="">
                                            <img class="" src="https://ui-avatars.com/api/?name=<?php echo urlencode($reply['USER_NAME']); ?>&background=random">
                                        </div>
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>
<?php
// Display error message if there's an error
if (isset($error)) {
    echo "<p>Error: $error</p>";
}
?>
