  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../images/FB_IMG_1691993414822.jpg" alt="">
        <h1>Unimas Confession</h1>
      </a>

      <nav id="navbar" class="navbar">
      <ul>
        <?php
          include 'conn.php';

          // Fetch categories from the database
          $query =  "SELECT * FROM category WHERE status = 1";
          $result = mysqli_query($conn, $query);

          // Check if there are any categories
          if (mysqli_num_rows($result) > 0) {
              echo '<li class="dropdown"><a><span>Confession</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>';
              echo '<ul>';
              // Add the "All" option
              echo '<li><a href="all_post.php">All</a></li>';
              // Loop through each category and create a dropdown item
              while ($row = mysqli_fetch_assoc($result)) {
                  $categoryId = $row['category_id'];
                  $categoryName = $row['category_name'];
                  echo '<li><a href="confession_post.php?id=' . $categoryId . '">' . $categoryName . '</a></li>';
              }
              echo '</ul></li>';
          } else {
              echo '<p>No categories found</p>';
          }

          // Close the database connection
          mysqli_close($conn);
        ?>

        <li><a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#newPost">Add Confession</a></li>
        <!-- <li><a href="about.html">About</a></li> -->
        <li><a href="contact.html">Sign up/Sign in</a></li>
      </ul>
    </nav><!-- .navbar -->


      <div class="position-relative">

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->