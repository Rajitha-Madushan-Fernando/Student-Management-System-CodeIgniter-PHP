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

                    <?php if ($this->session->flashdata('user_updated')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('user_updated'); ?>
                        </div>
                    <?php endif; ?>


                    <?php if ($this->session->flashdata('user_updated_failed')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('user_updated_failed'); ?>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($single_user as $user) { ?>
                        <?php echo form_open('user/update_user/'.$user->id, ['id' => 'register_form']); ?>
                        <table class="table table-bordered">
                            <tr class="table-active">
                                <td colspan="4">System user Basic Details</td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>
                                    <select class="custom-select" name="title">
                                       <option value="" >--Please select--</option>
                                        <?php foreach ($title as $row) { ?>
                                            <option <?php echo ($row->id == $user->title) ? 'selected="selected"' : ''; ?> value='<?php echo $row->id; ?>'> <?php echo $row->type ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>Gender</td>
                                <td>
                                    <select class="custom-select" name="gender">
                                        <option value="" >--Please select--</option>
                                        <?php foreach ($gender as $row) { ?>
                                            <option <?php echo ($row->id == $user->gender) ? 'selected="selected"' : ''; ?> value='<?php echo $row->id; ?>'> <?php echo $row->type ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td>
                                    <?php echo form_input(['class' => 'form-control', 'name' => 'fname', 'value' => $user->first_name]); ?>
                                </td>
                                <td>Last Name</td>
                                <td><?php echo form_input(['class' => 'form-control', 'name' => 'lname', 'value' => $user->last_name]); ?></td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>
                                    <?php echo form_input(['class' => 'form-control', 'name' => 'email', 'value' => $user->email]); ?>
                                </td>
                                <td>Mobile Number</td>
                                <td>
                                    <?php echo form_input(['class' => 'form-control', 'name' => 'mobile_number', 'value' => $user->mobile_number]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <select class="form-control" name="status">
                                         <option value="" >--Please select--</option>
                                        <?php foreach ($status as $row) { ?>
                                            <option <?php echo ($row->id == $user->status) ? 'selected="selected"' : ''; ?> value='<?php echo $row->id; ?>'> <?php echo $row->type ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </td>
                                <td>User Type</td>
                                <td>
                                    <select class="custom-select" name="user_type">
                                        <option value="" >--Please select--</option>
                                        <?php foreach ($user_type as $row) { ?>
                                            <option <?php echo ($row->id == $user->user_type) ? 'selected="selected"' : ''; ?> value='<?php echo $row->id; ?>'> <?php echo $row->type ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="4">
                                    <?php echo form_submit(['name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary']); ?><?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-danger']); ?>
                                </td>
                            </tr>
                        </table>
                        <?php echo form_close(); ?>
                    <?php } ?>
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
