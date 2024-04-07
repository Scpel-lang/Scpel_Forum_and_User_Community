<?php
include "./db/connections.php"; 

if (isset($_GET['reply_id'])) {
    $reply_id = $_GET['reply_id'];

    // Prepare a delete statement
    $stmt = $db->prepare("DELETE FROM scpel_forum_replies WHERE ID = ?");
    $stmt->bind_param("i", $reply_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the forum page
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting reply.";
    }
} else {
    echo "Reply ID not provided.";
}
?>
