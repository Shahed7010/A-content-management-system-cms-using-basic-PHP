<?php include("includes/header.php");?>
<?php include("includes/db.php");?>   
    <!-- Navigation -->
    <?php include("includes/navigation.php");?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-xs-6 col-xs-offset-3">
                <h1 class="page-header">
                    Contact
                    <small>with CMS System</small>
                </h1>
                
                <?php
                  if(isset($_POST['submit'])){

                    $to='shahed291prof@gmail.com';
                    $header="From: " .$_POST["email"];
                    $subject=$_POST["subject"];
                    $user_firstname=$_POST["body"];
                    
                      mail($to,$subject,$body,$heder);
                  } 
                ?>
   
              <form action="" method="post">

                <div class="form-group">
                    <label for="user_firstname" class="sr-only">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="user_lastname" class="sr-only">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Enter the subject">
                </div>
                <div class="form-group" class="sr-only">
                    <label for="user_email" class="sr-only">Content</label>
                    <textarea name="body" class="form-control" id="" cols="30" rows="5" required></textarea>
                </div>
                <input type="button" name="submit" value="Send" class="btn btn-primary btn-block">

            </form>
               
            </div>
    </div>

        
</div>
 
        <!-- /.row -->

        <hr>

      <?php include("includes/footer.php");?>