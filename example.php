<?php
// start session
session_start();
// include the class
require_once("Session.php");

$userData = array(
	"name" 	=> "John",
	"age"	=> 26,
	"pets"	=> array(
		"dog" => array(
			"name"	=> "Bobby",
			"age"	=> 1
		),
		"cat" => array(
			"name"	=> "Lia",
			"age"	=> 2
		),		
	)
);

// set user data
Session::set("user", $userData);

echo '<pre style="display:block; overflow-x:auto; margin:0 auto; padding:20px; background:#E9E9E9; border:1px solid #DDDDDD">';
echo "
*
* Simple class that allows you to get and set data from the current session
*
* @author     Gianfilippo Balestriero <gianbalexdev@gmail.com>
* @link       http://github.com/gianbalexdev/simple_php_session_class
*
*
\n
";
echo "print_r() of user array is:\n\n";
print_r(Session::get("user"));
echo "\n";
echo "User name is:\t\t\t".Session::get("user.name")."\n";
echo "User age is:\t\t\t".Session::get("user.age")."\n\n";
echo "User dog name is:\t\t".Session::get("user.pets.dog.name")."\n";
echo "User dog age is:\t\t".Session::get("user.pets.dog.age")."\n\n";
echo "User cat name is:\t\t".Session::get("user.pets.cat.name")."\n";
echo "User cat age is:\t\t".Session::get("user.pets.cat.age")."\n\n";
echo "Pets array is:\t\t\t".Session::get("user.pets")."\n\n";
echo "Json of user array is:\t\t".json_encode(Session::get("user"))."\n\n";
echo "Json of pets array is:\t\t".json_encode(Session::get("user.pets"))."\n\n";
echo '</pre>';
?>