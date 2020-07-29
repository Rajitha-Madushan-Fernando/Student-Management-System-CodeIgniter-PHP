<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('layouts/include_header'); ?>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('layouts/include_page_header'); ?>
            <div class="row">
                <div class="col-lg-6">
                    
                    <p>Type something in the input field to search the table for names :                 <a href="<?php echo base_url('reference/create_school');?>"><button type='button' class='btn btn-info btn-sm'>Add New School</button></a></p>  
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>School Name</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php foreach ($schools as $row) {
                            ?>
                            <tbody id="myTable">
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->status; ?></td>
                                    <td>

                                        <a href="<?php echo base_url('reference/get_school_data/'.$row->id); ?>"><button type='button' class='btn btn-warning btn-sm'>Update</button></a>

                                    </td>
                                </tr>

                            </tbody>

                        <?php } ?>
                    </table>

                </div>
                <div class="col-lg-3"></div>
                
                <div class="col-lg-3">
                    <!--Page content goes here-->

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
