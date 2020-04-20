

<?php
   include_once 'header.php'
?>
<?php
include("config.php");

if(isset($_POST['connecter'])) {
                           $user = $_POST['login'];
							$pass = $_POST['password'];

	if($user == "" || $pass == "") {
		echo "Either login or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$sql = "SELECT * FROM users WHERE login='$user' AND password=md5('$pass')"
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['login'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['prenom'] = $row['prenom'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid login or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
}
?>
    <!--card body-->
            <div class="card-body offset-3">
                
                 <div class="container my-5">
                    <div class="row">
                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-1">
                                    <div class="card login">
                                      <div class="card-body">
                                        <h4 class="card-title title ">AUTHENTIFICATION  </h4>
                                      </div>
                                    </div>
                         </div>

                    </div>
                 </div>

<!--Login-->
                 <div class="container my-5">
                     <div class="row">
                        
                             <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive table-hover">
									<form action="login.php" method="post">
										
									<div class="form-group">
										<label for="login">Login</label>
										<input type="email" class="form-control" id="login" placeholder="Votre email" name="login">
									</div>
									<div class="form-group">
										<label for="password">Password </label>
										<input type="password" class="form-control" id="password" placeholder="password" name="password">
									</div>
									
									<button type="submit" class="btn btn-success btn-connecter" name="connecter" id="connecter">Connecter </button>
									</form>

                             </div>
 
                    </div>
                </div>
<!--/Login-->

            </div>

    <!--/card body-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js'></script>
 	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>

  </body>
</html>