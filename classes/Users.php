<?php
include("config/config.php");

class Users extends connnection
{
    //========================================ADD USER========================================
    public function add_user($data)
    {

        $name = ucwords($data['name']);
        $email = $data['email'];
        $address = ucwords($data['address']);

        $userImage = $_FILES['image']['name'];
        $tempUserImage = $_FILES['image']['tmp_name'];

        $status = $data['status'];
        $sql = "INSERT INTO `persons`(`name`, `email`, `address`, `image`, `status`) VALUES ('$name','$email','$address','$userImage','$status')";

        $result = $this->con->query($sql); //OOp style

        //Procedural Style:oporer line er poriborte avabe dilew hobe
        //$result = mysqli_query($this->con, $sql);

        if ($result) {
            echo "<script>localStorage.setItem('data_insert', 'true'); window.location.href='index.php';</script>";
            move_uploaded_file($tempUserImage, "image/" . $userImage);
            exit();
        } else {
            echo "Error deleting record: " . $this->con->error;
        }
    }

    //=======================================FETCH USER=======================================

    public function show()
    {
        $sql = "SELECT * FROM persons";
        $result = $this->con->query($sql);

        //Procedural Style:oporer line er poriborte avabe dilew hobe
        //$result = mysqli_query($this->con, $sql);
        return $result;
    }

    //========================================EDIT PRODUCT=======================================
    public function edit($id)
    {
        $sql = "SELECT *FROM persons WHERE id = '$id'";
        $result = $this->con->query($sql);
        return ($result);
    }


    //========================================UPDATE USER=======================================
    // এখানে পুরোনো ইমেজ তখনই ডিলিট হবে  যখন নতুন ইমেজ আপলোড করা হবে ।
    // যদি ইউজার নতুন ইমেজ আপলোড না করে, তবে পুরোনো ইমেজ সিস্টেমে ঠিক থাকবে এবং ডাটাবেসে সেটিই সেভ থাকবে।
    // আপডেট এর সময় ইমেজ না দিলেও সমস্যা হবে না। এবং সেম ইমেজ দিলেও সমস্যা নাই।

    public function update($data, $id)
    {
        $name = ucwords($data['name']);
        $email = $data['email'];
        $address = ucwords($data['address']);

        $userImage = $_FILES['image']['name'];
        $tempUserImage = $_FILES['image']['tmp_name'];

        // Retrieve the old image name from the database
        $query = "SELECT image FROM persons WHERE id = $id";
        $result = $this->con->query($query);
        $row = mysqli_fetch_assoc($result);
        $oldImage = $row['image'];

        // Check if a new image is uploaded
        if (!empty($userImage)) {
            // Upload the new image
            $upload = move_uploaded_file($tempUserImage, "image/" . $userImage);
            if ($upload) {
                // Delete the old image file
                if (file_exists("image/" . $oldImage) && $oldImage !== $userImage) {
                    unlink("image/" . $oldImage);
                }
                // Use the new image for the database update
                $imageToSave = $userImage;
            } else {
                echo "<script>alert('Image upload failed');</script>";
                return;
            }
        } else {
            // No new image uploaded, keep the old one
            $imageToSave = $oldImage;
        }

        // Update the database with new or old image
        $update = "UPDATE `persons` SET `name`='$name',`email`='$email',`address`='$address',`image`='$imageToSave' WHERE id='$id'";
        $result = $this->con->query($update);

        if ($result) {
            echo "<script>localStorage.setItem('update_msg', 'true'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Update failed');</script>";
        }
    }

    //=======================================DELETE USER=======================================
    public function delete($id)
    {
        $data = $this->con->query("SELECT * FROM `persons` WHERE id=$id ");
        $row = mysqli_fetch_assoc($data);

        $image = $row['image'];
        unlink("image/" . $image);


        $sql = "DELETE FROM `persons` WHERE id='$id'";
        $result = $this->con->query($sql);

        //toastr
        if ($result) {
            echo "<script>localStorage.setItem('delete_msg', 'true'); window.location.href='index.php';</script>";
        } else {
            echo "Error deleting record: " . $this->con->error;
        }
    }
}
