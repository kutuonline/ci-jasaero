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
                <h3 class="panel-title">News</h3> 
            </div>

            <div class="panel-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                    <i class="lnr lnr-plus" ></i>
                    Add News
                </a>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Headline</th>
                            <th>Vol/No/Magz</th>
                            <th>Archive</th>
                            <th>Active</th>                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if (!empty($n_list)){
                                $no = 1;
                                foreach($n_list as $row){               
                        ?>

                        <tr>
                            <td>
                                <div>
                                    <?php echo anchor('newslist/news_list/editData/'.$row->id_news,'<i class="lnr lnr-pencil" title="Edit"></i>'); ?>
                                
                                    <a href='' data-toggle="modal" data-target="#view<?=$row->id_news;?>"><i class="lnr lnr-magnifier" title="View"></i></a>                               
                                    <?php echo anchor('newslist/news_list/deleteData/'.$row->id_news,'<i class="lnr lnr-trash" title="Delete"></i>'); ?>
                                </div>
                            </td>
                            <td><?php echo $no++; ?></td>
                            <!--<td><a href='' data-toggle="modal" data-target="#edit<?=$row->id_news;?>"><?php //echo $row->headline; ?></a></td>-->
                            <td><?php echo $row->headline; ?></td>
                            <td><?php echo $row->vol_no_magz; ?></td>
                            <td><?php echo $row->nm_archive; ?></td>
                            <td><?php echo $row->isActiveNews; ?></td>                            
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
                <h4 class="modal-title">Add News</h4>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url('newslist/news_list/actNew');?>" name="form1" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Headline</label>
                        <input type="text" name="headln" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Vol/No/Magz</label>
                        <input type="text" name="vol_no" class="form-control" placeholder="" required/>
                    </div>

                    <div class="form-group">
                        <label>Archive</label>
                        <select class="form-control" name="nmarchive" required>
                            <option value=""></option>
                            <?php foreach($newslist as $rown){ ?>
                                <option value="<?=$rown->id_archive ?>"><?=$rown->nm_archive?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Image News</label>
                        <input type="file" name="fupload" placeholder=""/>
                        <p class="help-block">Image files must be in *.JPEG, *.JPG, *.PNG. File size does not exceed 2MB. Width 830px and height 550px.</p> 
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
<!--
<?php //foreach($n_list as $r): ?>
<div class="modal fade" id="edit<?php //echo $r->id_news;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit News</h4>
            </div>
            <div class="modal-body">

                <form action="<?php //echo base_url('newslist/news_list/updateData');?>" name="form1" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php //echo $r->id_news; ?>">
                    <div class="form-group">
                        <label>Headline</label>
                        <input type="text" name="headln" class="form-control" placeholder="" value="<?php //echo $r->headline; ?>" required/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" placeholder="" rows="4"><?php //echo $r->desc_news; ?></textarea>
                    </div>   

                    <div class="form-group">
                        <label>Vol/No/Magz</label>
                        <input type="text" name="vol_no" class="form-control" placeholder="" value="<?php //echo $r->vol_no_magz; ?>" required/>
                    </div>         

                    <div class="form-group">
                        <label>Archive</label>
                        <!-- selected value in dropdown list
                        <select class="form-control" name="archive">
                            <!-- selected value from dropdown list
                            <?php //foreach($n_list as $rowarchive){ ?>
                                <option value="<?=$rowarchive->id_archive ?>"><?=$rowarchive->nm_archive?></option>
                            <?php //} ?>

                            <!-- populate value to dropdown list
                            <option value=""></option>
                            <?php //foreach($n_list as $rowarchive){ ?>
                                <option value="<?=$rowarchive->id_archive ?>"><?=$rowarchive->nm_archive?></option>
                            <?php //} ?>
                        </select>
                    </div>        

                    <div class="form-group">
                        <label>Image News</label><br>
                        <?php //if($r->img_news != ''){ ?>
                            <!-- file img_news awal dibuat pada field hidden 
                            <input type="hidden" class="form-control" name="filelama" value="<?php //echo $r->img_news; ?>" />
                            <img src="<?=base_url()?>img_news/<?=$r->img_news?>" style="width:50%" >
                        <?php //} else { ?>
                            <img src="<?=base_url()?>img_news/image_not_available.jpg" style="width:50%" >
                        <?php //} ?>
                    </div>

                    <div class="form-group">
                        <label>Changes Image News</label>
                        <input type="file" name="fupload" placeholder=""/>
                        <p class="help-block">Image files must be in *.JPEG, *.JPG, *.PNG. File size does not exceed 2MB. Width 830px and height 550px.</p> 
                    </div>

                    <div class="form-group">
                        <label>Active</label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="Y" type="radio" <?php //echo set_value('Y', $r->isActiveNews) == 'Y' ? "checked" : ""; ?> ><span><i></i>Yes</span>
                        </label>
                    </div>
                    <div class="form-group" >
                        <label class="fancy-radio">
                            <input name="aktif" value="N" type="radio" <?php //echo set_value('N', $r->isActiveNews) == 'N' ? "checked" : ""; ?> ><span><i></i>No</span>
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
-->
<?php //endforeach; ?>
<!-- //edit modal -->

<!-- view modal -->
<?php foreach($n_list as $row){ ?>
<div class="modal fade" id="view<?php echo $row->id_news;?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Details News</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped">
                    <tr>
                        <td><b>Archive</b></td>
                        <td><?php echo $row->nm_archive; ?></td>
                    </tr>
                    <tr>
                        <td><b>Headline</b></td>
                        <td><?php echo $row->headline; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td><?php echo $row->desc_news; ?></td>
                    </tr>
                    <tr>
                        <td><b>Vol/No/Magz</b></td>
                        <td><?php echo $row->vol_no_magz; ?></td>
                    </tr>
                    <tr>
                        <td><b>Image News</b></td>
                        <td>
                            <?php if($row->img_news != ''){ ?>
                                <img src="<?=base_url()?>img_news/<?=$row->img_news?>" style="width:50%" >
                            <?php } else { ?>
                                <img src="<?=base_url()?>img_news/image_not_available.jpg" style="width:50%" >
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Active</b></td>
                        <td><?php echo $row->isActiveNews; ?></td>
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












   
