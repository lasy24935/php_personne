<?php session_start(); ?>

<?php
if(!isset($_SESSION['profil'])) {
	header('Location: login.php');
}
?>


<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $mysqli->query("SELECT * FROM users ORDER BY id DESC");
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
                                            <th scope="col">Login</th>
                                            <th scope="col">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 	
                            while($row = $result->fetch(PDO::FETCH_ASSOC)) { 	
                                    echo "<tr>";
                                    echo "<td>".$row['prenom']."</td>";
                                    echo "<td>".$row['nom']."</td>";
                                    echo "<td>".$row['login']."</td>";
                                
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

    

  </body>
</html>