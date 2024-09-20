<?php
include('./header.php');
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>
<body class="text-bg-secondary mt-1">
    <section>
        <div class="container ">
            <div class="row">
                <div class="col-lg-12" style="padding-top: 30px;">
                    <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-4" style="padding-bottom: 10px">
                                <div class="form-group">
                                    <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-lg-4" style="padding-bottom: 10px">
                                <div class="form-group">
                                    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="col-lg-4" style="padding-bottom: 10px">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-lg-4" style="padding-bottom: 10px">
                                <div class="form-group">
                                    <input type="text" name="number" class="form-control" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-lg-4" style="padding-bottom: 10px">
                                <div class="form-group">
                                    <select class="form-control" name="active">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4" style="padding-bottom: 10px; display: flex;gap: 10px;">
                                <button type="submit" name='search' class="btn btn-primary" style="width: 50%;">Search</button>
                                <button type="submit" name='Allsearch' class="btn btn-primary" style="width: 50%;">Refresh</button>
                            </div>
                            <hr>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['search'])) {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $number = $_POST['number'];
                    $active = $_POST['active'];

                     if($lname != null){
                        $sql = "SELECT * FROM testing WHERE lastName LIKE '$lname' ";
                        $result = $conn->query($sql);
                     }elseif($fname != null){
                        $sql = "SELECT * FROM testing WHERE firstName LIKE '$fname' ";
                        $result = $conn->query($sql);
                     }elseif($email != null){
                        $sql = "SELECT * FROM testing WHERE email LIKE '$email' ";
                        $result = $conn->query($sql);
                     }elseif($number != null){
                        $sql = "SELECT * FROM testing WHERE phoneNumber LIKE '$number' ";
                        $result = $conn->query($sql);
                     }elseif($active != null){
                        $sql = "SELECT * FROM testing WHERE status LIKE '$active' ";
                        $result = $conn->query($sql);
                     } 

                   

                     
                ?>
                        <div class="col-lg-12">
                            <table class="table" style="margin-left: -2.5rem;">
                                <thead>
                                    <tr align="center">
                                        <th style="padding-left: 3rem;">ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th colspan="2" style="padding-right: 3rem;">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td style="padding-left: 3rem;"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['firstName']; ?></td>
                                            <td><?php echo $row['lastName']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phoneNumber']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['image']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><a class="btn btn-success" href="./Edit.php?id=<?php echo $row['id']; ?>">Edit</button></td>
                                            <td style="padding-right: 3rem;"><a href="./delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                <?php
                    }elseif(isset($_POST['Allsearch']) || (!(isset($_POST["Allsearch"]))) || (!(isset($_POST['search']))) ){
                        $sql = "SELECT * FROM testing";
                        $result = $conn->query($sql);
                        ?>
                        <div class="col-lg-12">
                            <table class="table" style="margin-left: -2.5rem;">
                                <thead>
                                    <tr align="center">
                                        <th style="padding-left: 3rem;">ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th colspan="2" style="padding-right: 3rem;">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td style="padding-left: 3rem;"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['firstName']; ?></td>
                                            <td><?php echo $row['lastName']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phoneNumber']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['image']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><a class="btn btn-success" href="./Edit.php?id=<?php echo $row['id']; ?>">Edit</button></td>
                                            <td style="padding-right: 3rem;"><a href="./delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    }
                ?>

            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>