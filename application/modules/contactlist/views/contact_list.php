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

        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">For Your Information</h3> 
            </div>

            <div class="panel-body">
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-info-circle"></i> If you see contact lists data on these list below, please check marketing team email.
                </div>
            </div>
        </div>

        <!-- TABLE STRIPED -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Contact Lists</h3> 
            </div>

            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Post Date</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($msg_list)){
                                $no = 1;
                                foreach($msg_list as $row){               
                        ?>

                        <tr>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_contact;?>"><i class="lnr lnr-magnifier" title="View"></i></a>
                                </div>
                            </td>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->full_name; ?></td>
                            <td><a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
                            <td><?php echo tgl_indo($row->post_date_msg); ?></td>                    
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
                        <td><b>Post Date Message</b></td>
                        <td><?php echo tgl_indo($row->post_date_msg); ?></td>
                    </tr>
                    <tr>
                        <td><b>Post Time Message</b></td>
                        <td><?php echo $row->post_time_msg; ?></td>
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