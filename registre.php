<?php
include("config.php");

if(isset($_POST['inscrire'])) {
	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$user = $_POST['login'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $prenom == "" || $nom == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO users(prenom, nom, login, password) VALUES('$prenom', '$nom', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
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
										<input type="nom" class="form-control" id="login" placeholder="Votre nom" name="login">
									</div>
									<div class="form-group">
										<label for="password">Password </label>
										<input type="password" class="form-control" id="password" placeholder="password" name="password">
									</div>
									
									<button type="submit" class="btn btn-success btn-inscrire" name="inscrire" id="inscrire">S'inscrire </button>
									</form>

                             </div>
 
                    </div>
                </div>

<!--/Registre-->

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