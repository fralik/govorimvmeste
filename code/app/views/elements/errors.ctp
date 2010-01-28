<?php // views/elements/errors.ctp
if (!empty($errors)) { ?>
<div class="errors">
    <h3><?php 
	$str = __("validation_errors", true);;
	echo sprintf($str, count($errors));
	?></h3>
    
    <ul>
        <?php foreach ($errors as $field => $error) { ?>
        <li><?php echo __($error, true); ?></li>
        <?php } ?>
    </ul>
</div>
<?php } ?>