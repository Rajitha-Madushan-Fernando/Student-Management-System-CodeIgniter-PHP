<div class="row">
    <div class="col-lg-12">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg  fixed-top navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Student Mgt System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url('./student/view_student'); ?>">View All Student <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="themes">Student Module <span class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="">

                                <a class="dropdown-item" href="<?php echo base_url('./student/add_student'); ?>">Add New Student</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">User Module  <span class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="">
                                <a class="dropdown-item" href="<?php echo base_url('./user/add_user'); ?>">Add New User</a>
                                <a class="dropdown-item" href="<?php echo base_url('./user/show_user'); ?>">View User List</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Reference Data <span class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="">
                                 <a class="dropdown-item" href="<?php echo base_url('reference/show_school');?>">Schools</a>
                                <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="<?php echo base_url('reference/show_class_type');?>">Class types</a>
                               
                                

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('./reference/view_system_log'); ?>">View System Log</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Welcome <?php echo $this->session->username; ?>  <span class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="">
                                <a class="dropdown-item" href="<?php echo base_url('./user/showUserProfile'); ?>">Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url('./user/logout'); ?>">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
