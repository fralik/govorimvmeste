<?php
$id = 0;
if (isset($this->passedArgs))
	$id = $this->passedArgs[0];
//print_r($user);
//print_r($email);
if (isset($email))
{
?><a href="mailto:<?php echo $email['User']['email']; ?>" ><?php echo $email['User']['email']; ?></a>
<?php
}
else
{
?>

<script>
RecaptchaOptions = new Object();
//RecaptchaOptions.lang = 'ru';
RecaptchaOptions.theme = 'clean';
</script>
<div class="users form">
<?php 
echo $form->create('User', array('url' => array('controller' => 'users', 'action' => 'email', $id)) );
//echo $form->create('User', array('action' => 'email', $id) );
//echo $form->create('User');
?>
	<fieldset>
 		<legend><?php __('Unhide email');?></legend>
	<p><?php __('unhide_disclaimer'); ?></p>
	<div style="width: 550px;">
	<?php
		$recaptcha->display_form('echo');
	?></div>
</fieldset>
<?php echo $form->end(__('Submit', true));?>
</div>
<?php } ?>