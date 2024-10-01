<?php
include("layouts/header.php");
include("classes/Users.php");
$user = new Users();
if (isset($_POST['add_user'])) {
    $user->add_user($_POST);
}

?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-3 test-upercase text-white bg-danger p-1 text-center">PHP OOP CRUD with IMAGE</h1>
        </div>
        <?php
        //toastr error message show
        if (isset($_SESSION['msg'])) { ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?php echo $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            unset($_SESSION['msg']);
        }
        ?>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="mt-5">
                <form action="" method="post" class="shadow" enctype="multipart/form-data">
                    <div class="p-5">
                        <div class="text-primary mb-3">
                            <h3 class="text-center">Add User</h3>
                        </div>
                        <div class="">
                            <span>Name</span>
                            <input name="name" class="form-control" placeholder="Enter user name" type="text" required>
                        </div>
                        <div class="">
                            <span>Email</span>
                            <input name="email" class="form-control" placeholder="Enter user email" type="email" required>
                        </div>
                        <div class="">
                            <span>Address</span>
                            <input name="address" class="form-control" placeholder="Enter user Address" type="text" required>
                        </div>
                        <div class="">
                            <span>Image</span>
                            <input name="image" class="form-control" type="file" accept="image/*" onchange="previewImage(event)" required>
                            <img id="preview" alt="Preview Image" style="display: none;">
                        </div>

                        <div class="mt-3">
                            <span>Status</span>
                            <select name="status" id="" required>
                                <option value=" ">--select--</option>
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-outline-info form-control" name="add_user">Submit</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>

        <div class="col-md-8">
            <h3 class="text-primary text-center">All Task</h3>
            <button class="btn btn-outline-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#mymodal"><i class="fa-solid fa-user-plus"></i></button>
            <table class="table table-striped">
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php
                $data = $user->show();
                $num_rows = mysqli_num_rows($data);
                if ($num_rows > 0) {

                    // $data = $user->show();
                    while ($row = mysqli_fetch_assoc($data)) { ?>

                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td> <img src="image/<?php echo $row['image'] ?>" height="60px" width="60px" alt=""></td>
                            <td><?php echo $row['status'] ?></td>

                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-info btn-sm "><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure')"><i class="fa-solid fa-trash"></i></a>
                            </td>

                        </tr>

                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="8" class="text-center">Users Record Not Found</td>
                    </tr>


                <?php } ?>


            </table>
        </div>
    </div>
</div>


<?php
include "img preview and modal.php";
include "layouts/footer.php";
?>