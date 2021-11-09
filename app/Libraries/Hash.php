<?php 
namespace App\Libraries;

class Hash
{
	public static function make($password){
		return password_hash($password, PASSWORD_BCRYPT);
	}
	public static function check($enterpasswd,$db_passwd){
	if(password_verify($enterpasswd, $db_passwd)){
		return true;
	}
	else{
		return false;
	}
}

}




?>