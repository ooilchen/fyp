<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="Index.php" class="logo d-flex align-items-center">
      <img src="../images/FB_IMG_1691993414822.jpg" alt="">
      <h1>Unimas Confession</h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <?php

          include 'conn.php';

          $query = "SELECT * FROM category WHERE status = 1";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
              echo '<li class="dropdown"><a><span>Confession</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>';
              echo '<ul>';
              
              echo '<li><a href="Confession_all.php">All</a></li>';
              
              while ($row = mysqli_fetch_assoc($result)) {
                  $categoryId = $row['category_id'];
                  $categoryName = $row['category_name'];
                  echo '<li><a href="Confession_post.php?id=' . $categoryId . '">' . $categoryName . '</a></li>';
              }
              echo '</ul></li>';
          } else {
              echo '<p>No categories found</p>';
          }

          
          mysqli_close($conn);
        ?>

        <li><a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#newPost">Add Confession</a></li>
        
        <?php
          if (isset($_SESSION['user_id'])) {
              // User is logged in
              echo '<li><a href="Profile.php">Profile</a></li>';
              echo '<li><a href="logout.php">Sign out</a></li>';
          } else {
              // User is not logged in
              echo '<li><a href="Signin.php">Sign in</a></li>';
              echo '<li><a href="Signup.php">Sign up</a></li>';
          }
        ?>
      </ul>
    </nav><!-- .navbar -->

    <div class="position-relative">
    <a href="#" class="mx-2 js-search-open"><span ></span></a>
    <i class="bi bi-list mobile-nav-toggle"></i>

    <!-- Search Form -->
    <div class="search-form-wrap js-search-form-wrap">
        <form action="search-result.php" method="GET" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" name="query" placeholder="Search" class="form-control" required>
            <button type="submit" class="btn"><span class="bi-search"></span></button>
            <button type="button" class="btn js-search-close"><span class="bi-x"></span></button>
        </form>
    </div><!-- End Search Form -->
</div>

  </div>
</header><!-- End Header -->
