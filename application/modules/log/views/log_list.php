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
                <h3 class="panel-title">Logs</h3> 
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Log Time</th>
                            <th>User</th>
                            <th>Log Type</th>
                            <th>Description</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($loglist)){
                                $no = 1;
                                foreach($loglist as $row){               
                        ?>

                        <tr>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->log_id;?>"><i class="lnr lnr-magnifier" title="View"></i></a>                               
                                    <?php //echo anchor('careerlist/career_list/deleteData/'.$row->id_career,'<i class="lnr lnr-trash" title="Delete"></i>'); ?>
                                </div>
                            </td>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->log_time; ?></a></td>
                            <td><?php echo $row->log_user; ?></td>
                            <td><?php echo $row->log_tipe; ?></td>
                            <td><?php echo $row->log_desc; ?></td>                            
                        </tr>

                        <?php } ?>
                        <?php } ?>
                    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- END TABLE STRIPED -->
    </div>
</div>
<!-- //content -->

<!-- view modal -->
<?php foreach($loglist as $row){ ?>
<div class="modal fade" id="view<?php echo $row->log_id;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Logs</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Log Time</b></td>
                        <td><?php echo $row->log_time; ?></td>
                    </tr>
                    <tr>
                        <td><b>Log User</b></td>
                        <td><?php echo $row->log_user; ?></td>
                    </tr>
                    <tr>
                        <td><b>Log Type</b></td>
                        <td><?php echo $row->log_tipe; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td><?php echo $row->log_desc; ?></td>
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