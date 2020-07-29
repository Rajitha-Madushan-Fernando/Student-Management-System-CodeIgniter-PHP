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
                    <!--Show errors-->
                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors'); ?>
                        </div>
                    <?php endif; ?>
                    <!--Show errors-->
                    <?php if ($this->session->flashdata('student_update')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('student_update'); ?>
                        </div>
                    <?php endif; ?>
                    <!--Show errors-->
                    <?php if ($this->session->flashdata('student_created_failed')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('student_created_failed'); ?>
                        </div>
                    <?php endif; ?>
                    <!--Page content goes here-->
                    <!--This form reserved for exam mark add start-->
                    <?php foreach ($marks as $mark) { ?>
                    <?php echo form_open('student/update_mark/'. $mark->id, ['id' => 'student_mark_form', 'name' => 'student_mark_form']); ?>
                    <table class="table table-bordered">
                       


                            <tr class="table-danger">
                                <td colspan="4">Student Exam  marks updating form</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <?php echo form_input(['class' => 'form-control', 'id' => 'stu_name', 'name' => 'name', 'value' => $mark->student_name, 'readonly' => 'readonly']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Index No</td>
                                <td><?php echo form_input(['class' => 'form-control', 'id' => 'stu_index_number', 'name' => 'index_number', 'value' => $mark->index_number, 'readonly' => 'readonly']); ?></td>
                            </tr>

                            <tr>
                                <td> Paper No</td>
                                <td>

                                    <?php echo form_input(['class' => 'form-control', 'id' => 'paper_number', 'name' => 'paper_number', 'value' => $mark->paper_number, 'readonly' => 'readonly']); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Marks</td>
                                <td>

                                    <?php echo form_input(['class' => 'form-control', 'id' => 'mark', 'name' => 'mark', 'placeholder' => 'Enter updatedbale mark']); ?>
                                </td>
                            </tr>
                            <?php echo form_input(['class' => 'form-control', 'id' => 'student_id', 'name' => 'stu_id', 'type' => 'hidden']); ?>
                        </table>
                    
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="4">
                                <?php echo form_submit(['name' => 'submit', 'value' => 'Save', 'class' => 'btn btn-primary']); ?>

                                <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-danger']); ?>         <a href="<?php echo base_url('student/view_single_student_mark/' . $mark->sid); ?>" class="btn btn-warning " role="button">Go Back</a> 
                            </td>
                        </tr>
                    </table>
                    <?php echo form_close(); ?>
                    <?php } ?>
                    <!--This form reserved for exam mark add end-->
                    <!--Page content goes here-->
                </div>

            </div>
            <?php $this->load->view('layouts/include_page_footer'); ?>
        </div>
        <?php $this->load->view('layouts/include_footer'); ?>
    </body>
</html>
