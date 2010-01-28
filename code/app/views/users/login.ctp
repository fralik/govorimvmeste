<?php
$session->flash();
$session->flash('auth');
?>
<h2><?php __('Sign in to LanguageDuo with your account'); ?></h2>
<?php
echo $form->create('User', array('action' => 'login'));
echo $form->input('User.email');
echo $form->input('User.password');
echo $form->input('remember_me', array('label' => __('Remember_label', true), 'type' => 'checkbox'));

echo $form->end(__('Sign in', true));
?>

