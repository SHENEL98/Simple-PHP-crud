<?php
    include 'connect.php';
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        // echo $id;

        $delete_sql = "delete from `profile` where id=$id";
        $result = mysqli_query($con,$delete_sql);
        if($result){
            // echo "Deleted successfuly";
            header('location:index.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>
