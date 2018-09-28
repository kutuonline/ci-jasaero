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
                <h3 class="panel-title">Services</h3> 
            </div>

            <div class="panel-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                    <i class="lnr lnr-plus" ></i>
                    Add Service
                </a>
            </div>

            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Title</th>
                            <th>Active</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($serv_list)){
                                $no = 1;
                                foreach($serv_list as $row){               
                        ?>

                        <tr>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_service;?>"><i class="lnr lnr-magnifier" title="View"></i></a>                               
                                    <?php echo anchor('servicelist/service_list/deleteData/'.$row->id_service,'<i class="lnr lnr-trash" title="Delete"></i>'); ?>
                                </div>
                            </td>
                            <td><?php echo $no++; ?></td>
                            <td><a href='' data-toggle="modal" data-target="#edit<?=$row->id_service;?>" title="Edit"><?php echo $row->title; ?></a></td>
                            <td><?php echo $row->isActiveService; ?></td>                            
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
                <h4 class="modal-title">Add Service</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url('servicelist/service_list/actNew');?>" name="form1" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Details Content</label>
                        <textarea name="detail" class="form-control" placeholder="" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Image Service</label>
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
<?php foreach($serv_list as $r): ?>
<div class="modal fade" id="edit<?php echo $r->id_service;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Service</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('servicelist/service_list/updateData');?>" name="form1" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $r->id_service; ?>">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="" value="<?php echo $r->title; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"><?php echo $r->desc_service; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Details Content</label>
                        <textarea name="detail" class="form-control" placeholder="" rows="4"><?php echo $r->detail_service; ?></textarea>
                    </div>           

                    <div class="form-group">
                        <label>Image Service</label><br>
                        <?php if($r->img_service != ''){ ?>
                            <!-- file img_service awal dibuat pada field hidden -->
                            <input type="hidden" class="form-control" name="filelama" value="<?php echo $r->img_service; ?>" />
                            <img src="<?=base_url()?>img_service/<?=$r->img_service?>" style="width:50%" >
                        <?php } else { ?>
                            <img src="<?=base_url()?>img_service/image_not_available.jpg" style="width:50%" >
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Changes Image Service</label>
                        <input type="file" name="fupload" placeholder=""/>
                        <p class="help-block">Image files must be in *.JPEG, *.JPG, *.PNG. File size does not exceed 2MB.</p> 
                    </div>

                    <div class="form-group">
                        <label>Active</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="Y" type="radio" <?php echo set_value('Y', $r->isActiveService) == 'Y' ? "checked" : ""; ?> ><span><i></i>Yes</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="N" type="radio" <?php echo set_value('N', $r->isActiveService) == 'N' ? "checked" : ""; ?> ><span><i></i>No</span>
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
<?php foreach($serv_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->id_service;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Service</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Title</b></td>
                        <td><?php echo $row->title; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td><?php echo $row->desc_service; ?></td>
                    </tr>
                    <tr>
                        <td><b>Details Content</b></td>
                        <td><?php echo $row->detail_service; ?></td>
                    </tr>
                    <tr>
                        <td><b>Image Service</b></td>
                        <td>
                            <?php if($row->img_service != ''){ ?>
                                <img src="<?=base_url()?>img_service/<?=$row->img_service?>" style="width:50%" >
                            <?php } else { ?>
                                <img src="<?=base_url()?>img_service/image_not_available.jpg" style="width:50%" >
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Active</b></td>
                        <td><?php echo $row->isActiveService; ?></td>
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












   
