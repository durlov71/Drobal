<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<h4 class="font-weight-bold pt-3 text-center pb-0">Please approved newly registred person/s.</h4>

<table class="table table-striped">
<tbody>
    <tr>
        <th scope="col">Sl.</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Action</th>
    </tr>
  <?php 
   include("connection.php");
   $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `admin_confirmation` = 'waiting'");
   $i = 0;
   while($row = mysqli_fetch_array($query))
    {
      
  ?>
<tr>
        <td>
            <?php echo $i = $i + 1; ?>
        </td>        
        <td>
        <?php echo $row['firstname'] ?>
        </td>
        <td>
        <?php echo $row['lastname'] ?>
        </td>
        <td>
        <?php echo $row['email'] ?>
        </td>
        <td>
        <a class="btn btn-info btn-del" href="user_approval.php?id=<?php echo $row['id'];?>">Approve</a>
    
    <a class="btn btn-danger" href="user_decline.php?id2=<?php echo $row['id'];?>">Decline</a>
        </td>
</tr>
   <?php
       }
    ?>
</tbody>
</table>
<?php
 if(mysqli_num_rows($query) == false)
  {
    echo "<h5 style='text-align:center;'>No result found</h5>"."<hr>";
  }
?>
</body>
</html>

