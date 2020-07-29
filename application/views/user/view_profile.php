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
                    <!--Page content goes here-->
                    <?php if ($this->session->flashdata('profile_update')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('profile_update'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card border-danger mb-3" >
                        <?php foreach ($user as $single_user) { ?>    
                            <div class="card-header bg-default">
                                <h4>
                                    <?php echo $single_user->first_name; ?>
                                    <small class="text-muted"><?php echo $single_user->last_name; ?></small>
                                </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Department</td>
                                            <td><?php echo $single_user->user_type; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hire date</td>
                                            <td>

                                                <?php
                                                echo $single_user->created_date;
                                                /*
                                                  $unix_time = mysql_to_unix($single_user->created_date);
                                                  echo mdate('%Y/%m/%d', $unix_time);
                                                 * 
                                                 */
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Full Name</td>
                                            <td><?php
                                                echo $single_user->first_name;
                                                echo "  ";
                                                echo $single_user->last_name
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <td>User name</td>
                                            <td><?php echo $single_user->username; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td><?php echo $single_user->mobile_number; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="<?php $single_user->email; ?>"><?php echo $single_user->email; ?></a></td>
                                        </tr>


                                    </tbody>
                                </table>
                                <a href="<?php echo base_url('user/profile_basic_data_get/' . $single_user->id); ?>" class="btn btn-warning btn-sm" role="button">Update Personal Details</a> 
                                <a href="<?php echo base_url('user/profile_login_data_get/' . $single_user->id); ?>" class="btn btn-info btn-sm" role="button">Update Login Details</a> 


                            </div>
                        <?php } ?>

                        <!-- Modal for login data -->
                        <div class="modal" id="loginData">
                            <div class="modal-dialog" role="document">
                                <?php echo form_open('reference/create_school', ['id' => 'register_form']); ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <fieldset>
                                            <div class="form-group">
                                                <label for="school_name">Type Current Password</label>
                                                <?php echo form_input(['class' => 'form-control', 'type' => 'password', 'name' => 'cu_password']); ?>
                                                <small id="emailHelp" class="form-text text-muted">Please provide current password!</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="school_name">New Password</label>
                                                <?php echo form_input(['class' => 'form-control', 'type' => 'password', 'name' => 'cu_password']); ?>
                                                <small id="emailHelp" class="form-text text-muted">Please provide current password!</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="school_name">Retype New Password</label>
                                                <?php echo form_input(['class' => 'form-control', 'type' => 'password', 'name' => 'cu_password']); ?>
                                                <small id="emailHelp" class="form-text text-muted">Please provide current password!</small>
                                            </div>
                                        </fieldset>

                                    </div>
                                    <div class="modal-footer">
                                        <?php echo form_submit(['name' => 'submit', 'value' => 'Save Changes', 'class' => 'btn btn-primary']); ?><?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-danger']); ?>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                        <!-- Modal for user data -->
                        <div class="modal" id="basicData">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Modal body text goes here.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Page content goes here-->
                </div>

            </div>
            <?php $this->load->view('layouts/include_page_footer'); ?>
        </div>
        <?php $this->load->view('layouts/include_footer'); ?>
    </body>
</html>
