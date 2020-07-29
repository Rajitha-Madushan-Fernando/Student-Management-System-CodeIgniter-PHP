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
                    
                    <p>Type something in the input field to search the table for names :</p>  
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <?php foreach ($class_types as $row) {
                            ?>
                            <tbody id="myTable">
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->type; ?></td>
                                    
                                </tr>

                            </tbody>

                        <?php } ?>
                    </table>

                </div>
                <div class="col-lg-3"></div>
                
                <div class="col-lg-3">
                    <!--Page content goes here-->

                    <!--Page content goes here-->
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
