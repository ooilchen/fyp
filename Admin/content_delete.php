<?php
    
    include 'conn.php';

    
    if(isset($_POST['content_ids'])) {
        
        // Loop through each selected content ID
        foreach($_POST['content_ids'] as $contentId) {
            // Prepare the SQL statement to update the content_status for each ID
            $sql = "DELETE FROM `content` WHERE  `content_id` = '$contentId'";
            
            // Execute the SQL statement
            if ($conn->query($sql) === TRUE) {
                echo "Content ID $contentId delete successfully";
            } else {
                echo "Error approving content ID $contentId: " . $conn->error;
            }
        }
    } else {
        echo "Invalid content IDs";
    }

    // Close connection
    $conn->close();
?>