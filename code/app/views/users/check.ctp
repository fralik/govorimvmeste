<form action="<?php echo $captcha_form_url; ?>" method="post"> 
<div>Verify :</div> 
<div><img src="<?php echo $captcha_image_url; ?>" id="captcha" alt="CAPTCHA Image" /></div> 
<div><input type="text" name="data[Contact][captcha_code]" size="10" maxlength="6" value="" /></div> 
<div><a href="#" onclick="document.getElementById('captcha').src = '<?php echo $this->webroot;?>contact/securimage/' + Math.random(); return false">Reload Image</a></div> 
<div style="color:red;"><?php echo $error_captcha; ?></div> 
<div style="color:green;"><?php echo $success_captcha; ?></div> 
<div><input type="submit" value="CLICK HERE TEST THE CAPTCHA" /></div> 
</form>