<?php
include '../connection/connect.php';
if(!$con){
    die(mysqli_errno($con));
}
$stt = $_GET['updatestt'];
$sql = "SELECT * FROM diem WHERE stt =$stt";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$msv = $row['msv'];
$hoten = $row['hoten'];
$diem = $row['diem'];

if(isset($_POST['submit'])){
    $msv = $_POST['msv'];
    $hoten = $_POST['hoten'];
    $diem = $_POST['diem'];

    $sql = "UPDATE diem SET msv = '$msv', hoten ='$hoten', diem = '$diem' WHERE stt = $stt";
    $result = mysqli_query($con, $sql);
    header("Location: index.php");
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
                <input type="text" class="form-control" name="msv" placeholder="Enter your ID" autocomplete="off" value=<?php echo $msv ?>>
            </div>
            <div class="form-group">
                <label class="form-label">Fullname</label>
                <input type="text" class="form-control" name="hoten" placeholder="Enter your Fullname" autocomplete="off" value=<?php echo $hoten ?>>
            </div>
            <div class="form-group">
                <label class="form-label">Grade</label>
                <input type="text" class="form-control" name="diem" placeholder="Enter your Grade" autocomplete="off" value=<?php echo $diem ?>>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

</body>
</html>