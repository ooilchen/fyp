<?php
  session_start();
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
    <div data-aos="fade-up">
      <h2 class="ms-4"><?php echo $rawId ?></h2>
      <div id="content-container" class="content-container"></div>
    </div>
  </main>

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

  <footer id="footer" class="footer">
    <div class="footer-legal">
      <div class="row justify-content-between">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <div class="copyright">
            © Copyright <strong><span>Unimas Confession 23/24</span></strong>. All Rights Reserved
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/plugins/notify.js"></script>

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
  document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const categoryId = urlParams.get('id');

    if (categoryId) {
        fetch(`fetch_content.php?id=${categoryId}`)
            .then(response => response.json())
            .then(contentArray => {
                const contentContainer = document.getElementById('content-container');
                contentContainer.innerHTML = ''; // Clear existing content

                contentArray.forEach(content => {
                    const contentCard = document.createElement('div');
                    contentCard.classList.add('content');

                    contentCard.innerHTML = `
                            <div class="card-body">
                              <a href="single-post.php?id=${content.content_id}" style="text-decoration: none; color: inherit;">
                                <p>${content.content}</p>
                                <p><small>${content.date_created} #${content.category_name}</small></p>
                                ${content.image ? `<img src="${content.image}" alt="Content Image" class="img-fluid">` : ''}
                              </a>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-like" data-id="${content.content_id}">Like <i class="fas fa-thumbs-up"></i></button>
                                <button class="btn btn-comment" data-id="${content.content_id}">Comment <i class="fas fa-comment"></i></button>
                            </div>
                    `;

                    contentContainer.appendChild(contentCard);
                });

                attachEventListeners();
            })
            .catch(error => {
                console.error('Error fetching content:', error);
            });
    } else {
        console.error('No category ID provided');
    }

    function attachEventListeners() {
        // Select all like buttons
        const likeButtons = document.querySelectorAll('.btn-like');

        // Check if any like buttons are found
        console.log('Like buttons found:', likeButtons.length);

        likeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('data-id');
                
                // Debugging statement to check the postId
                console.log('Like button clicked, postId:', postId);

                // Check if user is logged in
                const isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
                if (!isLoggedIn) {
                    //alert('Please log in to like posts.');
                    alertUser('top','right');
                }

                fetch('like_post.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ postId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Post liked successfully!');
                    } else {
                        alert('Error liking post.');
                    }
                })
                .catch(error => {
                    console.error('Error liking post:', error);
                });
            });
        });

        // Select all comment buttons
        const commentButtons = document.querySelectorAll('.btn-comment');
        commentButtons.forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('data-id');
                window.location.href = `single-post.php?id=${postId}#comments`;
            });
        });
    }
  });

  function alertUser(from, align){

$.notify({
    icon: "add_alert",
    message: "Please log in to interact with others"

},{
    type: 'warning',
    timer: 4000,
    placement: {
        from: from,
        align: align
    }
});
}
  </script>
</body>
</html>
