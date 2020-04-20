<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>


<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $mysqli->query("SELECT * FROM personne ORDER BY id DESC");
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
                                        <h4 class="card-title ">LISTES DES CONTACTS</h4>
                                      </div>
                                    </div>
                         </div>

                    </div>
                 </div>

<!--Table-->
                <div class="container my-5">
                     <div class="row">
                        
                             <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive table-hover">
                                <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Prenom</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Sexe</th>
                                            <th scope="col">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 	
                               while($row = mysqli_fetch_array($result)) { 	
                                    echo "<tr>";
                                    echo "<td>".$row['prenom']."</td>";
                                    echo "<td>".$row['nom']."</td>";
                                    echo "<td>".$row['age']."</td>";
                                    echo "<td>".$row['sexe']."</td>";
                                
                                    echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
                                }
                                ?>
                                        </tbody>
                                </table>     

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