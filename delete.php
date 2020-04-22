<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM personne WHERE id=:id";
$query = $connect->prepare($sql);
$query->execute(array(':id' => $id));


// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>"; 
//redirecting to the display page (index.php in our case)
//header("Location:index.php");
?>
