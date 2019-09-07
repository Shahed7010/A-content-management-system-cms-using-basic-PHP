
       <?php include("includes/db.php");?>
       <?php include("functions.php");?>

       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <?php 
//                $query="SELECT * FROM categories";
//                $fetched=mysqli_query($connect,$query);
//                while($row=mysqli_fetch_assoc($fetched)){
//                    $title=$row['cat_title'];
//                    echo "<li><a href='#'>{$title}</a></li>";
//                } 
                $add_post='';
                $contact='';
                $page=basename($_SERVER['PHP_SELF']);
                    if($page=='user_add_post.php'){
                        $add_post='active';
                    }else if($page=='contact.php'){
                        $contact='active';
                    }
                ?> 
                <li class="<?php echo $contact; ?>">
                <a  href="contact.php"><span class="fa fa-envelope-o"></span> Contact us</a>
                </li>
                </ul>  
            
             
                <?php  if(isset($_SESSION['user_name'])){ ?>
                            
                 <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-meh-o" style="color:green"></i>
                    Active now <span class="usersonline"></span>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <?php
                        $active=active_names();
                            while($row=mysqli_fetch_assoc($active)){
                                $names=$row['active_name'];
                                if(!empty($row['active_name'])){
                                    echo "<li><a href=''><i class='fa fa-check-circle' style='color:green'></i> $names</a></li>";
                                }else{
                                    echo "<li><a href=''><i class='fa fa-eye' style='color:green'></i>Visitor</a></li>";
                                }
                                
                            }
                        ?>
                        
                    </ul>
                </li>
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php    echo $_SESSION['user_name']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul> 
            <?php
                }
            if(isset($_SESSION['user_role'])){
                
                if($_SESSION['user_role']==='admin'){
                    echo "<ul class='nav navbar-nav navbar-right'>";
                    echo "<li><a href='admin'>Admin</a></li>";
                    echo "</ul>";   
                    if(isset($_GET['p_id'])){
                        $p_id=$_GET['p_id'];
                        echo "<ul class='nav navbar-nav'>";
                        echo "<li><a href='admin/posts.php?source=edit_post&edit={$p_id}'>Edit Post</a></li>";
                        echo "</ul>";
                    }
                }
            echo "<ul class='nav navbar-nav'>";
            echo "<li class='$add_post'>
            <a href='./user_add_post.php'><span class='glyphicon glyphicon-plus'></span>Add Post</a>
            </li>";
            echo "</ul>";

            }else{
                echo "<ul class='nav navbar-nav navbar-right'>
                <li><a href='./index.php'><span class='glyphicon glyphicon-user'></span> Login</a></li>
                </ul>";
            }
            ?>
               
               
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>