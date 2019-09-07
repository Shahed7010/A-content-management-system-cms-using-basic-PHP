<!-- Blog login Well -->
                <div class="well">
                    <h4>Login here</h4>
                    <form action="includes/login.php" method="post">
                    <div  class="form-group">
                       <?php
                        /*if(isset($_GET['source'])){
                            echo "<input name='username' type='text' class='form-control' placeholder='enter username' autofocus>";
                        }else{
                            echo "<input name='username' type='text' class='form-control' placeholder='enter username'>";
                        }*/
                        ?>
                    <input name='username' type='text' class='form-control' placeholder='enter username' autofocus>
                    </div>
                    <div  class="form-group">
                        <input name="password" type="password" class="form-control" placeholder="enter password">
                    </div>
            
                        <button name="login" class="btn btn-primary" type="submit">Login</button>
                    </form><br>
                    <div class="form form-inline">
                    <h5 class="form-group" style="margin-right:10px">New here?</h5>
                    <a href="./register.php" class="btn btn-success form-group ml-10">Register now</a>
                    </div>
                   </div>
