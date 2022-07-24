<?php echo form_open_multipart(); ?>

<input type="file" name="photo">
<input type="submit" name="submit" value="submit">
<?php echo form_close(); ?>


<?php
if(  isset($error)  ){
    echo 'your file not uploaded';
}

if( isset($success)  ){
    echo 'your file has been uploaded';
}
?>