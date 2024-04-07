<?php
session_start();

// Include database connection
include_once "./db_connection.php";

// Initialize variables
$error = "";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userName = $_SESSION['username'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate input
    if (empty($subject) || empty($message)) {
        $error = "Please fill in all fields.";
    } else {
        // Insert thread into database
        $stmt = $conn->prepare("INSERT INTO scpel_forum (USER_NAME, SUBJECT, MESSAGE) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $userName, $subject, $message);
        if ($stmt->execute()) {
            // Redirect to index.php after successful insertion
            header("Location: index.php");
            exit();
        } else {
            $error = "Error inserting thread. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Thread - A Systems reflective meta-programming language for AI</title>
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
                <h2 class="text-2xl font-semibold mb-6">Create New Thread</h2>
                <?php if (!empty($error)) : ?>
                    <p class="text-red-500 mb-4"><?php echo $error; ?></p>
                <?php endif; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-4">
                        <label for="subject" class="block text-gray-700">Subject</label>
                        <input type="text" id="subject" name="subject" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Create Thread</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>
