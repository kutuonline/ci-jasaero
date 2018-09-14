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
                <h3 class="panel-title">Facility</h3> 
            </div>

            <div class="panel-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                    <i class="lnr lnr-plus" ></i>
                    Add Facility
                </button>
            </div>

            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($f_list)){
                                $no = 1;
                                foreach($f_list as $row){               
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><a href='' data-toggle="modal" data-target="#edit<?=$row->id_facility;?>"><?php echo $row->facility_name; ?></a></td>
                            <td><?php echo $row->isActiveFacility; ?></td>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_facility;?>"><i class="lnr lnr-magnifier"></i></a>                               
                                    <?php echo anchor('facility/facility_list/deleteData/'.$row->id_facility,'<i class="lnr lnr-trash"></i>'); ?>
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

<!-- add modal -->
<div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Facility</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url('facility/facility_list/actNew');?>" name="form1" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Facility Name</label>
                        <input type="text" name="facility" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Image Facility</label>
                        <input type="file" name="fupload" placeholder=""/>
                        <p class="help-block">Image files must be in *.JPEG, *.JPG, *.PNG. File size does not exceed 2MB.</p> 
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
<?php foreach($f_list as $r): ?>
<div class="modal fade" id="edit<?php echo $r->id_facility;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Facility</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('facility/facility_list/updateData');?>" name="form1" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $r->id_facility; ?>">
                    <div class="form-group">
                        <label>Facility Name</label>
                        <input type="text" name="facility" class="form-control" placeholder="" value="<?php echo $r->facility_name; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"><?php echo $r->desc_facility; ?></textarea>
                    </div>                    

                    <div class="form-group">
                        <label>Image Facility</label><br>
                        <?php if($r->img_facility != ''){ ?>
                            <!-- file img_facility awal dibuat pada field hidden -->
                            <input type="hidden" class="form-control" name="filelama" value="<?php echo $r->img_facility; ?>" />
                            <img src="<?=base_url()?>img_facility/<?=$r->img_facility?>" style="width:50%" >
                        <?php } else { ?>
                            <img src="<?=base_url()?>img_facility/image_not_available.jpg" style="width:50%" >
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Changes Image Facility</label>
                        <input type="file" name="fupload" placeholder=""/>
                        <p class="help-block">Image files must be in *.JPEG, *.JPG, *.PNG. File size does not exceed 2MB.</p> 
                    </div>

                    <div class="form-group">
                        <label>Active</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="Y" type="radio" <?php echo set_value('Y', $r->isActiveFacility) == 'Y' ? "checked" : ""; ?> ><span><i></i>Yes</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="N" type="radio" <?php echo set_value('N', $r->isActiveFacility) == 'N' ? "checked" : ""; ?> ><span><i></i>No</span>
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
<?php foreach($f_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->id_facility;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Facility</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>FAcility Name</b></td>
                        <td><?php echo $row->facility_name; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td><?php echo $row->desc_facility; ?></td>
                    </tr>
                    <tr>
                        <td><b>Image Facility</b></td>
                        <td>
                            <?php if($row->img_facility != ''){ ?>
                                <img src="<?=base_url()?>img_facility/<?=$row->img_facility?>" style="width:50%" >
                            <?php } else { ?>
                                <img src="<?=base_url()?>img_facility/image_not_available.jpg" style="width:50%" >
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Active</b></td>
                        <td><?php echo $row->isActiveFacility; ?></td>
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












   
