<?php
$session->flash('auth');
?>
<h2><?php //__('Not ready yet'); ?></h2>
<h2><?php __('Reset password');?></h2>
<?php
echo $form->create('User', array('action' => 'forgot'));
echo $form->input('User.email');

echo $form->end(__('Get new password', true));
?>

