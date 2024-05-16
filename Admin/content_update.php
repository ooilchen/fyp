<?php
    
    include 'conn.php';

    
    if(isset($_POST['content_ids'])) {
        
        // Loop through each selected content ID
        foreach($_POST['content_ids'] as $contentId) {
            
            $sql = "UPDATE `content` SET `content_status` = '1' WHERE `content_id` = '$contentId'";
            
            // Execute the SQL statement
            if ($conn->query($sql) === TRUE) {
                echo "Content ID $contentId approved successfully";
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
