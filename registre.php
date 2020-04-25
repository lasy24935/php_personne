<?php
include("config.php");

if(isset($_POST['inscrire'])) {
	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$login = $_POST['login'];
	$password = $_POST['password'];

							if(empty($prenom) || empty($nom) || empty($login) || empty($password)) {
										
								if(empty($prenom)) {
									echo "<font color='red'>Prenom field is empty.</font><br/>";
								}
								if(empty($nom)) {
									echo "<font color='red'>Nom field is empty.</font><br/>";
								}
								
								if(empty($login)) {
									echo "<font color='red'>login field is empty.</font><br/>";
								}
								
								if(empty($password)) {
									echo "<font color='red'>password field is empty.</font><br/>";
								}
								
								echo "<br/><a href='javascript:self.history.back();'> Retour </a>";
							} 
							else { 

		$sql = "INSERT INTO users(prenom, nom, login, password) VALUES(:prenom, :nom, :login, :password)";
								$query = $connect->prepare($sql);
										
								
								$query->bindparam(':prenom', $prenom);
								$query->bindparam(':nom', $nom);
									$query->bindparam(':login', $login);
								$query->bindparam(':password', $password);
								$query->execute();
		
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
}

?>

<?php
   include_once 'header.php'
?>
    <!--card body-->
            <div class="card-body offset-3">
                
                 <div class="container my-5">
                    <div class="row">
                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-1">
                                    <div class="card registre">
                                      <div class="card-body">
                                        <h4 class="card-title title">FORMULAIRE D'INSCRIPTION</h4>
                                      </div>
                                    </div>
                         </div>

                    </div>
                 </div>

<!--Registre-->
                       <div class="container my-5">
                     <div class="row">
                        
                             <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive table-hover">
									<form action="registre.php" method="post">
									<div class="form-row">
										<div class="form-group col-md-6">
										<label for="prenom">Prenom</label>
										<input type="text" class="form-control" id="prenom" name="prenom">
										</div>
										<div class="form-group col-md-6">
										<label for="nom">Nom</label>
										<input type="text" class="form-control" id="nom" name="nom">
										</div>
									</div>
									<div class="form-group">
										<label for="login">Login</label>
										<input type="email" class="form-control" id="login" placeholder="Votre Email" name="login">
									</div>
									<div class="form-group">
										<label for="password">Password </label>
										<input type="password" class="form-control" id="password" placeholder="password" name="password">
									</div>
									
									<button type="submit" class="btn btn-success btn-inscrire" name="inscrire" id="inscrire"> <i class="fas fa-address-card"></i> &nbsp;S'inscrire </button>
									</form>

                             </div>
 
                    </div>
                </div>

<!--/Registre-->

            </div>

    <!--/card body-->

  

  </body>
</html>