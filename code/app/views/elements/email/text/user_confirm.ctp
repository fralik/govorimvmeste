<?php
# /app/views/elements/email/text/user_confirm.ctp
?>
Dear <?php echo $user_name; ?>,

thank you for signing up to <?php echo $project_name; ?>, the best way to find your language partner.
Firstly, we need you to confirm your email address by visiting this link:
<?php echo $activate_url; ?>


If you didn't sign up to <?php echo $project_name; ?>, please discard this e-mail and we won't e-mail you again.

Sincerely yours,
<?php echo $project_name; ?> team.

