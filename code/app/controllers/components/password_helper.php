<?php
class PasswordHelperComponent extends Object {
 
/**
 * Password generator function
 *
 * This function will randomly generate a password from a given set of characters
 *
 * @param int = 8, length of the password you want to generate
 * @return string, the password
 */    
	function generatePassword($length=8, $level=2)
	{
	   list($usec, $sec) = explode(' ', microtime());
	   srand((float) $sec + ((float) $usec * 100000));

	   $validchars[1] = "0123456789abcdfghjkmnpqrstvwxyz";
	   $validchars[2] = "01234abcHIJKdfqr56789stvwST12UVWxyzABCDEghjkLMNmnpFGOPQRXYZ";
	   $validchars[3] = "0123456789_!@#$%&*()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&*()-=+/";

	   $password  = "";
	   $counter   = 0;

	   while ($counter < $length) 
	   {
		 $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);

		 // All character must be different
		 if (!strstr($password, $actChar)) 
		 {
			$password .= $actChar;
			$counter++;
		 }
	   }

	   return $password;

	}	
}
?>