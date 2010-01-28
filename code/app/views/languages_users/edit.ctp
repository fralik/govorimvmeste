<div class="languagesUsers form">
<?php echo $form->create('LanguagesUser');?>
	<fieldset>
 		<legend><?php __('Edit LanguagesUser');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('language_id');
		echo $form->input('user_id');
		echo $form->input('offer');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('LanguagesUser.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('LanguagesUser.id'))); ?></li>
		<li><?php echo $html->link(__('List LanguagesUsers', true), array('action' => 'index'));?></li>
	</ul>
</div>
