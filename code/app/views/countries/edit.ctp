<div class="countries form">
<?php echo $form->create('Country');?>
	<fieldset>
 		<legend><?php echo 'Edit Country';?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Delete', array('action' => 'delete', $form->value('Country.id')), null, sprintf('Are you sure you want to delete # %s?', $form->value('Country.id'))); ?></li>
		<li><?php echo $html->link('List Countries', array('action' => 'index'));?></li>
		<li><?php echo $html->link('List Cities', array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New City', array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
