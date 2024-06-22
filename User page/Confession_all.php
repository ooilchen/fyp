<?php
  session_start();
  $user_id= $_SESSION['user_id'];
  
  include 'conn.php';

  if(isset($_GET['id'])) {
      $rawId = $_GET['id']; 
  } else {
      echo '<p>No category ID provided</p>';
  }
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
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../User page/assets/img/person-2.jpg" rel="apple-touch-icon">

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include 'header.php';?>
  <!-- End Header -->

    <main id="main">
      <div data-aos="fade-up">

      <h2 class="ms-4">All confession</h2>
        <div id="content-container" class="content-container"></div>
      </div>

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
              © Copyright <strong><span>Unimas Confession 23/24</span></strong>. All Rights Reserved
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

  

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('fetch_all.php') 
            .then(response => response.json())
            .then(contentArray => {
                if (!Array.isArray(contentArray)) {
                    throw new TypeError('Fetched content is not an array');
                }

                const contentContainer = document.getElementById('content-container');
                contentContainer.innerHTML = ''; // Clear existing content

                contentArray.forEach(content => {
                    const contentCard = document.createElement('div');
                    contentCard.classList.add('content');

                    contentCard.innerHTML = `
                        <div class="card mb-3">
                            <div class="card-body">
                                <a href="single-post.php?id=${content.content_id}" style="text-decoration: none; color: inherit;">
                                    <p>${content.content}</p>
                                    <p><small>${content.date_created} #${content.category_name}</small></p>
                                    ${content.image ? `<img src="${content.image}" alt="Content Image" class="img-fluid">` : ''}
                                </a>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-like ${content.is_liked ? 'liked' : ''}" data-id="${content.content_id}">
                                    ${content.is_liked ? 'Unlike' : 'Like'} 
                                    <i class="fas fa-thumbs-${content.is_liked ? 'down' : 'up'}"></i> 
                                    <span class="like-count">${content.like_count || 0}</span>
                                </button>
                                <button class="btn btn-comment" data-id="${content.content_id}">Comment <i class="fas fa-comment"></i></button>
                            </div>
                        </div>
                    `;

                    contentContainer.appendChild(contentCard);
                });

                attachEventListeners();
            })
            .catch(error => {
                console.error('Error fetching content:', error);
            });

        function attachEventListeners() {
            const likeButtons = document.querySelectorAll('.btn-like');

            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const contentId = this.getAttribute('data-id');
                    const likeCountSpan = this.querySelector('.like-count');
                    const isLiked = this.classList.contains('liked'); 

                    const endpoint = isLiked ? 'post_unlike.php' : 'post_like.php'; // 
                    fetch(endpoint, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ content_id: contentId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            likeCountSpan.textContent = data.new_like_count;
                            this.classList.toggle('liked'); 
                            this.innerHTML = `${this.classList.contains('liked') ? 'Unlike' : 'Like'} <i class="fas fa-thumbs-${this.classList.contains('liked') ? 'down' : 'up'}"></i> <span class="like-count">${data.new_like_count}</span>`;
                        } else if (data.message === 'User not logged in') {
                            // Notify user to log in
                            $.notify({
                                message: 'Please log in to like this post.'
                            },{
                                type: 'primary',
                                delay: 2000,
                                placement: {
                                    from: "top",
                                    align: "center"
                                }
                            });
                        } else {
                            console.error('Error liking the post:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        }
    });

  </script>


</body>

</html>