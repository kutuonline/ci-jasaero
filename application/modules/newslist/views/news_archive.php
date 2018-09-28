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
                <h3 class="panel-title">Edit News</h3> 
            </div>

            <div class="panel-body">

                <!-- edit modal -->
                <?php foreach($l_archive as $r): ?>

                    <form action="<?php echo base_url('newslist/news_list/updateData');?>" name="form1" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" value="<?php echo $r->id_news; ?>">
                        <div class="form-group">
                            <label>Headline</label>
                            <input type="text" name="headln" class="form-control" placeholder="" value="<?php echo $r->headline; ?>" required/>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="desc" class="form-control" placeholder="" rows="4"><?php echo $r->desc_news; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Vol/No/Magz</label>
                            <input type="text" name="vol_no" class="form-control" placeholder="" value="<?php echo $r->vol_no_magz; ?>" required/>
                        </div>

                        <div class="form-group">
                            <label>Archive</label>
                            <!-- selected value in dropdown list -->
                            <select class="form-control" name="nmarchive">
                                <!-- selected value from dropdown list-->
                                <?php foreach($l_archive as $rowarchive){ ?>
                                    <option value="<?=$rowarchive->id_archive ?>"><?=$rowarchive->nm_archive?></option>
                                <?php } ?>

                                <!-- populate value to dropdown list -->
                                <option value=""></option>
                                <?php foreach($newslist as $rowarchive){ ?>
                                    <option value="<?=$rowarchive->id_archive ?>"><?=$rowarchive->nm_archive?></option>
                                <?php } ?>
                            </select>
                        </div>    

                        <div class="form-group">
                            <label>Image News</label><br>
                            <?php if($r->img_news != ''){ ?>
                                <!-- file img_news awal dibuat pada field hidden -->
                                <input type="hidden" class="form-control" name="filelama" value="<?php echo $r->img_news; ?>" />
                                <img src="<?=base_url()?>img_news/<?=$r->img_news?>" style="width:50%" >
                            <?php } else { ?>
                                <img src="<?=base_url()?>img_news/image_not_available.jpg" style="width:50%" >
                            <?php } ?>
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
                                <input name="aktif" value="Y" type="radio" <?php echo set_value('Y', $r->isActiveNews) == 'Y' ? "checked" : ""; ?> ><span><i></i>Yes</span>
                            </label>
                        </div>
                        <div class="form-group" >
                            <label class="fancy-radio">
                                <input name="aktif" value="N" type="radio" <?php echo set_value('N', $r->isActiveNews) == 'N' ? "checked" : ""; ?> ><span><i></i>No</span>
                            </label>
                        </div>

                        <div></div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="submit">Submit changes</button>
                            <button type="reset" class="btn btn-default" name="reset" onclick='self.history.back();'>Cancel</button>
                        </div>
                    </form>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>