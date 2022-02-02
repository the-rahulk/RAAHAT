<?php

include('authentication.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/webconfig.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    
    <!-- Delete User Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="webcode.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="delete_id" class="delete_Post_id" value="<?php echo $id ?>" >
                        <p>
                            Are you sure, you want to remove this post?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="DeletePostbtn" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Post Database</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Database: Posts</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if(isset($_SESSION['status'])) {
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Image URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM post";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0) {
                                            foreach($query_run as $row) {
                                            ?>
                                                <tr>
                                                    <td> <?php echo $row['id']; ?></td>
                                                    <td> <?php echo $row['uid']; ?></td>
                                                    <td> <?php echo $row['name']; ?></td>
                                                    <td> <?php echo $row['age']; ?></td>
                                                    <td> <?php echo $row['gender']; ?></td>
                                                    <td> <?php echo $row['location']; ?></td>
                                                    <td> <?php echo $row['phone']; ?></td>
                                                    <td> <?php echo $row['message']; ?></td>

                                                    <td> <img src="../website/to-find/profile/uploads/<?=$row['image_url']?>" alt="" style = "height: 100px; width:100px"   ></td>
                                                    <td>
                                                        <a href="post-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                        <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm deletebutton">Delete </button>
                                                    </td>
                                                </tr>
                                                <?php
                                                $id = $row['id'];
                                            }

                                        } else {
                                    ?>
                                            <tr>
                                                <td>No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>



<?php
    include('includes/footerscript.php');
?>

<script> 

    $(document).ready(function () {
        $('.h_name').keyup(function(e){
            var hname = $('.h_name').val();

            $.ajax({
                type: "POST",
                url: "webcode.php",
                data: {
                    'check_hname':1,
                    'hname':hname,
                },
                success: function (response) {
                    $('.hospital_error').text(response)
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function () {
        $('.deletebutton').click(function (e) {
            e.preventDefault();

            var hospital_id = $(this).val();
            //console.log(hospital_id);
            $('.delete_hospital_id').val(hospital_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>


<?php
    include('includes/footer.php');
?>