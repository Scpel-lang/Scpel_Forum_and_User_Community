<?php
session_start();

// Include necessary PHP files for database connection and authentication
include "./db/connections.php";

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Perform validation
    $errors = [];
    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }
    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    // If no errors, insert into database
    if (empty($errors)) {
        $username = mysqli_real_escape_string($db, $_SESSION['username']);
        $subject = mysqli_real_escape_string($db, $subject);
        $message = mysqli_real_escape_string($db, $message);

        $query = "INSERT INTO scpel_forum (USER_NAME, SUBJECT, MESSAGE) VALUES ('$username', '$subject', '$message')";
        $result = mysqli_query($db, $query);
        if ($result) {
            // Redirect to the newly created thread
            $threadID = mysqli_insert_id($db);
            header("Location: index.php?thread=$threadID");
            exit();
        } else {
            $error = "Error creating thread: " . mysqli_error($db);
        }
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
    <title>Create Thread - Scpel Forum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

<div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-semibold leading-6 text-gray-900">Create a New Thread</h3>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="px-4 py-5 bg-white sm:p-6">
            <?php if (isset($error)) : ?>
                <p class="text-red-500"><?php echo $error; ?></p>
            <?php endif; ?>
            <?php foreach ($errors as $error) : ?>
                <p class="text-red-500"><?php echo $error; ?></p>
            <?php endforeach; ?>
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" name="subject" id="subject" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" rows="5" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create Thread
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
