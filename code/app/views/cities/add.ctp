<div class="cities form">
<?php echo $form->create('City');?>
	<fieldset>
 		<legend><?php echo 'Add City';?></legend>
	<?php
		echo $form->input('country_id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('List Cities', array('action' => 'index'));?></li>
		<li><?php echo $html->link('List Countries', array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New Country', array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link('List Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New User', array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
