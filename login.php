<?php
session_start();

// Include database connection
include_once "./db_connection.php";

// Check if the user is already logged in, redirect to home page if so
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input (you should add more robust validation)
    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password";
    } else {
        // Prepare and execute SQL query to fetch user from database
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists and password is correct
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables and redirect to home page
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid username or password";
            }
        } else {
            $error = "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-semibold mb-6">Login</h2>
                <?php if (isset($error)): ?>
                    <p class="text-red-500 mb-4"><?php echo $error; ?></p>
                <?php endif; ?>
                <form method="post">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700">Username</label>
                        <input type="text" id="username" name="username" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
