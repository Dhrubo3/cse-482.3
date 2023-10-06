<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
          <h1>Add Admin</h1>

          <br><br>

<?php
             if(isset($_SESSION['add']))
             {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
             }
?>


          <form action="" method="POST">

          <table class="tbl-30">
            <tr>
                <tb>Full Name: </tb>
                <tb><input type="text" name="full_name" placeholder="Enter your name"></tb>
            </tr>
<br>
            <tr>
                <tb>Userame: </tb>
                <tb><input type="text" name="username" placeholder="Enter your user name"></tb>
            </tr>
<br>
            <tr>
                <tb>Password: </tb>
                <tb><input type="password" name="password" placeholder="Enter your password"></tb>
            </tr>
<br>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
          </table>
          </form>
    </div>
</div>




<?php include('partials/footer.php'); ?>


<?php 

if(isset($_POST['submit']))
{

echo "Button Cliked";

 $full_name = $_POST['full_name'];
 $username = $_POST['username'];
 $password = md5($_POST['password']); // password encryption


$sql = "INSERT INTO tbl_admin SET
full_name = '$full_name',
username = '$username',
password= '$password'
";


$res = mysqli_query($conn, $sql) or die(mysqli_error());


if($res==TRUE)
{
   // echo "Data Inserted";
   $_SESSION['add'] = "<div class='sucess'>Admin Added Sucessfully.</div>";
   header("location:".SITEURL.'admin/manage-admin.php');
}else{
   // echo "Fail to Insert Data";
   $_SESSION['add'] = "<div class='error'>Failed to Added Admin.</div>";
   header("location:".SITEURL.'admin/add-admin.php');
}

}


?>