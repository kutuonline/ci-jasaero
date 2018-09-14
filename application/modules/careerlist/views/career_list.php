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
                <h3 class="panel-title">Career</h3> 
            </div>

            <div class="panel-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                    <i class="lnr lnr-plus" ></i>
                    Add Career
                </button>
            </div>

            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Closing Date</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($c_list)){
                                $no = 1;
                                foreach($c_list as $row){               
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><a href='' data-toggle="modal" data-target="#edit<?=$row->id_career;?>"><?php echo $row->title_career; ?></a></td>
                            <td><?php echo tgl_indo($row->closing_date); ?></td>
                            <td><?php echo $row->isActiveCareer; ?></td>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_career;?>"><i class="lnr lnr-magnifier"></i></a>                               
                                    <?php echo anchor('careerlist/career_list/deleteData/'.$row->id_career,'<i class="lnr lnr-trash"></i>'); ?>
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
                <h4 class="modal-title">Add Career</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url('careerlist/career_list/actNew');?>" name="form1" method="post">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"></textarea>
                    </div>

                    <label>Closing Date</label>
                    <div class="input-group">
                        <input type="text" name="tgl" id="tanggal" class="form-control" placeholder="" />
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
<?php foreach($c_list as $r): ?>
<div class="modal fade" id="edit<?php echo $r->id_career;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Career</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('careerlist/career_list/updateData');?>" name="form1" method="post">
                    <input type="hidden" name="id" value="<?php echo $r->id_career; ?>">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="" value="<?php echo $r->title_career; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"><?php echo $r->desc_career; ?></textarea>
                    </div>   

                    <label>Closing Date</label>
                    <div class="input-group">
                        <input type="text" name="tgl" id="tanggal1" class="form-control" placeholder="" value="<?php echo $r->closing_date; ?>" />
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Active</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="Y" type="radio" <?php echo set_value('Y', $r->isActiveCareer) == 'Y' ? "checked" : ""; ?> ><span><i></i>Yes</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="N" type="radio" <?php echo set_value('N', $r->isActiveCareer) == 'N' ? "checked" : ""; ?> ><span><i></i>No</span>
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
<?php foreach($c_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->id_career;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Career</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Title</b></td>
                        <td><?php echo $row->title_career; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td><?php echo $row->desc_career; ?></td>
                    </tr>
                    <tr>
                        <td><b>Closing Date</b></td>
                        <td><?php echo tgl_indo($row->closing_date); ?></td>
                    </tr>
                    <tr>
                        <td><b>Active</b></td>
                        <td><?php echo $row->isActiveCareer; ?></td>
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



















   
