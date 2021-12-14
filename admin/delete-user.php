<?php
  require_once('functions/function.php');
  $id=$_GET['d'];
  $del="DELETE FROM user_cr WHERE id='$id'";
  if(mysqli_query($con,$del)){
    header('Location:all-user.php');
  }else{
    echo "Opps! delete operation failed.";
  }
?>
