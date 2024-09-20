<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$id = $_GET['id'];


$sql = "SELECT * FROM testing WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

        <?php
        include('./header.php');
        ?>

        <body class="text-bg-secondary mt-1">
            <div class="container" style="margin-top: 1rem; margin-bottom: 1rem">
                <form action="./EditFunction.php" method="POST" class="row g-3 needs-validation">
                    <h2 class="mb-0" style="text-align: center">User Edit</h2>
                    <hr>
                    <div class="row">
                        <input type="text" class="id" name="id" value="<?php echo $row['id']; ?>" hidden>
                        <div class="col mb-3">
                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                            <input type="text" class="form-control" name='FirstName' id="FirstName" value="<?php echo $row['firstName'] ?>">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name='LastName' id="LastName" value="<?php echo $row['lastName'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" name='Email' id="Email" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name='number' id="number" value="<?php echo $row['phoneNumber'] ?>">
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name='password' id="password" value="<?php echo $row['password'] ?>">
                        </div>
                        <div class="col ">
                            <label for="exampleInputPassword1" class="form-label">Confrm Password</label>
                            <input type="password" class="form-control" name='ConPassword' id="ConPassword" value="<?php echo $row['password'] ?>">
                        </div>
                    </div>


                    <div class="mb-3" style="width: 98%;">
                        <label for="exampleInputPassword1" class="form-label">Address</label>
                        <input type="text" class="form-control" name='address' id="address" value="<?php echo $row['address'] ?>">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Image</label>
                            <input type="file" class="form-control" name='image' id="image" value="<?php echo $row['image'] ?>">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Status</label>
                            <select class="form-select" name="status" aria-label="Default select example" value="<?php echo $row['status'] ?>">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" name="Editsubmit" class="btn btn-dark" style="width: 98%;">Submit</button>
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    }
} else {
    echo "Error";
}
