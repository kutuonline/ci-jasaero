<?php
    defined('BASEPATH') OR exit ('No direct script access allowed');

    if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }
?>

<!-- message when data succesfully saved -->
<?php echo $this->session->flashdata('success'); ?>

<!-- message when error found -->
<?php
    if(validation_errors()){
        echo"
            <div class='alert alert-danger alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                
        echo validation_errors();

        echo "</div>";
    }    
?>

<!-- content -->
<div class="row">
    <div class="col-md-12">
        <!-- TABLE STRIPED -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Contact Lists</h3> 
            </div>

            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Message Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($msg_list)){
                                $no = 1;
                                foreach($msg_list as $row){               
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->full_name; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->msg_status; ?></td>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_contact;?>"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                            </td>
                        </tr>

                        <?php } ?>
                        <?php } ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END TABLE STRIPED -->
    </div>
</div>
<!-- //content -->

<!-- view modal -->
<?php foreach($msg_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->id_contact;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Contact Us</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Full Name</b></td>
                        <td><?php echo $row->full_name; ?></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><?php echo $row->email; ?></td>
                    </tr>
                    <tr>
                        <td><b>Message</b></td>
                        <td><?php echo $row->msg; ?></td>
                    </tr>
                    <tr>
                        <td><b>Message Status</b></td>
                        <td><?php echo $row->msg_status; ?></td>
                    </tr>
                </table>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" name="btnClose">Close</button>
                </div>

            </div>
            
        </div>
    </div>
</div>
<?php } ?>
<!-- //view modal -->