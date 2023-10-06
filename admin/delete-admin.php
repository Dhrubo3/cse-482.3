<?php

include('../config/constants.php');

$id  = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn,$sql);

if($res==TRUE)
{
           // echo "admin Deleted";
           $_SESSION['delete'] = "<div class='sucess'>Admin Deleted sucessfully.</div>";

           header('location:'.SITEURL.'admin/manage-admin.php');
}else{
          // echo "Failed to Delete Admin";
          $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin.Try Again Later.</div>";

          header('location:'.SITEURL.'admin/manage-admin.php');
}

?>