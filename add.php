<?php
   include_once 'header.php'
?>

    <!--card body-->
            <div class="card-body offset-3">
                
                 <div class="container my-5">
                    <div class="row">
                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-1">
                                    <div class="card contact">
                                      <div class="card-body">
                                        <h4 class="card-title ">SAISIR UNE PERSONNE  </h4>
                                      </div>
                                    </div>
                         </div>

                    </div>
                 </div>

<!--Formulaire-->
                <div class="container my-5">
                     <div class="row">
                        
                             <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive table-hover">
									<form action="add.php" method="post">
									<div class="form-row">
										<div class="form-group col-md-6">
										<label for="prenom">Prenom</label>
										<input type="text" class="form-control" id="prenom" name="prenom" required>
										</div>
										<div class="form-group col-md-6">
										<label for="nom">Nom</label>
										<input type="text" class="form-control" id="nom" name="nom" required>
										</div>
									</div>
									<div class="form-group">
										<label for="age">Age</label>
										<input type="text" class="form-control" id="age" placeholder="Votre Age" name="age" required>
									</div>
									<div class="form-group">
										<label for="sexe">Sexe </label>
										<input type="text" class="form-control" id="sexe" placeholder="sexe" name="sexe" required>
									</div>
									
									
									<button type="submit" class="btn btn-primary btn-valider" name="valider" id="valider">Valider </button>
									</form>

                             </div>
 
                    </div>
                </div>


<!--/Formulaire-->
                      
					  
<?php
						//including the database connection file
						include_once("config.php");

						if(isset($_POST['valider'])) {	
							$prenom = $_POST['prenom'];
							$nom = $_POST['nom'];
							$age = $_POST['age'];
							$sexe = $_POST['sexe'];
								
							// checking empty fields
							if(empty($prenom) || empty($nom) || empty($age) || empty($sexe)) {
										
								if(empty($prenom)) {
									echo "<font color='red'>Prenom field is empty.</font><br/>";
								}
								if(empty($nom)) {
									echo "<font color='red'>Nom field is empty.</font><br/>";
								}
								
								if(empty($age)) {
									echo "<font color='red'>Age field is empty.</font><br/>";
								}
								
								if(empty($sexe)) {
									echo "<font color='red'>Sexe field is empty.</font><br/>";
								}
								
								//link to the previous page
								echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
							} else { 
								// if all the fields are filled (not empty) 
									
								//insert data to database		
								$sql = "INSERT INTO personne(prenom, nom, age, sexe) VALUES(:prenom, :nom, :age, :sexe)";
								$query = $connect->prepare($sql);
										
								
								$query->bindparam(':prenom', $prenom);
								$query->bindparam(':nom', $nom);
									$query->bindparam(':age', $age);
								$query->bindparam(':sexe', $sexe);
								$query->execute();
								
								// Alternative to above bindparam and execute
								// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
								
								//display success message

							}
						}
						?>
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

