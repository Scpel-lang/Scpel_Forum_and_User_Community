<?php
session_start();

// Include database connection
include_once "./db_connection.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details
$username = $_SESSION['username'];
$query = "SELECT * FROM scpel_users WHERE USERNAME=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Fetch user's created threads
$query_threads = "SELECT * FROM scpel_forum WHERE USER_NAME=?";
$stmt_threads = mysqli_prepare($conn, $query_threads);
mysqli_stmt_bind_param($stmt_threads, "s", $username);
mysqli_stmt_execute($stmt_threads);
$threads_result = mysqli_stmt_get_result($stmt_threads);

// Fetch user's replies
$query_replies = "SELECT * FROM scpel_forum_replies WHERE USER_NAME=?";
$stmt_replies = mysqli_prepare($conn, $query_replies);
mysqli_stmt_bind_param($stmt_replies, "s", $username);
mysqli_stmt_execute($stmt_replies);
$replies_result = mysqli_stmt_get_result($stmt_replies);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - <?php echo $user['NAME']; ?></title>
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
                <h2 class="text-2xl font-semibold mb-6">User Profile: <?php echo $user['NAME']; ?></h2>
                <div class="mb-6">
                    <h3 class="text-xl font-semibold">User Information</h3>
                    <p>Name: <?php echo $user['NAME']; ?></p>
                    <p>Username: <?php echo $user['USERNAME']; ?></p>
                    <p>Email: <?php echo $user['EMAIL']; ?></p>
                    <p>Last Login: <?php echo $user['LAST_LOGIN']; ?></p>
                </div>
                <div class="mb-6">
                    <h3 class="text-xl font-semibold">Created Threads</h3>
                    <ul>
                        <?php while ($thread = mysqli_fetch_assoc($threads_result)): ?>
                            <li><?php echo $thread['SUBJECT']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Replies</h3>
                    <ul>
                        <?php while ($reply = mysqli_fetch_assoc($replies_result)): ?>
                            <li><?php echo $reply['SUBJECT']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>
