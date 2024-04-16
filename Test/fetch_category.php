<?php

include('conn.php');

// Query to fetch categories from the database
$query = "SELECT * FROM `category`";
$result = mysqli_query($conn, $query);

// Check if query was successful
if ($result) {
    $category = array();

    while ($row = mysqli_fetch_assoc($result)) {

        $cat_id = $row['category_id'];
        $cat_name = $row['category_name'];

        $category[] = array(
            'cat_id' => $cat_id,
            'cat_name' => $cat_name
        );
    }
    // Send categories as JSON response
    echo json_encode($category);
} else {
    // Handle query error
    echo json_encode(array('error' => 'Failed to fetch categories'));
}

// Close database connection
mysqli_close($conn);
?>
