<?php
    include 'connect.php';

    $id = $_GET['editid'];

    $getdata_sql = "select * from `profile` where id= '$id'";
    $result = mysqli_query($con,$getdata_sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $age = $row['age'];



    if(isset($_POST['submit'])){
        //pass values to variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $date = date("Y-m-d H:i:s"); 


        //save in the database
        $update_sql = "update `profile` set   name = '$name', email = '$email'
        , age ='$age', created_at ='$date' where id= '$id' " ;  
        $result = mysqli_query($con,$update_sql);
        if($result){
            echo "Updted sucessfully";
            // alert("Data instered sucessfully");
            // header('location:index.php');
        }else{
            die(mysqli_error($con));
        }
    }
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
                    <a class="nav-link" href="profile.php">Create User Profile <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-5">
        <h3>
            Edit User Profile
        </h3>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputName">User name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" value="<?php echo $name; ?>"
                    placeholder="Enter your name in here" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                    value="<?php echo $email; ?>" placeholder="Enter your email in here" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="exampleInputAge">Age</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="age"
                    value="<?php echo $age; ?>" placeholder="Enter your age" autocomplete="off"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



</body>

</html>