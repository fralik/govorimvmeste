<div class="languagesUsers form">
<?php echo $form->create('LanguagesUser');?>
	<fieldset>
 		<legend><?php echo 'Add LanguagesUser';?></legend>
	<?php
		echo $form->input('language_id');
		echo $form->input('user_id');
		echo $form->input('offer');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('List LanguagesUsers', array('action' => 'index'));?></li>
	</ul>
</div>
