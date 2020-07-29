<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('layouts/include_header'); ?>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('layouts/include_page_header'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <!--Page content goes here-->

                    <p>Type something in the input field to search the table for names, index number or mobile number:</p>  
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Mobile Number</th>
                                <th>User Type</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($users as $data) {
                            ?>
                            <tbody id="myTable">
                                <tr>
                                    <td><?php echo $data->title; ?></td>
                                    <td><?php echo $data->first_name; ?></td>
                                    <td><?php echo $data->last_name; ?></td>
                                    <td><?php echo $data->username; ?></td>
                                    <td><?php echo $data->mobile_number; ?></td>
                                    <td><?php echo $data->user_type;?></td>
                                    <td><?php echo $data->status; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('user/edit_user/' . $data->id); ?>" class="btn btn-warning btn-sm" role="button">Edit</a>   
                                        
                                        
                                    </td>
                                </tr>

                            </tbody>

                            <?php
                        }
                        ?>
                    </table>
                    <!--Page content goes here-->
                </div>
            </div>
            <?php $this->load->view('layouts/include_page_footer'); ?>
        </div>
        <?php $this->load->view('layouts/include_footer'); ?>

        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </body>
</html>
