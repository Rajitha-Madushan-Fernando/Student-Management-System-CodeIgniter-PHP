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
                    
                    <?php if ($this->session->flashdata('user_created')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('user_created'); ?>
                        </div>
                    <?php endif; ?>
                    
                    
                    <?php if ($this->session->flashdata('user_created_failed')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('user_created_failed'); ?>
                        </div>
                    <?php endif; ?>
                    
                    
                    <?php echo form_open('user/add_user', ['id' => 'register_form']); ?>
                    <table class="table table-bordered">
                        <tr class="table-active">
                            <td colspan="4">System user Basic Details</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>
                                <select class="custom-select" name="title">
                                    <option value="" >--Please select--</option>
                                    <?php
                                    foreach ($title as $row) {
                                        echo '<option value="' . $row->id . '">' . $row->type . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>Gender</td>
                            <td>
                                <select class="custom-select" name="gender">
                                    <option value="" >--Please select--</option>
                                    <?php
                                    foreach ($gender as $row) {
                                        echo '<option value="' . $row->id . '">' . $row->type . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>
                                <?php echo form_input(['class' => 'form-control', 'name' => 'fname', 'placeholder' => 'Enter First name']); ?>
                            </td>
                            <td>Last Name</td>
                            <td><?php echo form_input(['class' => 'form-control', 'name' => 'lname', 'placeholder' => 'Enter Last Name']); ?></td>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td>
                                <?php echo form_input(['class' => 'form-control', 'name' => 'username', 'placeholder' => 'Enter Suitable User Name']); ?>
                            </td>
                            <td>Password</td>
                            <td><?php echo form_input(['class' => 'form-control','type'=>'password' ,'name' => 'password', 'placeholder' => 'Enter password']); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <?php echo form_input(['class' => 'form-control', 'name' => 'email', 'placeholder' => 'Enter Email address']); ?>
                            </td>
                            <td>Mobile Number</td>
                            <td>
                                 <?php echo form_input(['class' => 'form-control', 'name' => 'mobile_number', 'placeholder' => 'Enter Mobile number']); ?>
                            </td>
                        </tr>
                        <tr>
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
                            <td>User Type</td>
                            <td>
                                <select class="custom-select" name="user_type">
                                    <option value="" >--Please select--</option>
                                    <?php
                                    foreach ($user_type as $row) {
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
    </body>
</html>
