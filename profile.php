<?php
    include 'connect.php';
    //when form button clicked
    if(isset($_POST['submit'])){
        //pass values to variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $date = date("Y-m-d H:i:s");  

        //save in the database
        $save_sql = "insert into `profile` (name,email,age,created_at)
                        values('$name','$email','$age','$date' )" ;  

        $result = mysqli_query($con,$save_sql);
        if($result){
            // echo "Data instered sucessfully";
            // alert("Data instered sucessfully");
            header('location:index.php');
        }else{
            die(mysqli_error($con));
        }
    }

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
            Create User Profile
        </h3>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputName">User name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name"
                    placeholder="Enter your name in here" autocomplete="off">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                    placeholder="Enter your email in here" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="exampleInputAge">Age</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="age"
                    placeholder="Enter your age" autocomplete="off"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</body>

</html>