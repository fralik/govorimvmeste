<?php
# /app/views/elements/email/text/user_greetings.ctp
?>

Dear <?php echo $user_name; ?>,

you have successfully activated your account.
You can view your profile by visiting <?php echo $site_address; ?>users/view/<?php echo $user_id; ?> .
You always can delete all data about yourself from our system. Just visit <?php echo $site_address; ?>users/delete/<?php echo $user_id; ?> .

We hope that <?php echo $project_name; ?> helps you to learn new languages!

Sincerely yours,
<?php echo $project_name; ?> team.
