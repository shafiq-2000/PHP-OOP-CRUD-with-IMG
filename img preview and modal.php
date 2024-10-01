
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block'; // প্রিভিউ ইমেজ দেখানো হচ্ছে
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<style>
    #preview {
        margin-top: 10px;
        width: 180px;
        height: 200px;
        border: 2px solid #ddd;
        padding: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .2);
        border-radius: 5px;
        transition: transform .2s ease-in-out;
    }

    #preview:hover {
        transform: scale(1.05);
    }
</style>


<!-- ================================insert modal=========================== -->
<!-- modal -->
<section>
    <div class="modal" tabindex="-1" id="mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                <input name="image" class="form-control" type="file" required>
                            </div>
                            <div class="mt-3">
                                <span>Status</span>
                                <select name="status" id="" required>
                                    <option value=" ">--select--</option>
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-outline-info" name="add_user">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</section>
