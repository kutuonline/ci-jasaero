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
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Web Identity</h3>
    </div>
    <div class="panel-body">

        <?php
            if (!empty($w_list)){
                $no = 1;
                foreach($w_list as $row){               
        ?>

        <form action="<?php echo base_url('id_web/web_list/updateData');?>" name="form1" method="post">
            <input type='hidden' name='id' value="<?php echo $row->id_identitas; ?>" >
            
            <div class="form-group">
                <label>Website Name</label>
                <input type="text" name="website_nm" class="form-control" placeholder="" value="<?php echo $row->website_name; ?>"/>
            </div>

            <div class="form-group">
                <label>Department</label>
                <input type="text" name="department" class="form-control" placeholder="" value="<?php echo $row->department; ?>"/>
            </div>

            <div class="form-group">
                <label>Corporate Name</label>
                <input type="text" name="corporate_nm" class="form-control" placeholder="" value="<?php echo $row->corp_name; ?>"/>
            </div>

            <div class="form-group">
                <label>Corporate Address</label>
                <textarea name="address" class="form-control" placeholder="" rows="4"><?php echo strip_tags($row->corp_address); ?></textarea>
            </div>

            <div class="form-group">
                <label>Postal Code</label>
                <input type="text" name="postalcode" class="form-control" placeholder="" value="<?php echo $row->postal_code; ?>"/>
            </div>

            <div class="form-group">
                <label>Phone No</label>
                <input type="text" name="phone" class="form-control" placeholder="" value="<?php echo $row->phone_no; ?>"/>
            </div>

            <div class="form-group">
                <label>Fax No</label>
                <input type="text" name="fax" class="form-control" placeholder="" value="<?php echo $row->fax_no; ?>"/>
            </div>

            <div class="form-group">
                <label>PIC Email #1</label>
                <input type="text" name="picemail1" class="form-control" placeholder="" value="<?php echo $row->pic_email1; ?>"/>
            </div>

            <div class="form-group">
                <label>Email #1</label>
                <input type="email" name="email1" class="form-control" placeholder="" value="<?php echo $row->email1; ?>"/>
            </div>

            <div class="form-group">
                <label>PIC Email #2</label>
                <input type="text" name="picemail2" class="form-control" placeholder="" value="<?php echo $row->pic_email2; ?>"/>
            </div>

            <div class="form-group">
                <label>Email #2</label>
                <input type="email" name="email2" class="form-control" placeholder="" value="<?php echo $row->email2; ?>"/>
            </div>

            <div class="form-group">
                <label>PIC Email #3</label>
                <input type="text" name="picemail3" class="form-control" placeholder="" value="<?php echo $row->pic_email3; ?>"/>
            </div>

            <div class="form-group">
                <label>Email #3</label>
                <input type="email" name="email3" class="form-control" placeholder="" value="<?php echo $row->email3; ?>"/>
            </div>

            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" class="form-control" placeholder="https://" value="<?php echo $row->url; ?>"/>
            </div>

            <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="fb" class="form-control" placeholder="" value="<?php echo $row->facebook; ?>"/>
            </div>

            <div class="form-group">
                <label>Twitter</label>
                <input type="text" name="twitter" class="form-control" placeholder="" value="<?php echo $row->twitter; ?>"/>
            </div>

            <div class="form-group">
                <label>Instagram</label>
                <input type="text" name="ig" class="form-control" placeholder="" value="<?php echo $row->instagram; ?>"/>
            </div>

            <div class="form-group">
                <label>Welcome Note</label>
                <textarea name="wnote" class="form-control" placeholder="" rows="4"><?php echo strip_tags($row->welcome_note); ?></textarea>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="desc" class="form-control" placeholder="" rows="4"><?php echo strip_tags($row->meta_desc); ?></textarea>
            </div>

            <div class="form-group">
                <label>Keyword</label>
                <textarea name="key" class="form-control" placeholder="" rows="4"><?php echo strip_tags($row->meta_keyword); ?></textarea>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="submit">Submit changes</button>
                <button type="reset" class="btn btn-default" name="reset" onclick="self.history.back();">Cancel</button>
            </div>
        </form>

        <?php } } ?>

    </div>
</div>