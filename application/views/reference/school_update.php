<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('layouts/include_header'); ?>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('layouts/include_page_header'); ?>
            <div class="row">
                <div class="col-lg-4">
                    <!--Page content goes here-->
                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('school_update')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('school_update'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('school_update_failed')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('school_update_failed'); ?>
                        </div>
                    <?php endif; ?>
                    <?php foreach ($single_school as $school) { ?>
                        <?php echo form_open('reference/update_school/' . $school->id, ['id' => 'register_form']); ?>
                        <fieldset>
                            <legend>Update existed School</legend>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Example</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly="" class="form-control-plaintext" id="staticSchool" value="Galle Central Collage">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <?php echo form_input(['class' => 'form-control', 'name' => 'name', 'value' => $school->name]); ?>
                                <small id="schoolHelo" class="form-text text-muted">Please consider uppercase and lowercase words!</small>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status">
                                    <option value="" >--Please select--</option>
                                    <?php foreach ($status as $row_set) { ?>
                                        <option <?php echo ($row_set->id == $school->status ) ? 'selected="selected"' : ''; ?> value='<?php echo $row_set->id; ?>'> <?php echo $row_set->type ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>


                            <?php echo form_submit(['name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary']); ?><?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-danger']); ?>
                             <a href="<?php echo base_url('reference/show_school'); ?>" class="btn btn-warning " role="button">Go Back</a> 
                        </fieldset>
                        <?php echo form_close(); ?>
                    <?php } ?>
                    <!--Page content goes here-->
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-6">

                </div>
            </div>
            <?php $this->load->view('layouts/include_page_footer'); ?>
        </div>
        <?php $this->load->view('layouts/include_footer'); ?>

    </body>
</html>
