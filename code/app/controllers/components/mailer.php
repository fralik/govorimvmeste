<?php

App::import('Component', 'SwiftMailer');
class MailerComponent extends SwiftMailerComponent
{
    var $smtpType = 'tls'; 
	var $smtpHost = 'smtp.gmail.com'; 
	var $smtpPort = 465;
	var $smtpUsername = 'user@domain'; // INSTALL: configure for your needs
	var $smtpPassword = 'secret_password'; 

	var $sendAs = 'text'; 
	var $from = 'mail@govorimvmeste.com'; 
	var $fromName = 'GovorimVmeste'; 
	var $template = 'default';
}
?>