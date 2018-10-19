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
                <h3 class="panel-title">Archives</h3> 
            </div>

            <div class="panel-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                    <i class="lnr lnr-plus" ></i>
                    Add Archive
                </button>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Archive</th>
                            <th>Active</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($a_list)){
                                $no = 1;
                                foreach($a_list as $row){               
                        ?>

                        <tr>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_archive;?>"><i class="lnr lnr-magnifier" title="View"></i></a>                               
                                    <?php echo anchor('archivelist/archive_list/deleteData/'.$row->id_archive,'<i class="lnr lnr-trash" title="Delete"></i>'); ?>
                                </div>
                            </td>
                            <td><?php echo $no++; ?></td>
                            <td><a href='' data-toggle="modal" data-target="#edit<?=$row->id_archive;?>" title="Edit"><?php echo $row->nm_archive; ?></a></td>
                            <td><?php echo $row->isActiveArchive; ?></td>                            
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

<!-- add modal -->
<div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Archive</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url('archivelist/archive_list/actNew');?>" name="form1" method="post">
                    <div class="form-group">
                        <label>Archive</label>
                        <input type="text" name="archive" class="form-control" placeholder="" required/>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                        <button type="reset" class="btn btn-default" name="reset">Cancel</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- //add modal -->

<!-- edit modal -->
<?php foreach($a_list as $r): ?>
<div class="modal fade" id="edit<?php echo $r->id_archive;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Archive</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('archivelist/archive_list/updateData');?>" name="form1" method="post">
                    <input type="hidden" name="id" value="<?php echo $r->id_archive; ?>">
                    <div class="form-group">
                        <label>Archive</label>
                        <input type="text" name="archive" class="form-control" placeholder="" value="<?php echo $r->nm_archive; ?>" required/>
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Active</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="Y" type="radio" <?php echo set_value('Y', $r->isActiveArchive) == 'Y' ? "checked" : ""; ?> ><span><i></i>Yes</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="N" type="radio" <?php echo set_value('N', $r->isActiveArchive) == 'N' ? "checked" : ""; ?> ><span><i></i>No</span>
                        </label>
                    </div>

                    <div></div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="submit">Submit changes</button>
                        <button type="reset" class="btn btn-default" name="reset">Cancel</button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- //edit modal -->

<!-- view modal -->
<?php foreach($a_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->id_archive;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Archive</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Archive</b></td>
                        <td><?php echo $row->nm_archive; ?></td>
                    </tr>
                    <tr>
                        <td><b>Active</b></td>
                        <td><?php echo $row->isActiveArchive; ?></td>
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



















   
