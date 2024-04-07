<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-5">
    <?php
include "./db/connections.php";

if (isset($_GET['reply_id'])) {
    $reply_id = $_GET['reply_id'];
    $query = mysqli_query($db, "SELECT * FROM scpel_forum_replies WHERE ID = '$reply_id'");
    $reply = mysqli_fetch_assoc($query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $query = mysqli_query($db, "UPDATE scpel_forum_replies SET SUBJECT = '$subject', MESSAGE = '$message' WHERE ID = '$reply_id'");
    header("Location: index.php"); // Redirect back to the forum page
}
?>
        <form action="" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                    Subject
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subject" type="text" name="subject" value="<?php echo isset($reply) ? htmlspecialchars($reply['SUBJECT']) : ''; ?>">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    Message
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" name="message"><?php echo isset($reply) ? htmlspecialchars($reply['MESSAGE']) : ''; ?></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update Reply
                </button>
            </div>
        </form>
    </div>
</body>
</html>
