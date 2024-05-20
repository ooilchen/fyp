<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UC - Home</title>
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

</head>

<body>

<?php include 'header.php';?>

    <main id="main">

      <!-- ======= Hero Slider Section ======= -->
      <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
          <div class="row">
            <div class="col-12">
              <div class="swiper sliderFeaturedPosts">
                <div class="swiper-wrapper">
                  <?php
                    include 'conn.php';

                    $sql = "SELECT * FROM home_image"; 
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // Output data of each row
                      while ($row = $result->fetch_assoc()) {
                        echo "<div class='swiper-slide'>";
                        echo "<a class='img-bg d-flex align-items-end' style='background-image: url(" . $row["image_path"] . ");'></a>";
                        echo "</div>";
                      }
                    } else {
                      echo "No images found in the database.";
                    }

                    // Fetch the announcement data
                    $sql = "SELECT `announce_id`, `announcement`, `announcement_img`, `date_announce` FROM `admin_annnouncement` WHERE 1 LIMIT 1";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $announcement = $row['announcement'];
                        $announcement_img = $row['announcement_img'];
                        $date_announce = $row['date_announce'];
                    } else {
                        // Default values if no data is found
                        $announcement = "No announcements found.";
                        $announcement_img = "default.jpg"; 
                        $date_announce = "";
                    }

                    $conn->close();
                  ?>
                </div>
                <div class="custom-swiper-button-next">
                  <span class="bi-chevron-right"></span>
                </div>
                <div class="custom-swiper-button-prev">
                  <span class="bi-chevron-left"></span>
                </div>

                <div class="swiper-pagination"></div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Hero Slider Section -->

      <!-- ======= Announcement by admin Section ======= -->
      <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
          <div class="row g-5">
            <div class="col-lg-4">
              <div class="post-entry-1 lg">
                <a ><img src="<?php echo htmlspecialchars($announcement_img); ?>" alt="" class="img-fluid"></a>
                <div class="post-meta">  <span>Updated on <?php echo htmlspecialchars($date_announce); ?></span></div>
                <h2><a >Announcement by admin</a></h2>
                <p class="mb-4 d-block"><?php echo htmlspecialchars($announcement); ?></p>

                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="<?php echo htmlspecialchars($announcement_img); ?>" alt="Default image" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">-Admin-</h3>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-8">
              <div class="row g-5">
                <div class="col-lg-4 border-start custom-border">
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
                  </div>
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Food</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
                    <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                  </div>
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Design</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                    <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting Places On the Web?</a></h2>
                  </div>
                </div>
                <div class="col-lg-4 border-start custom-border">
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
                  </div>
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Tech</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                    <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                  </div>
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Travel</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                  </div>
                </div>

                <!-- Latest Section -->
                <div class="col-lg-4">

                  <div class="trending">
                    <h3>Latest</h3>
                    <ul class="trending-post">
                      <?php
                        include 'conn.php';

                        // Execute SQL query to fetch latest content
                        $sql = "SELECT `content_id`, `date_created`, `category_id`, `content`, `content_status`, `image`
                                FROM `content`
                                WHERE `content_status` = 1
                                ORDER BY `date_created` DESC
                                LIMIT 5";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          // Output data of each row
                          while ($row = $result->fetch_assoc()) {
                            echo "<li>";
                            echo "<a href='single-post.html'>";
                            echo "<span class='number'>" . $row['content_id'] . "</span>";
                            echo "<h3>" . $row['content'] . "</h3>";
                            // Add more elements to display as needed
                            echo "</a>";
                            echo "</li>";
                          }
                        } else {
                          echo "No trending content found.";
                        }

                        $conn->close();
                      ?>
                    </ul>
                  </div>

                </div> <!-- End Trending Section -->
              </div>
            </div>

          </div> <!-- End .row -->
        </div>
      </section> <!-- End Announcement by admin Section -->



    </main>
    <!-- End #main -->

    <!--Add confession modal-->
    <div class="modal" tabindex="-1" role="dialog" id="newPost">
        <div class="modal-dialog modal-xl" role="document">
            <!-- <form method = 'POST' enctype='multipart/form-data' action="test_addConfession.php"> -->
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
            <!-- </form> -->
        </div>
    </div>   
    <!--End of modal-->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-legal">
      <!-- <div class="container"> -->

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
            </div>
          </div>
        </div>

      <!-- </div> -->
    </div>

  </footer>

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

  <!-- Bootstrap Notify -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-notify@latest/dist/bootstrap-notify.min.js"></script>



</body>

</html>