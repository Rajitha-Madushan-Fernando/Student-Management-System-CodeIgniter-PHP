
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
                    
                   
                    
                    <?php if ($this->session->flashdata('profile_update')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('profile_update'); ?>
                        </div>
                    <?php endif; ?>


                    <?php if ($this->session->flashdata('profile_update_failed')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('profile_update_failed'); ?>
                        </div>
                    <?php endif; ?>
                    
                    
                    <?php
                    foreach ($user_profile as $user) {
                        ?>
                        <!--Page content goes here-->
                        <?php echo form_open('user/profile_basic_data_update/' . $user->id, ['id' => 'student_mark_form', 'name' => 'student_mark_form']); ?>
                        <table class="table table-bordered">

                            <tr class="table-danger">
                                <td colspan="4">Update Profile Details</td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td>
                                    <?php echo form_input(['class' => 'form-control', 'id' => 'stu_name', 'name' => 'fname', 'value' => $user->first_name]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><?php echo form_input(['class' => 'form-control', 'id' => 'stu_index_number', 'name' => 'lname', 'value' => $user->last_name]); ?></td>
                            </tr>

                            <tr>
                                <td>Mobile Number</td>
                                <td>

                                    <?php echo form_input(['class' => 'form-control', 'id' => 'paper_number', 'name' => 'mobile_number', 'value' => $user->mobile_number]); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>

                                    <?php echo form_input(['class' => 'form-control', 'id' => 'mark', 'name' => 'email', 'value' => $user->email]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td>

                                    <?php echo form_input(['class' => 'form-control', 'id' => 'mark', 'name' => 'username', 'value' => $user->username]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <?php echo form_input(['class' => 'form-control', 'value' => '', 'name' => 'stu_id', 'type' => 'hidden']); ?>
                                    <?php echo form_submit(['name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary']); ?>
                                    <a href="<?php echo base_url('user/showUserProfile'); ?>" class="btn btn-warning btn" role="button">Go Back</a> 
                                </td>
                            </tr>


                        </table>
                        <?php
                    }
                    ?>
                    <!--Page content goes here-->
                </div>
                <div class="col-lg-4">
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
