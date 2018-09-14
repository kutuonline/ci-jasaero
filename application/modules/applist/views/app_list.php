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
                <h3 class="panel-title">Applications</h3> 
            </div>

            <div class="panel-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                    <i class="lnr lnr-plus" ></i>
                    Add Application
                </button>
            </div>

            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Application Name</th>
                            <th>URL</th>
                            <th>Icon</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($app_list)){
                                $no = 1;
                                foreach($app_list as $row){               
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><a href='' data-toggle="modal" data-target="#edit<?=$row->id_app;?>" title='Edit'><?php echo $row->app_name; ?></a></td>
                            <td><a href='<?php echo $row->app_url; ?>' target='_blank' title='Open Application'><?php echo $row->app_url; ?></a></td>
                            <td><?php echo $row->app_icon; ?></td>
                            <td><?php echo $row->isActiveApp; ?></td>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_app;?>" title="View"><i class="lnr lnr-magnifier"></i></a>                               
                                    <?php echo anchor('applist/app_list/deleteData/'.$row->id_app,'<i class="lnr lnr-trash"></i>'); ?>
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
                <h4 class="modal-title">Add Application</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url('applist/app_list/actNew');?>" name="form1" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Application Name</label>
                        <input type="text" name="appNm" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" name="url" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="icon" class="form-control" placeholder=""/>
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
<?php foreach($app_list as $r): ?>
<div class="modal fade" id="edit<?php echo $r->id_app;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Application</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('applist/app_list/updateData');?>" name="form1" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $r->id_app; ?>">
                    <div class="form-group">
                        <label>Application Name</label>
                        <input type="text" name="appNm" class="form-control" placeholder="" value="<?php echo $r->app_name; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"><?php echo $r->app_desc; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" name="url" class="form-control" placeholder="" value="<?php echo $r->app_url; ?>" required/>
                    </div>   

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="icon" class="form-control" placeholder="" value="<?php echo $r->app_icon; ?>"/>
                    </div>                 

                    <div class="form-group">
                        <label>Active</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="Y" type="radio" <?php echo set_value('Y', $r->isActiveApp) == 'Y' ? "checked" : ""; ?> ><span><i></i>Yes</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="N" type="radio" <?php echo set_value('N', $r->isActiveApp) == 'N' ? "checked" : ""; ?> ><span><i></i>No</span>
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
<?php foreach($app_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->id_app;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Application</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Application Name</b></td>
                        <td><?php echo $row->app_name; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td><?php echo $row->app_desc; ?></td>
                    </tr>
                    <tr>
                        <td><b>URL</b></td>
                        <td><?php echo $row->app_url; ?></td>
                    </tr>
                    <tr>
                        <td><b>Icon</b></td>
                        <td><?php echo $row->app_icon; ?></td>
                    </tr>
                    <tr>
                        <td><b>Active</b></td>
                        <td><?php echo $row->isActiveApp; ?></td>
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












   
