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

        <title>Dashboard - Category</title>

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

    </div>
     






    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>


    </script>


    
</body>
</html>