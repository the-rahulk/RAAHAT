<?php

    include('authentication.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/sidebar.php');
    include('config/webconfig.php');
?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Database</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit - User Details</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Edit - User Details</h3>
                            <a href="hospital.php"  class="btn btn-danger btn-sm float-right"> Back </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="webcode.php" method="POST">
                                        <div class="modal-body">
                                            <?php
                                                if(isset($_GET['id'])) {

                                                    $id = $_GET['id'];
                                                    $query = "SELECT * FROM users WHERE id ='$id' LIMIT 1";
                                                    $query_run= mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run) > 0) {
                                                        foreach ($query_run as $row) {
                                                            ?>
                                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                <div class="form-group">
                                                                    <label for="">Name</label>
                                                                    <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Hospital Name">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">Email</label>
                                                                    <input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Address">
                                                                </div>
                                                        
                                                                <div class="form-group">
                                                                    <label for="">Phone No.</label>
                                                                    <input type="text" name="phone" value="<?php echo $row['phone_no'] ?>" class="form-control" placeholder="Phone Number">
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                <button type="submit" name="updateUser" class="btn btn-info">Update</button>
                                                                </div>

                                                            <?php
                                                        }
                                                    }   else {
                                                        echo " <h4>No Records Found.</h4> ";
                                                    }
                                                }
                                            ?>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

<?php
include('includes/footer.php');
?>