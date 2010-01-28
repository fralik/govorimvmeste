<div class="languages form">
<?php echo $form->create('Language');?>
	<fieldset>
 		<legend><?php echo 'Add Language';?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('User');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('List Languages', array('action' => 'index'));?></li>
		<li><?php echo $html->link('List Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New User', array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
