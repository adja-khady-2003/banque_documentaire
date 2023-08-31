<?php
//database connection  file
include('../../connexion/connexion.php');
//Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($conn,"delete from nom_theme where ID=$rid");
echo "<script>alert('Data deleted');</script>"; 
echo "<script>document.location ='liste_theme.php'</script>";     
} 
?>
