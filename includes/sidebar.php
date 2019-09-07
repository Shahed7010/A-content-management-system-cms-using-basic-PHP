 <div class="col-md-4" style="margin-top:50px">
    <?php include("includes/db.php");?>              
                

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                </div>
                
                <!-- Blog login Well -->
                <div class="well">
                    <?php
                    if(isset($_SESSION['user_role'])==null){
                        include("login_well.php");
                    }
                    ?>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php 
                            $query="SELECT * FROM categories";
                            $fetched=mysqli_query($connect,$query);
                            while($row=mysqli_fetch_assoc($fetched)){
                                $title=$row['cat_title'];
                                $cat_id=$row['cat_id'];
                                echo "<li><a href='category.php?cat_id={$cat_id}'>{$title}</a></li>";
                            }    
                            ?>  
                            </ul>
                        </div>
                        <!-- /.col-lg-6 
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        .col-lg-6 -->
                    </div>
             

     
