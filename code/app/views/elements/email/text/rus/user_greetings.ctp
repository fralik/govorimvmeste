<?php
# /app/views/elements/email/text/rus/user_greetings.ctp
?>
Уважаемый(ая) <?php echo $user_name; ?>,

вы успешно подтвердили свой адрес электронной почты.
Вы можете просмотреть свой профиль по адресу <?php echo $site_address; ?>users/view/<?php echo $user_id; ?> .
Вы всегда можете удалить все данные о себе, посетив ссылку <?php echo $site_address; ?>users/delete/<?php echo $user_id; ?> .

Надеемся, что сайт «<?php echo $project_name; ?>» поможет вам в изучении новых языков!

С уважением,
команда разработчиков сайта «<?php echo $project_name; ?>».
