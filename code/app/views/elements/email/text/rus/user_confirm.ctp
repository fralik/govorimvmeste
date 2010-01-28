<?php
# /app/views/elements/email/text/rus/user_confirm.ctp
?>
Уважаемый(ая) <?php echo $user_name; ?>,

спасибо за регистрацию на сайте «<?php echo $project_name; ?>». Для завершения регистрации вам необходимо активировать свой профиль.
Вы можете это сделать, перейдя по ссылке: 
<?php echo $activate_url; ?>


Проигнорируйте это письмо, если вы не регистрировались на сайте «<?php echo $project_name; ?>».

С уважением,
команда разработчиков сайта «<?php echo $project_name; ?>».
