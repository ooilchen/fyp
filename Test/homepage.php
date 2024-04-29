<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Ooi Lee Chen">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Custom styles  -->
        <link rel="stylesheet" type="text/css" href="stylesheet.css">

        <title>UC - Home</title>
</head>

<body>
    <!--Top nav-->
    <div class="navbar-wrapper">
        <nav class="navbar navbar-light justify-content-between">
            <a class="navbar-brand" href="#">
                <img src="../images/FB_IMG_1691993414822.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo">
                UC
                <span class="sr-only">(current)</span>
                Home
            </a>
            <a class="nav-item nav-link" href="#">Confession</a>
            <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#newPost">Add Confession</a>
            <a class="nav-item nav-link" href="#">Search</a>
            <a class="nav-item nav-link" href="#">Login</a>
            
        </nav>
    </div>
    <!-- End of nav -->

    <!--Slideshow-->
    <div id="carouselExampleControls" class="carousel-slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="../images/img-1633387746807736819c57a937810ea00ec4fddbee14b.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../images/IMG_20230214_191131.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../images/nct-doyoung-31.jpeg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Carousel -->
    <!-- <div id="image-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"></div>
        <a class="carousel-control-prev" href="#image-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#image-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> -->
    <!-- End of carousel -->

    <!--Add confession modal-->
    <div class="modal" tabindex="-1" role="dialog" id="newPost">
        <div class="modal-dialog modal-xl" role="document">
            <form method = 'POST' enctype='multipart/form-data' action="test_addConfession.php">
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
                        <label for="image">Upload Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" multiple>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="category">Choose your confession category</label>
                        <select id="category" name="category" class="form-control">
                            <option value="">Loading categories...</option>
                        </select>
                    </div>
                </div>
                
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="new_confess" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </form>
        </div>
    </div>   
    <!--End of modal-->
    
    <!--Content-->
    <div id="content" class="p-4 p-md-5 pt-5">

        <!--Announcement card-->
        <div class="card">
            <div class="card-header ">Announcement by Admin</div>
            <div class="card-body">
            <h5 class="card-title">Success card title</h5>
            <p class="card-text">Yong Sheng is a pig</p>
            </div>
            <div class="card-footer">Updated on </div>
            </div>
        <!--End of card-->

        <!-- container -->
        <div>

        </div>
    </div>
     






    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>

    // post confession
    $(document).ready(function() {
        $('#new_confess').click(function() {
            // Get the value from the input field
            var newText = $('#newText').val();
            var newImg = $('image').files[0];


            var formData = new FormData();

            formData.append('image', newImg);

            console.log(formData);
            // $.ajax({
            //     url: 'addConfession.php', 
            //     type: 'POST', 
            //     data: { value: inputValue }, // Data to send to the server
            //     success: function(response) {
            //         // Handle the response from the server
            //         console.log(response);
            //         // Optionally, update the UI based on the response
            //     },
            //     error: function(xhr, status, error) {
            //         console.error(xhr.responseText);
            //         // Handle error
            //     }
            // });
        });
    });

    // $(document).ready(function () {
    //     $('#newPost').submit(function (e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: 'POST',
    //             url: 'addConfession.php',
    //             data: new FormData(this),
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             success: function (response) {
    //                 response = JSON.parse(response);
    //                 if (response.success) {
    //                     $('#successMessage').html(
    //                         "<div class='alert alert-success' role='alert'>" +
    //                         "This is a success alert with <a href='#' class='alert-link'>an example link</a>. Give it a click if you like." +
    //                         "</div>"
    //                     );
    //                 }
    //             }
    //         });
    //     });
    // });
    
    // fetch image for carousel
    // fetch('home_images.php')
    //     .then(response => response.json())
    //     .then(images => {
    //         const carouselInner = document.querySelector('.carousel-inner');
    //         images.forEach((image, index) => {
    //             const carouselItem = document.createElement('div');
    //             carouselItem.classList.add('carousel-item');
    //             if (index === 0) {
    //                 carouselItem.classList.add('active');
    //             }

    //             const imgElement = document.createElement('img');
    //             imgElement.classList.add('d-block', 'w-100');
    //             imgElement.src = '../fyp/images/' + image;
    //             imgElement.alt = image;

    //             carouselItem.appendChild(imgElement);
    //             carouselInner.appendChild(carouselItem);
    //         });
    //     })
    //     .catch(error => console.error('Error fetching images:', error));


    //Populate category from database
    $(document).ready(function() {
        // AJAX request to fetch categories from the server
        $.ajax({
            url: 'fetch_category.php', 
            type: 'GET',
            dataType: 'json', 
            success: function(data) {
                // Clear previous options
                $('#category').empty();

                // Append new options
                $.each(data, function(index, category) {
                    $('#category').append('<option value="' + category.cat_id + '">' + category.cat_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error
            }
        });
    });


    </script>


    
</body>
</html>