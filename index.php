<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>PHP Crud</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">PHP Crud</a>
  

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="profile.php">Create User Profile <span class="sr-only">(current)</span></a>
                </li> 
            </ul> 
        </div>
    </nav>
    <div class="container my-5">
        <a href="profile.php">
            <button class="btn btn-primary">Add User Profile</button>
        </a>
        <table class="table my-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $get_data_sql = "select * from `profile`";
                    $result = mysqli_query($con,$get_data_sql);
                    if($result){
                        // $row = mysqli_fetch_assoc($result);
                        // echo $row['name'];
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $age = $row['age'];
                            echo '
                            <tr>
                                <th scope="row">'.$id.'</th>
                                <td>'.$name.' <br> '.date("F j, Y, g:i a", strtotime($row['created_at'])).'</td>
                                <td>'.$email.'</td>
                                <td>'.$age.'</td>
                                <td>
                                    <a href="edit.php?editid='.$id.'">
                                        <button type="button" class="btn btn-success">Edit</button>
                                    </a>
                                    <a href="delete.php?deleteid='.$id.'">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                    </td>
                            </tr>
                            ';
                        }
                    }

                ?>


            </tbody>
        </table>
    </div>

</body>

</html>