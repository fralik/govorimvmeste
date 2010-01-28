<?php
# /app/views/elements/email/text/user_greetings.ctp
?>

Dear <?php echo $user_name; ?>,

You have successfully activated your account.
You can view your profile by visiting <?php echo $site_address; ?>users/view/<?php echo $user_id; ?> .
You can always delete your account with us by visiting <?php echo $site_address; ?>users/delete/<?php echo $user_id; ?> .

We hope that <?php echo $project_name; ?> helps you learn new languages!

Sincerely,
The <?php echo $project_name; ?> team.
