<?php
# /app/views/elements/email/text/user_confirm.ctp
?>
Dear <?php echo $user_name; ?>,

Thank you for registering at <?php echo $project_name; ?>, the best way to find your language partners!
Firstly, we need you to confirm your e-mail address by visiting this link:
<?php echo $activate_url; ?>


If you didn't register at <?php echo $project_name; ?>, please discard this e-mail.

Sincerely,
The <?php echo $project_name; ?> team

