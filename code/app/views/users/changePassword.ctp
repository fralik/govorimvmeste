<?php
$session->flash('auth');
?>
<h2>Login</h2>
<?php
echo $form->create('User', array('action' => 'login'));
echo $form->input('User.email');
echo $form->input('User.password');

echo $form->end('Login');
?>

