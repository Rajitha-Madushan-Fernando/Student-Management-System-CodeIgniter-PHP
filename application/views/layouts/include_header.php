<?php
if (!$this->session->userdata('id')) {
    redirect('./user');
}
?>
<meta charset="UTF-8">
<title>Document</title> 
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" media="screen"/>
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/custom.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">