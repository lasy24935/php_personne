<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$prenom=$_POST['prenom'];
	$nom=$_POST['nom'];
	$age=$_POST['age'];
	$sexe=$_POST['sexe'];	
	
	// checking empty fields
	if(empty($prenom) || empty($nom)|| empty($age) || empty($sexe)) {	
			
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
	} else {	
		//updating the table
		$sql = "UPDATE personne SET prenom=:prenom, nom=:nom, age=:age, sexe=:sexe WHERE id=:id";
		$query = $connect->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':prenom', $prenom);
		$query->bindparam(':nom', $nom);
		$query->bindparam(':age', $age);
		$query->bindparam(':sexe', $sexe);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM personne WHERE id=:id";
$query = $connect->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{

		$prenom = $row['prenom'];
	$nom = $row['nom'];
	$age = $row['age'];
	$sexe = $row['sexe'];
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
                                    <div class="card contact">
                                      <div class="card-body">
                                        <h4 class="card-title ">EDITER UNE PERSONNE  </h4>
                                      </div>
                                    </div>
                         </div>

                    </div>
                 </div>

<!--Table-->
                 <div class="container my-5">
                     <div class="row">
                        
                         <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive table-hover">
							<form name="form1" method="post" action="edit.php">
                                <table class="table">
                                      
                                         <tr>
											<td>PRENOM</td>
				                            <td><input type="text" name="prenom" value="<?php echo $prenom;?>"></td>
										 </tr>
										 <tr>
											 <td>Nom</td>
			                             	<td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
										 </tr>
										 <tr>
											 <td>Age</td>
                                         <td><input type="text" name="age" value="<?php echo $age;?>"></td>
										 </tr>
										 <tr>
											 <td>Sexe</td>
									         <td><input type="text" name="sexe" value="<?php echo $sexe;?>"></td>
										 </tr>
                                      	<tr>
										<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
										<td><input type="submit" name="update" value="Update"></td>
									</tr>
															
                                </table>     
							</form> 
                             </div>
 
                    </div>
                </div>


<!--/Table-->
                      

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

