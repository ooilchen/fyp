
<?php
session_start();

// Ensure user is logged in, redirect if not
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php"); 
    exit();
}

include 'conn.php';

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
$user_id = $_SESSION['user_id'];
$sql_liked_posts = "SELECT c.*
                    FROM content c
                    INNER JOIN user_likes ul ON c.content_id = ul.content_id
                    WHERE ul.user_id = $user_id";
$result_liked_posts = $conn->query($sql_liked_posts);

$likedPosts = [];
if ($result_liked_posts->num_rows > 0) {
    while ($row = $result_liked_posts->fetch_assoc()) {
        $likedPosts[] = $row;
    }
}

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

    <!-- Favicons -->
    <!-- <link href="../assets/img/favicon.png" rel="icon">
    <link href="../User page/assets/img/person-2.jpg" rel="apple-touch-icon"> -->

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

    <!-- Custom Styles -->
    <style>
        .profile-section {
            padding: 80px 0;
        }

        .profile-info {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .profile-picture {
            max-width: 200px;
            height: auto;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn-upload {
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            padding: 8px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-upload:hover {
            background-color: #0056b3;
        }

        .file-input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }

        .post-container {
            margin-top: 30px;
        }

        .post {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .post img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
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
                                <!-- Add more profile details as needed -->

                                <!-- Upload Profile Picture Form -->
                                <div class="upload-btn-wrapper">
                                    <button class="btn-upload">Upload Photo</button>
                                    <input type="file" name="profile_photo" class="file-input">
                                </div>
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
                <?php foreach ($likedPosts as $post) : ?>
                    <div class="post">
                        <?php if (!empty($post['image'])) : ?>
                            <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image">
                        <?php endif; ?>
                        <p><?php echo htmlspecialchars($post['content']); ?></p>
                        <small>Likes: <?php echo htmlspecialchars($post['like_count']); ?></small>
                    </div>
                <?php endforeach; ?>
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

</body>

</html>
