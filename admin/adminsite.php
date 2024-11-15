<?php
include '../connection/connect.php';

if(!$con){
    die(mysqli_connect_error());
}

$sql = "SELECT * FROM diem";

if (isset($_POST['search'])) {
    $search_keyword = mysqli_real_escape_string($con, $_POST['search_keyword']);
    $sql .= " WHERE hoten LIKE '%$search_keyword%'";
}

$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Students</title>
</head>
<body>
    <h1>Hello admin!!</h1>
    <button type="button" class="btn btn-info position-absolute top-0 end-0 ">
        <a href="../logout.php" class="text-light">Log out</a>
    </button>
    <div class="container position-absolute top-50 start-50 translate-middle">
        <form method="post">
            <div class="row mb-3">
                <div class="col-sm">
                    <input type="text" name="search_keyword" class="form-control" placeholder="Search by FullName" value="<?php echo isset($search_keyword) ? $search_keyword : ''; ?>">
                </div>
                <div class="col-sm">
                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>ID</th>
                    <th>FullName</th>
                    <th>Grade</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($query) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        $stt = $row['stt'];
                        $msv = $row['msv'];
                        $hoten = $row['hoten'];
                        $diem = $row['diem'];
                        echo '<tr>
                            <td scope="row">'.$stt.'</td>
                            <td>'.$msv.'</td>
                            <td>'.$hoten.'</td>
                            <td>'.$diem.'</td>
                            <td>
                                <button class="btn btn-success"><a href="update.php?updatestt='.$stt.'" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="delete.php?deletestt='.$stt.'" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary">
            <a href="create.php" class="text-light">Add student</a>
        </button>
    </div>
</body>
</html>
