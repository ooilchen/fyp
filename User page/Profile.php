<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

include 'conn.php';

// Fetch user details
$user_id = $_SESSION['user_id'];
$sql_user = "SELECT username, email, profile_pic FROM user WHERE user_id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("s", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();
    $username = $user['username'];
    $email = $user['email'];
    $profile_pic = $user['profile_pic'];
} else {
    $username = "Unknown User";
    $email = "No Email";
    $profile_pic = "../images/profile-icon-design-free-vector.jpg"; 
}

$stmt_user->close();

// Fetch categories and likes
$sql = "SELECT c.category_name, SUM(co.like_count) AS total_likes
        FROM category c
        LEFT JOIN content co ON c.category_id = co.category_id
        GROUP BY c.category_id
        ORDER BY total_likes DESC";
$result = $conn->query($sql);

$categoryNames = [];
$totalLikes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoryNames[] = $row['category_name'];
        $totalLikes[] = $row['total_likes'];
    }
}

// Fetch liked posts by the user
$sql_liked_posts = "SELECT c.* FROM content c
                    INNER JOIN user_likes ul ON c.content_id = ul.content_id
                    WHERE ul.user_id = ?";
$stmt_liked_posts = $conn->prepare($sql_liked_posts);
$stmt_liked_posts->bind_param("i", $user_id);
$stmt_liked_posts->execute();
$result_liked_posts = $stmt_liked_posts->get_result();

$likedPosts = [];
if ($result_liked_posts->num_rows > 0) {
    while ($row = $result_liked_posts->fetch_assoc()) {
        $likedPosts[] = $row;
    }
}

$stmt_liked_posts->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>User Profile - ZenBlog</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php'; ?>
    <main id="main">
    <section id="profile" class="profile-section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="profile-info">
                    <div class="text-center">
                        <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="Profile Picture" class="profile-picture">
                        <h2><?php echo htmlspecialchars($username); ?></h2>
                        <p>Email: <?php echo htmlspecialchars($email); ?></p>
                        <!-- Upload Profile Picture Form -->
                        <form action="upload_profile.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center" onsubmit="return validateForm()">
                            <div class="upload-btn-wrapper mb-3">
                                <button class="btn-upload">Upload Photo</button>
                                <input type="file" name="profile_photo" id="profile_photo" class="file-input" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <p id="error-msg" class="text-danger mt-2"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






        <!-- Liked Posts Section -->
        <section id="liked-posts" class="post-container">
            <div class="container" data-aos="fade-up">
                <h2 class="text-center mb-4">Liked Posts</h2>
                <div class="row">
                    <?php foreach ($likedPosts as $post) : ?>
                        <div class="col-md-4">
                            <div class="post">
                                <?php if (!empty($post['image'])) : ?>
                                    <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image" class="post-image">
                                <?php endif; ?>
                                <p><?php echo htmlspecialchars($post['content']); ?></p>
                                <small>Likes: <?php echo htmlspecialchars($post['like_count']); ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-legal">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <div class="copyright">
                            © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function validateForm() {
        var fileInput = document.getElementById('profile_photo');
        var errorMsg = document.getElementById('error-msg');
        
        // Check if no file is selected
        if (fileInput.files.length === 0) {
            errorMsg.textContent = "Please select an image.";
            return false; // Prevent form submission
        } else {
            errorMsg.textContent = ""; // Clear any previous error message
            return true; // Allow form submission
        }
    }
</script>

</body>
</html>
