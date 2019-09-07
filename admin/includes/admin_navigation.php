 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                        
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-meh-o" style="color:green"></i>
                    Online: <span class="usersonline"></span>
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
                
             
                <li>
                 <a href="../index.php"><span class="strong">Home</span></a>
                </li>
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    <?php
                        if(isset($_SESSION['user_name'])){
                            echo $_SESSION['user_name'];
                        }    
                    ?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="posts.php">View all posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_posts">Add post</a>
                            </li>
                        </ul>
                    </li>
                  
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-desktop"></i>Categories</a>
                    </li>
                      <li>
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i>Comments</a>
                    </li>
                  
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add User</a>
                            </li>
                        </ul>
                    </li>
                
                    <li>
                        <a href="./profile.php"><i class="fa fa-fw fa-dashboard"></i>Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>