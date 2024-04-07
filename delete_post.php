<?php
include "./db/connections.php";

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Delete all replies associated with the post
    $delete_replies_query = "DELETE FROM scpel_forum_replies WHERE FORUM_ID = ?";
    $stmt = $db->prepare($delete_replies_query);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();

    // Delete the post itself
    $delete_post_query = "DELETE FROM scpel_forum WHERE ID = ?";
    $stmt = $db->prepare($delete_post_query);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();

    // Redirect back to the forum or a confirmation page
    header("Location: index.php");
} else {
    // Handle the case where no post ID is provided
    echo "No post ID provided.";
}
?>