<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('layouts/include_header'); ?>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('layouts/include_page_header'); ?>
            <div class="row">
                <div class="col-lg-8">
                    <!--Page content goes here-->
                    <?php foreach ($student as $stu_data) {
                        ?>
                        <table class="table table-bordered">


                            <tr class="table-warning">
                                <td colspan="4">Student Basic Details</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $stu_data->name; ?></td>
                                <td>Index No</td>
                                <td><?php echo $stu_data->index_no; ?></td>
                            </tr>

                            <tr>
                                <td>NIC No</td>
                                <td><?php echo $stu_data->nic; ?></td>
                                <td>Mobile Number</td>
                                <td><?php echo $stu_data->mobile_number; ?> </td>
                            </tr>

                            <tr>
                                <td>Address</td>
                                <td> <?php echo $stu_data->address; ?></td>
                                <td>Birth Day</td>
                                <td> <?php echo $stu_data->birthday; ?></td>
                            </tr>
                        </table>
                        <table class="table table-bordered">

                            <tr class="table-danger">
                                <td colspan="4">Student Acadamic Details</td>
                            </tr>
                            <tr>
                                <td>School </td>
                                <td><?php echo $stu_data->school; ?></td>
                            </tr>
                            <tr>
                                <td>Class Type</td>
                                <td><?php echo $stu_data->class_type; ?></td>
                            </tr>
                            <tr>
                                <td>Attempt Number</td>
                                <td><?php echo $stu_data->attempt; ?></td>
                            </tr>

                            <tr>
                                <td>Class Year</td>
                                <td><?php echo $stu_data->class_year; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php echo $stu_data->status; ?></td>
                            </tr>

                        </table>
                    <?php }
                    ?>

                    <!--Page content goes here-->
                </div>
                <div class="col-lg-4">
                    <!--Page content goes here-->
                    <p>Type something in the input field to search the table for index number or created date:</p>  
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>P/Number</th>
                                <th>Marks</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($marks as $mark) {
                            ?>
                            <tbody id="myTable">
                                <tr>
                                    <td><?php echo $mark->paper_number; ?></td>
                                    <td><?php echo $mark->mark; ?></td>
                                    <td>
                                        <?php
                                        $unix_time = mysql_to_unix($mark->created_date);
                                        echo mdate('%Y/%m/%d', $unix_time);
                                        ?>
                                    </td>
                                    <td> <a href="<?php echo base_url('student/update_single_student_mark/' . $mark->id); ?>" class="btn btn-warning btn-sm" role="button">Update</a>  </td>

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
        <script type="text/javascript">
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
    </body>
</html>
