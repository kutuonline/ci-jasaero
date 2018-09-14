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
                <h3 class="panel-title">Data Menu </h3> 
            </div>

            <div class="panel-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                    <i class="lnr lnr-plus" ></i>
                    Add Menu
                </a>
            </div>

            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <!--<th>Parent</th>-->
                            <th>Menu</th>
                            <th>Link</th>
                            <!--<th>Order No.</th>
                            <th>Is Main Menu</th>-->
                            <th>Active</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($mnutama_list)){
                                $no = 1;
                                foreach($mnutama_list as $row){               
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <!--<td><?php //echo $row->id_mnUtama; ?></td>-->
                            <td><a href='' data-toggle="modal" data-target="#edit<?=$row->id_mnUtama;?>"><?php echo $row->label_mnUtama; ?></a></td>
                            <td><?php echo $row->link; ?></td>
                            <!--<td><?php //echo $row->order_mnUtama; ?></td>
                            <td><?php //echo $row->isMainMenu; ?></td>-->
                            <td><?php echo $row->isActiveMnUtama; ?></td>
                            <td><?php echo $row->icon_mnUtama; ?></td>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_mnUtama;?>"><i class="lnr lnr-magnifier"></i></a>
                                    <?php echo anchor('menu_utama/mnutama_list/deleteData/'.$row->id_mnUtama,'<i class="lnr lnr-trash"></i>'); ?>
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
                <h4 class="modal-title">Add Main Menu</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('menu_utama/mnutama_list/actNew');?>" name="form1" method="post">
                    <div class="form-group">
                        <label>Label of Menu</label>
                        <input type="text" name="label" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" placeholder="" required/>
                        <p class="help-block">Ex: dashboard/dashboard (controller/action).</p>
                    </div>

                    <!--
                    <div class="form-group">
                        <label>Order No.</label>
                        <input type="text" name="order" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Is Main Menu</label>
                        <input type="text" name="menu" class="form-control" placeholder="" required/>
                        <p class="help-block">Input 0 for main menu, other else for submenu.</p>
                    </div>
                    -->

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="icon" class="form-control" placeholder="" />
                        <p class="help-block">Ex: lnr lnr-home. More info please visit https://linearicons.com/free.</p>
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
<?php foreach($mnutama_list as $r): ?>
<div class="modal fade" id="edit<?php echo $r->id_mnUtama;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Main Menu</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('menu_utama/mnutama_list/updateData');?>" name="form1" method="post">
                    <input type="hidden" name="id" value="<?php echo $r->id_mnUtama; ?>">
                    <div class="form-group">
                        <label>Menu</label>
                        <input type="text" name="label" class="form-control" placeholder="" value="<?php echo $r->label_mnUtama; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" placeholder="" value="<?php echo $r->link; ?>" required/>
                        <p class="help-block">Ex: dashboard/dashboard (controller/action).</p>
                    </div>

                    <!--
                    <div class="form-group">
                        <label>Order No.</label>
                        <input type="text" name="order" class="form-control" placeholder="" value="<?php echo $r->order_mnUtama; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Is Main Menu</label>
                        <input type="text" name="menu" class="form-control" placeholder="" value="<?php echo $r->isMainMenu; ?>" required/>
                        <p class="help-block">Input 0 for main menu, other else for submenu.</p>
                    </div>
                    -->

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="icon" class="form-control" placeholder="" value="<?php echo $r->icon_mnUtama; ?>"/>
                        <p class="help-block">Ex: lnr lnr-home. More info please visit https://linearicons.com/free.</p>
                    </div>

                    <div class="form-group">
                        <label>Is Active</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="Y" type="radio" <?php echo set_value('Y', $r->isActiveMnUtama) == 'Y' ? "checked" : ""; ?> ><span><i></i>Yes</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="N" type="radio" <?php echo set_value('N', $r->isActiveMnUtama) == 'N' ? "checked" : ""; ?> ><span><i></i>No</span>
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
<?php foreach($mnutama_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->id_mnUtama;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Main Menu</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Parent</b></td>
                        <td><?php echo $row->id_mnUtama; ?></td>
                    </tr>
                    <tr>
                        <td><b>Label of Menu</b></td>
                        <td><?php echo $row->label_mnUtama; ?></td>
                    </tr>
                    <tr>
                        <td><b>Link</b></td>
                        <td><?php echo $row->link; ?></td>
                    </tr>
                    <!--
                    <tr>
                        <td><b>Order No.</b></td>
                        <td><?php //echo $row->order_mnUtama; ?></td>
                    </tr>
                    <tr>
                        <td><b>Is Main Menu</b></td>
                        <td><?php //echo $row->isMainMenu; ?></td>
                    </tr>
                    -->
                    <tr>
                        <td><b>Active</b></td>
                        <td><?php echo $row->isActiveMnUtama; ?></td>
                    </tr>
                    <tr>
                        <td><b>Icon</b></td>
                        <td><?php echo $row->icon_mnUtama; ?></td>
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