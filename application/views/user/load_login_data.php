
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
                   
                    <?php if ($this->session->flashdata('profile_update_failed')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('profile_update_failed'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors'); ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    foreach ($user_profile as $user) {
                        ?>
                        <!--Page content goes here-->
                        <?php echo form_open('user/profile_login_data_update/' . $this->session->userdata('id'), ['id' => 'student_mark_form', 'name' => 'student_mark_form']); ?>
                        <table class="table table-bordered">

                            <tr class="table-danger">
                                <td colspan="4">Update Login Details</td>
                            </tr>
                            <tr>
                                <td>Enter Current Password</td>
                                <td>
                                    <?php echo form_input(['class' => 'form-control', 'id' => 'cu_password', 'name' => 'cu_password', 'type' => 'password','placeholder'=>'Enter Your Current Password']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Enter New Password</td>
                                <td><?php echo form_input(['class' => 'form-control', 'id' => 'new_password', 'name' => 'new_password', 'type' => 'password','placeholder'=>'Enter Your New Password']); ?></td>
                            </tr>

                            <tr>
                                <td>Retype New Password</td>
                                <td>

                                    <?php echo form_input(['class' => 'form-control', 'id' => 're_new_password', 'name' => 're_new_password', 'type' => 'password','placeholder'=>'Please Retype New Password']); ?>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <?php echo form_input(['class' => 'form-control', 'value' => '', 'name' => 'stu_id', 'type' => 'hidden']); ?>
                                    <?php echo form_submit(['name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary']); ?><a href="<?php echo base_url('user/showUserProfile'); ?>" class="btn btn-warning btn" role="button">Go Back</a> 
                                </td>
                            </tr>


                        </table>
                        <?php
                    }
                    ?>
                    <!--Page content goes here-->
                </div>
                <div class="col-lg-4">




                </div>
            </div>
            <?php $this->load->view('layouts/include_page_footer'); ?>
        </div>
        <?php $this->load->view('layouts/include_footer'); ?>
    </body>
</html>
