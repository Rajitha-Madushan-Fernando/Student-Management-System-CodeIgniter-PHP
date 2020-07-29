<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Management System | V 1.0</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" media="screen"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style type="text/css">


            .login-form form {
                margin-bottom: 15px;
                margin-top: 50px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">



                    <div class="login-form">
                        <?php echo form_open('user/login', ['id' => 'login_form']); ?>
                        <h2 class="text-center">Log in</h2>  
                        <?php if ($this->session->flashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $this->session->flashdata('errors'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('login_success')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $this->session->flashdata('login_success'); ?>
                            </div>

                        <?php endif; ?>
                        <?php if ($this->session->flashdata('login_failed')): ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $this->session->flashdata('login_failed'); ?>
                            </div>
                        <?php endif;
                        ?>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">Log in</button>
                        </div>
                        <div class="clearfix">
                            <a href="#" class="pull-right">Forgot Password?</a>
                        </div>        
                        <?php echo form_close(); ?></form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </body>
</html>                                		