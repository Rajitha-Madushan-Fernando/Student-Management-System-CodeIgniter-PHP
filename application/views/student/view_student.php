<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('layouts/include_header'); ?>




    </head>
    <body>
        <div class="container">
            <?php $this->load->view('layouts/include_page_header'); ?>
            <div class="row">
                <div class="col-lg-9">
                    <!--Page content goes here-->

                    <table class="table table-bordered table-striped" id="example">
                        <thead>
                            <tr>
                                <th>Index Number</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Year</th>
                                <th>Class Type</th>
                                <!--<th>Attempt</th>
                                <th>Status</th>-->
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($student as $data) {
                                ?>

                                <tr>
                                    <td><?php echo $data->index_no; ?></td>
                                    <td><?php echo $data->name; ?></td>
                                    <td><?php echo $data->mobile_number; ?></td>
                                    <td><?php echo $data->class_year; ?></td>
                                    <td><?php echo $data->class_type; ?> </td>
                                    <?php //echo $data->attempt; ?>
                                    <?php //echo $data->status; ?>
                                    <td> 

                                        <a href="<?php echo base_url('student/view_single_student_mark/' . $data->id); ?>" class="btn btn-warning btn-sm" role="button">View</a>                       

                                        <button type="button" class="btn btn-warning btn-sm" value="<?php echo $data->id; ?>" onclick="getState(this.value);"><span class="glyphicon glyphicon-edit" ></span>Add Marks</button>                                                    </td>
                                </tr>



                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Index Number</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Year</th>
                                <th>Class Type</th>
                                <!--<th>Attempt</th>
                                <th>Status</th>-->
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                    <!--Page content goes here-->
                </div>
                <!--This form reserved for exam mark add start-->
                <div class="col-lg-3" id="main_table"> 
                    <div id="messages" class="hide" role="alert">
                        <div id="messages_content"></div>
                    </div>
                    <div id="messages_error" class="hide" role="alert">
                        <div id="messages_error_content"></div>
                    </div>
                    <?php echo form_open('student/add_student_mark', ['id' => 'student_mark_form', 'name' => 'student_mark_form']); ?>
                    <table class="table table-bordered">

                        <tr class="table-danger">
                            <td colspan="4">Student Exam  marks</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <?php echo form_input(['class' => 'form-control', 'id' => 'stu_name', 'name' => 'name', 'placeholder' => 'Enter  name', 'value' => '', 'readonly' => 'readonly']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Index No</td>
                            <td><?php echo form_input(['class' => 'form-control', 'id' => 'stu_index_number', 'name' => 'index_number', 'placeholder' => 'Index number', 'readonly' => 'readonly']); ?></td>
                        </tr>

                        <tr>
                            <td> Paper No</td>
                            <td>

                                <?php echo form_input(['class' => 'form-control', 'id' => 'paper_number', 'name' => 'paper_number', 'placeholder' => 'Enter Paper Number']); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>Marks</td>
                            <td>

                                <?php echo form_input(['class' => 'form-control', 'id' => 'mark', 'name' => 'mark', 'placeholder' => 'Enter Mark']); ?>
                            </td>
                        </tr>
                        <?php echo form_input(['class' => 'form-control', 'id' => 'student_id', 'name' => 'stu_id', 'type' => 'hidden']); ?>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="4">
                                <?php echo form_submit(['name' => 'submit', 'type' => 'hidden', 'value' => 'Save', 'class' => 'btn btn-primary']); ?>
                                <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                                <button type="submit" class="btn btn-success"  id="stu_form_submit" value="save">Save</button>
                                <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-danger']); ?>
                            </td>
                        </tr>
                    </table>
                    <?php echo form_close(); ?>
                </div>
                <!--This form reserved for exam mark add end-->
                <?php $this->load->view('layouts/include_page_footer'); ?>
            </div>
            <?php $this->load->view('layouts/include_footer'); ?>

            <script>
                $(document).ready(function () {
                    $('#example').DataTable();
                });
            </script>
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
            <script type="text/javascript">
                function getState(val) {
                    $.ajax({

                        method: 'POST',
                        url: '<?php echo base_url() ?>student/get_student_by_id',
                        data: 'student_id=' + val,
                        dataType: 'json',
                        //data = $.parseJSON(data),
                        success: function (data) {
                            myObj = data;
                            name = myObj[0].name;
                            stu_id = myObj[0].id;
                            index_number = myObj[0].index_no;
                            $("#student_id").val(stu_id);
                            $("#stu_name").val(name);
                            $("#stu_index_number").val(index_number);
                            $("#paper_number").val(null);
                            $("#mark").val(null);
                        }
                    });
                }

            </script>

            <script type="text/javascript">
                // this is the id of the form
                $("#student_mark_form").validate({
                    rules: {
                        paper_number: {
                            required: true,
                            number: true
                        },
                        name: {
                            required: true
                        },
                        index_number: {
                            required: true,
                            number: true
                        },
                        mark: {
                            required: true,
                            number: true,
                            minlength: 1
                        }
                    },
                    messages: {
                        paper_number: {
                            required: "Enter paper number",
                            lettersonly: "Please provide a Numeric value"
                        },
                        mark: {
                            required: "Please provide a mark",
                            number: "Please provide a Numeric value",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        name: {
                            required: "Please select a name"
                        },
                        index_number: {
                            required: "Please provide a mark",
                            number: "Please provide a Numeric value"
                        }
                    },

                    submitHandler: function (form) {

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('student/add_student_mark'); ?>",
                            data: $(form).serialize(), // <--- THIS IS THE CHANGE
                            dataType: "json",
                            success: function (data) {

                                $('#messages').removeClass('hide').addClass('alert alert-success alert-dismissible').slideDown().show();
                                $('#messages_content').html('Succesfully added');
                                $("#messages").fadeTo(1000, 500).slideUp(2000, function () {
                                    $("#success-alert").alert('close');
                                });

                            },
                            error: function () {

                                $('#messages_error').removeClass('hide').addClass('alert alert-danger alert-dismissible').slideDown().show();
                                $('#messages_error_content').html('There was ans error while adding marks');
                                $("#messages_error").fadeTo(1000, 500).slideUp(2000, function () {
                                    $("#success-alert_error").alert('close');
                                });
                            }
                        });

                    }
                });

            </script>

    </body>
</html>
