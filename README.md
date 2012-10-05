### Simple PHP Session Class

### Usage:

```php
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

// get data from session
$userName = Session::get("user.name");
$dogName = Session::get("user.pets.dog.name");
$catName = Session::get("user.pets.cat.name");

// get array data from session
$pets = Session::get("user.pets");


// display data
echo $userName;
echo $dogName;
echo $catName;
print_r($pets);
?>
```

### Return:
```php
John
Bobby
Lia
Array(
		"dog" => array(
			"name"	=> "Bobby",
			"age"	=> 1
		),
		"cat" => array(
			"name"	=> "Lia",
			"age"	=> 2
		),		
	)
```