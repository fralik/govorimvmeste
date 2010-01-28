<div class="languagesUsers index">
<h2><?php __('LanguagesUsers');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('language_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('offer');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($languagesUsers as $languagesUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $languagesUser['LanguagesUser']['id']; ?>
		</td>
		<td>
			<?php echo $languagesUser['LanguagesUser']['language_id']; ?>
		</td>
		<td>
			<?php echo $languagesUser['LanguagesUser']['user_id']; ?>
		</td>
		<td>
			<?php echo $languagesUser['LanguagesUser']['offer']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $languagesUser['LanguagesUser']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $languagesUser['LanguagesUser']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $languagesUser['LanguagesUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $languagesUser['LanguagesUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New LanguagesUser', true), array('action' => 'add')); ?></li>
	</ul>
</div>
