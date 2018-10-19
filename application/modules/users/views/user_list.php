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
                <h3 class="panel-title">Users</h3> 
            </div>

            <div class="panel-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                    <i class="lnr lnr-plus" ></i>
                    Add User
                </a>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Complete Name</th>
                            <th>Email</th>
                            <th>Active</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($u_list)){
                                $no = 1;
                                foreach($u_list as $row){               
                        ?>

                        <tr>
                            <td>
                                <div>
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->users_id;?>"><i class="lnr lnr-magnifier" title="View"></i></a>                               
                                    <?php echo anchor('users/user_list/deleteData/'.$row->users_id,'<i class="lnr lnr-trash" title="Delete"></i>'); ?>
                                </div>
                            </td>
                            <td><?php echo $no++; ?></td>
                            <td><a href='' data-toggle="modal" data-target="#edit<?=$row->users_id;?>" title="Edit"><?php echo $row->complete_name; ?></a></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->is_active_users; ?></td>                            
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
                <h4 class="modal-title">Add User</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url('users/user_list/actNew');?>" name="form1" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Complete Name</label>
                        <input type="text" name="completenm" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="passwd" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                    </div>
                    <div class="form-group col-md-6" >
                        <label class="fancy-radio">
                            <input name="gender" value="M" type="radio"><span><i></i>Male</span>
                        </label>
                    </div>
                    <div class="form-group col-md-6" >
                        <label class="fancy-radio">
                            <input name="gender" value="F" type="radio"><span><i></i>Female</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Phone No.</label>
                        <input type="text" name="phone_no" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Ex: jhon@mail.com" required/>
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="foto" placeholder="" required/>
                        <p class="help-block">Photo files must be in *.JPEG, *.JPG, *.PNG. File size does not exceed 2MB.</p> 
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
<?php foreach($u_list as $r): ?>
<div class="modal fade" id="edit<?php echo $r->users_id;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Users</h4>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('users/user_list/updateData');?>" name="form1" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $r->users_id; ?>">
                    <div class="form-group">
                        <label>Complete Name</label>
                        <input type="text" name="completenm" class="form-control" placeholder="" value="<?php echo $r->complete_name; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="passwd" class="form-control" placeholder="" value="<?php echo $r->pass_encrypt; ?>" required readonly/>
                        <p class="help-block">Avoid password with date of birth.</p>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="gender" value="M" type="radio" <?php echo set_value('M', $r->gender) == 'M' ? "checked" : ""; ?> ><span><i></i>Male</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="gender" value="F" type="radio" <?php echo set_value('F', $r->gender) == 'F' ? "checked" : ""; ?> ><span><i></i>Female</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Phone No.</label>
                        <input type="text" name="phone_no" class="form-control" placeholder="" value="<?php echo $r->phone_no; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="" value="<?php echo $r->email; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Photo</label><br>
                        <?php if($r->photo != ''){ ?>
                            <!-- file img_user awal dibuat pada field hidden -->
                            <input type="hidden" class="form-control" name="filelama" value="<?php echo $r->photo; ?>" />
                            <img src="<?=base_url()?>img_user/<?=$r->photo?>" style="width:50%" >
                        <?php } else { ?>
                            <img src="<?=base_url()?>img_user/image_not_available.jpg" style="width:50%" >
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Changes Photo</label>
                        <input type="file" name="foto" placeholder=""/>
                        <p class="help-block">Photo files must be in *.JPEG, *.JPG, *.PNG. File size does not exceed 2MB.</p> 
                    </div>

                    <div class="form-group">
                        <label>Users Level</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="ulevel" value="Sadmin" type="radio" <?php echo set_value('Sadmin', $r->users_level) == 'Sadmin' ? "checked" : ""; ?> ><span><i></i>Super Admin</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="ulevel" value="Admin" type="radio" <?php echo set_value('Admin', $r->users_level) == 'Admin' ? "checked" : ""; ?> ><span><i></i>Admin</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="ulevel" value="User" type="radio" <?php echo set_value('User', $r->users_level) == 'User' ? "checked" : ""; ?> ><span><i></i>User</span>
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
<?php foreach($u_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->users_id;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details Users</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Complete Name</b></td>
                        <td><?php echo $row->complete_name; ?></td>
                    </tr>
                    <tr>
                        <td><b>Gender</b></td>
                        <td><?php echo $row->gender; ?></td>
                    </tr>
                    <tr>
                        <td><b>Phone No.</b></td>
                        <td><?php echo $row->phone_no; ?></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><?php echo $row->email; ?></td>
                    </tr>
                    <tr>
                        <td><b>Photo</b></td>
                        <td>
                            <?php if($row->photo != ''){ ?>
                                <img src="<?=base_url()?>img_user/<?=$row->photo?>" style="width:50%" >
                            <?php } else { ?>
                                <img src="<?=base_url()?>img_user/image_not_available.jpg" style="width:50%" >
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Users Level</b></td>
                        <td><?php echo $row->users_level; ?></td>
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









   
