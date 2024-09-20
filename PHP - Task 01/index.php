<?php
include('./header.php');
?>

<body class="text-bg-secondary mt-1">
    <div class="container" style="margin-top: 1rem; margin-bottom: 1rem">
        <?php
        session_start();

        if (isset($_SESSION['error'])) {
            echo "<p style='background-color: red; color: white; max-width: 97%; margin-top: 1rem'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        ?>
        <form action="./function.php" method="POST" class="row g-3 needs-validation">
            <h2 class="mb-0" style="text-align: center;">Registation</h2>
            <hr>
            <div class="row">
                <div class="col mb-3">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name='FirstName' id="FirstName" placeholder="Enter First Name">

                </div>
                <div class="col">
                    <label for="exampleInputPassword1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name='LastName' id="LastName" placeholder="Enter Last Name">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" class="form-control" name='Email' id="Email" placeholder="Enter Email">
                </div>
                <div class="col">
                    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name='number' id="number" placeholder="Enter Phone Number">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name='password' id="password" placeholder="Enter Password">
                </div>
                <div class="col ">
                    <label for="exampleInputPassword1" class="form-label">Confrm Password</label>
                    <input type="password" class="form-control" name='ConPassword' id="ConPassword" placeholder="Confirm Password">
                </div>
            </div>


            <div class="mb-3" style="width: 98%;">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" class="form-control" name='address' id="address" placeholder="Enter Address ">
            </div>
            <div class="row">
                <div class="col">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" class="form-control" name='image' id="image">
                </div>
                <div class="col mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-dark" style="width: 98%;">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>