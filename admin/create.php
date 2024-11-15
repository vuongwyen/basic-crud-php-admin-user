<?php
include '../connection/connect.php';
if(!$con){
    die(mysqli_errno($con));
}
if(isset($_POST['submit'])){
    $msv = $_POST['msv'];
    $hoten = $_POST['hoten'];
    $diem = $_POST['diem'];

    $sql = "INSERT INTO diem (msv, hoten, diem) VALUES ('$msv', '$hoten', '$diem')";
    $query = mysqli_query($con, $sql);
    if($query){
    header("Location: adminsite.php");
    exit();?>
    <script>alert("Insert student successfull");</script>
    <?php
    } else {
        echo "Error: " . mysqli_error($con);
    }    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add student</title>
</head>
<body>
    <div class="container my-5">
        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">ID</label>
                <input type="text" class="form-control" name="msv" placeholder="Enter your ID" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">Fullname</label>
                <input type="text" class="form-control" name="hoten" placeholder="Enter your Fullname" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">Grade</label>
                <input type="text" class="form-control" name="diem" placeholder="Enter your Grade" autocomplete="off">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
