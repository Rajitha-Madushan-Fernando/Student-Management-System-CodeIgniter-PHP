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
                    <?php if ($this->session->flashdata('school_created')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('school_created'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('school_created_failed')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('school_created_failed'); ?>
                        </div>
                    <?php endif; ?>
                    <?php echo form_open('reference/create_school', ['id' => 'register_form']); ?>
                    <fieldset>
                        <legend>Add New School</legend>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Example</label>
                            <div class="col-sm-10">
                                <input type="text" readonly="" class="form-control-plaintext" id="staticSchool" value="Galle Central Collage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="school_name">School Name</label>
                            <?php echo form_input(['class' => 'form-control', 'name' => 'name', 'placeholder' => 'Enter School Name']); ?>
                            <small id="emailHelp" class="form-text text-muted">Please consider uppercase and lowercase words!</small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="" >--Please select--</option>
                                <?php
                                foreach ($status as $row) {
                                    echo '<option value="' . $row->id . '">' . $row->type . '</option>';
                                }
                                ?>
                            </select>
                        </div>


                        <?php echo form_submit(['name' => 'submit', 'value' => 'Create', 'class' => 'btn btn-primary']); ?><?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-danger']); ?>
                    </fieldset>
                    <?php echo form_close(); ?>
                    <!--Page content goes here-->
                </div>
                <div class="col-lg-2">

                </div>
                <div class="col-lg-6">
                    <div class="alert alert-dismissible alert-warning">
                        <h4 class="alert-heading">Instruction for create new school</h4>
                        <br />
                        <p>First enter town name. for example: <code class="highlighter-rouge">Colombo Royal Collage</code> </p>
                        <p>Use uppercase letter for every word starting letter <code class="highlighter-rouge">Colombo Royal Collage</code> class.</p>
                    </div>
                </div>
                <?php $this->load->view('layouts/include_page_footer'); ?>
            </div>
            <?php $this->load->view('layouts/include_footer'); ?>
            <script>
                $(document).ready(function () {
                    $("#myInput").on("keyup", function () {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
    </body>
</html>
