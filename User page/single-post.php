<?php
include 'conn.php';
session_start();

$content_id = $_GET['id'] ;

if ($content_id > 0) {
    
    $sql = "SELECT c.*, cat.category_name 
            FROM content c 
            JOIN category cat ON c.category_id = cat.category_id 
            WHERE c.content_id = ? AND c.content_status = 1";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $content_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $date_created = $row['date_created'];
        $category_name = $row['category_name'];
        $content_title = $row['content'];
        $image = $row['image'];
        $content_text = $row['content'];

        // Extract the first character
        $first_character = mb_substr($content_text, 0, 1);
        // Remove the first character from the content text
        $content_text = mb_substr($content_text, 1);

    } else {
        echo "No content found.";
        exit;
    }

    $stmt->close();
} else {
    echo "Invalid content ID.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Unimas Confession</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- ======= Header ======= -->
  <?php include 'header.php'; ?>
  <!-- End Header -->

  <main id="main">

    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

          <!-- ======= Single Post Content ======= -->
          <div class="single-post">
              <div class="post-meta">
                  <span class="date"><?php echo htmlspecialchars($category_name); ?></span>
                  <span class="mx-1">&bullet;</span>
                  <span><?php echo htmlspecialchars($date_created); ?></span>
              </div>
              <h1 class="mb-5"></h1>
              <p><span class="firstcharacter"><?php echo htmlspecialchars($first_character); ?></span><?php echo nl2br(htmlspecialchars($content_text)); ?></p>
              <?php if ($image): ?>
                  <figure class="my-4">
                      <img src="<?php echo htmlspecialchars($image); ?>" alt="" class="img-fluid" style="width: 50%">
                      <figcaption>There is a picture here.</figcaption>
                  </figure>
              <?php endif; ?>
          </div><!-- End Single Post Content -->

          <!-- ======= Comments ======= -->
          <div class="comments">
              <h5 class="comment-title py-4">Comments</h5>
              <?php
          include 'conn.php';

          $content_id = $_GET['id'];

          $query = "SELECT c.*, u.username, u.profile_pic 
                    FROM comments c 
                    JOIN user u ON c.user_id = u.user_id 
                    WHERE c.content_id = ?";
          $stmt = $conn->prepare($query);
          $stmt->bind_param("s", $content_id);  
          $stmt->execute();
          $result = $stmt->get_result();

          while ($row = $result->fetch_assoc()) {
              $userAvatar = isset($row['profile_pic']) ? $row['profile_pic'] : 'default-avatar.jpg'; 
              $userName = $row['username'];
              $dateCommented = $row['date_commented'];
              $commentText = $row['comment_text'];

              // Output HTML for each comment
              echo '
              <div class="comment d-flex mb-4">
                  <div class="flex-shrink-0">
                      <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="' . htmlspecialchars($userAvatar) . '" alt="User Avatar">
                      </div>
                  </div>
                  <div class="flex-grow-1 ms-2 ms-sm-3">
                      <div class="comment-meta d-flex align-items-baseline">
                          <h6 class="me-2">' . htmlspecialchars($userName) . '</h6>
                          <span class="text-muted">' . htmlspecialchars($dateCommented) . '</span>
                      </div>
                      <div class="comment-body">
                          ' . htmlspecialchars($commentText) . '
                      </div>
                  </div>
              </div>';
          }

          // Close statement and connection
          $stmt->close();
          $conn->close();
          ?>

          </div><!-- End Comments -->

            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">
              <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
                <?php
                // Check if user is logged in
                if (isset($_SESSION['user_id'])) {
                ?>
                <form id="commentForm">
                  <input type="hidden" id="contentId" value="<?php echo $content_id; ?>">
                  <div class="row">
                      <div class="col-lg-12 mb-3">
                          <textarea class="form-control" id="commentMessage" placeholder="Enter your comment" cols="30" rows="5"></textarea>
                      </div>
                      <div class="col-12">
                          <button type="submit" class="btn btn-primary">Post Comment</button>
                      </div>
                  </div>
              </form>
                <?php
                } else {
                  
                  echo '<p>Please <a href="Signin.php" class="login-link">log in</a> to leave a comment.</p>';
                }
                ?>
              </div>
            </div>
            <!-- End Comments Form -->


          </div>
          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">
              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <!-- Popular -->
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                  <?php
                        include 'conn.php';

                        $sql = "SELECT content.*, category.category_name 
                                FROM content 
                                JOIN category ON content.category_id = category.category_id 
                                WHERE content.content_status = 1
                                ORDER BY content.like_count DESC 
                                LIMIT 4";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo "<div class='post-entry-1 border-bottom'>";
                            echo "<div class='post-meta'><span class='date'>" . $row['like_count'] . " liked</span> <span class='mx-1'>&bullet;</span> <span>" . $row['category_name'] . "</span></div>";
                            echo "<h2 class='mb-2'><a href='single-post.php?id=".$row['content_id']."'>" . $row['content'] . "</a></h2>";
                            echo "</div>";
                          }
                        } else {
                          echo "No trending content found.";
                        }

                        $conn->close();
                      ?>
                </div> <!-- End Popular -->

                <!-- Latest -->
                <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                  <?php
                        include 'conn.php';

                        $sql = "SELECT content.*, category.category_name 
                                FROM content 
                                JOIN category ON content.category_id = category.category_id
                                WHERE content.content_status = 1 
                                ORDER BY content.date_created DESC 
                                LIMIT 4";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo "<div class='post-entry-1 border-bottom'>";
                            echo "<div class='post-meta'><span class='date'>" . $row['date_created'] . "</span> <span class='mx-1'>&bullet;</span> <span>" . $row['category_name'] . "</span></div>";
                            echo "<h2 class='mb-2'><a href='single-post.php?id=".$row['content_id']."'>" . $row['content'] . "</a></h2>";
                            echo "</div>";
                          }
                        } else {
                          echo "No trending content found.";
                        }

                        $conn->close();
                      ?>
                </div> <!-- End Latest -->
              </div>
            </div>


            <div class="aside-block">
                <h3 class="aside-title">Categories</h3>
                  <ul class="aside-links list-unstyled">

                    <?php

                      include 'conn.php';

                      $query = "SELECT category_id, category_name FROM category WHERE status = 1";
                      $result = mysqli_query($conn, $query);
                      if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          $category_id = $row['category_id'];
                          $category_name = $row['category_name'];
                          echo '<li><a href="Confession_post.php?id=' . htmlspecialchars($category_id) . '"><i class="bi bi-chevron-right"></i> ' . htmlspecialchars($category_name) . '</a></li>';
                        }
                      } else {
                        echo "<li>No categories found.</li>";
                      }
                    ?>
                  </ul>
            </div><!-- End Categories -->

          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

      <!--Add confession modal-->
      <div class="modal" tabindex="-1" role="dialog" id="newPost">
        <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Write your confession</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-3">
                        <label>Confession</label>
                        <div class="input-group">
                           <textarea class="form-control" name="newText" id="newText" ></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="image">Upload Image(Optional)</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" multiple>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="category">Choose your confession category</label>
                        <select id="category" name="category" class="form-control">
                            <option value="">Select your confession category</option>
                            <?php
                              
                              include 'conn.php';
                              
                              $query = "SELECT * FROM `category`";
                              $result = mysqli_query($conn, $query);

                              if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                      $categoryId = $row['category_id'];
                                      $categoryName = $row['category_name'];
                                      echo '<option value="' . $categoryId . '">' . $categoryName . '</option>';
                                  }
                              } else {
                                  echo '<option value="">No categories found</option>';
                              }

                              mysqli_close($conn);
                              ?>
                        </select>
                    </div>
                </div>
                
                <div id="alertContainer" ></div>    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="new_confess" class="btn btn-primary" onclick="validateForm()">Submit</button>
                </div>
              </div>
        </div>
      </div>   
      <!--End of modal-->

      <!-- ======= Footer ======= -->
      <?php include 'footer.php'; ?>

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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-notify@latest/dist/bootstrap-notify.min.js"></script>

  <script>
   $(document).ready(function() {
    $('#commentForm').submit(function(e) {
        e.preventDefault(); 

        var contentId = $('#contentId').val();
        var commentMessage = $('#commentMessage').val();

        $.ajax({
            type: 'POST',
            url: 'comment-post.php', 
            data: {
                content_id: contentId,
                comment_text: commentMessage
            },
            success: function(response) {
                var data = JSON.parse(response);
                
                if (data.success) {
                    // Show success message
                    $.notify({
                              message: 'Comment added successfully'
                          },{
                              type: 'success',
                              delay: 2000,
                              placement: {
                                  from: "top",
                                  align: "right"
                              }
                          });

                    // Reload the page after 2 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                    
                } else {
                    // Show error message
                    alert('Error adding comment: ' + data.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error adding comment:', error);
                alert('Error adding comment. Please try again later.');
            }
        });
    });
});

  </script>

</body>

</html>