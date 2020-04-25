

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


  $sql = $connect->prepapre("SELECT login,password FROM users WHERE login='$user' AND password='$pass'");
$sql->execute(array($user, $pass));
	
    $sql->setFetchMode(PDO::FETCH_ASSOC);

		
		if ($row = $sql->fetch())   {
			$validuser = $row['login'];
			$_SESSION['profil'] = $validuser;
			$_SESSION['prenom'] = $row['prenom'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid login or password.";
			echo "<br/>";
			echo "<a href='login.php'>Retour</a>";
		}

		if(isset($_SESSION['profil'])) {
			header('Location: personne.php');			
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
										<label for="login"> <i class="fas fa-id-card"></i> &nbsp; Login</label>
										<input type="email" class="form-control" id="login" placeholder="Votre email" name="login">
									</div>
									<div class="form-group">
										<label for="password"> <i class="fas fa-user-lock"></i> &nbsp;Password </label>
										<input type="password" class="form-control" id="password" placeholder="password" name="password">
									</div>
									
									<button type="submit" class="btn btn-success btn-connecter" name="connecter" id="connecter"> <i class="fas fa-user-friends"></i> &nbsp;Connecter </button>
									<a href="registre.php" class="btn btn-large btn-primary" style="float: right;"><i class="fas fa-user-plus"></i> &nbsp; Inscrire</a>
									</form>

                             </div>
 
                    </div>
                </div>
<!--/Login-->

            </div>

    <!--/card body-->


  </body>
</html>