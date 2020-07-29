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

                    <?php if ($this->session->flashdata('student_created')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('student_created'); ?>
                        </div>
                    <?php endif; ?>


                    <?php if ($this->session->flashdata('student_created_failed')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('student_created_failed'); ?>
                        </div>
                    <?php endif; ?>


                    <?php echo form_open('student/add_student', ['id' => 'register_form']); ?>
                    <table class="table table-bordered">
                        <tr class="table-active">
                            <td colspan="4">Student Basic Details</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <?php echo form_input(['class' => 'form-control', 'name' => 'name', 'placeholder' => 'Enter Student name']); ?>
                            </td>
                            <td>Index Number</td>
                            <td><?php echo form_input(['class' => 'form-control', 'name' => 'index_number', 'placeholder' => 'Enter Student Index number', 'id' => 'index_no']); ?></td>
                        </tr>
                        <tr>
                            <td>NIC</td>
                            <td>
                                <?php echo form_input(['class' => 'form-control', 'name' => 'nic', 'placeholder' => 'Enter Student nic']); ?>
                            </td>
                            <td>Mobile Number</td>
                            <td><?php echo form_input(['class' => 'form-control', 'name' => 'mobile_number', 'placeholder' => 'Enter Student Mobile number']); ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <?php echo form_input(['class' => 'form-control', 'name' => 'address', 'placeholder' => 'Enter address']); ?>
                            </td>
                            <td>School</td>
                            <td>
                                <select class="custom-select" name="school">
                                    <option value="" >--Please select--</option>
                                    <?php
                                    foreach ($school as $row) {
                                        echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <select class="form-control" name="gender">
                                    <option value="" >--Please select--</option>
                                    <?php
                                    foreach ($gender as $row) {
                                        echo '<option value="' . $row->id . '">' . $row->type . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>Birthday</td>
                            <td>

                                <?php echo form_input(['class' => 'form-control', 'name' => 'birthday', 'placeholder' => 'Enter Birthday by YYYY/MM/DD', 'id' => 'birth-date']); ?>

                            </td>
                        </tr>
                        <tr class="table-danger">
                            <td colspan="4">Student Acadamic Details</td>
                        </tr>
                        <tr>
                            <td> Year</td>
                            <td>
                                <?php echo form_input(['class' => 'form-control', 'name' => 'year', 'placeholder' => 'Enter Year']); ?>
                            </td>
                            <td> Class Type</td>
                            <td>
                                <select class="form-control" name="class_type">
                                    <option value="" >--Please select--</option>
                                    <?php
                                    foreach ($class_type as $row) {
                                        echo '<option value="' . $row->id . '">' . $row->type . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Attempt</td>
                            <td>
                                <select class="form-control" name="attempt">
                                    <option value="" >--Please select--</option>
                                    <?php
                                    foreach ($attempt as $row) {
                                        echo '<option value="' . $row->id . '">' . $row->attempt_number . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>Status</td>
                            <td>
                                <select class="form-control" name="status">
                                    <option value="" >--Please select--</option>
                                    <?php
                                    foreach ($status as $row) {
                                        echo '<option value="' . $row->id . '">' . $row->type . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>

                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="4">
                                <?php echo form_submit(['name' => 'submit', 'value' => 'Create', 'class' => 'btn btn-primary']); ?><?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-danger']); ?>
                            </td>
                        </tr>
                    </table>
                    <?php echo form_close(); ?>
                    <!--Page content goes here-->
                </div>
                <div class="col-lg-4">
                    <!--Show errors-->
                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors'); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php $this->load->view('layouts/include_page_footer'); ?>
        </div>
        <?php $this->load->view('layouts/include_footer'); ?>

        <script >
            $(document).ready(function () {
                $('#birth-date').mask('0000/00/00');
                $('#index_no').mask('00000');
                //$('#phone-number').mask('0000-0000');
            })
        </script>
    </body>
</html>
