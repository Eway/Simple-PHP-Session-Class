<?php
/**
*
* Simple class that allows you to get and set data from the current session
*
* @author     Gianfilippo Balestriero <gianbalexdev@gmail.com>
* @link       https://github.com/gianbalex/Simple-PHP-Session-Class
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/>.
*
*
* Usage:
*
*	session_start();
*
*	Session::set("user", array(
*		"pets" => array(
*			"dog" => array(
*				"name" 	=> "Bobby",
*				"age"	=> 2
*			),
*			"cat" => array(
*				"name" 	=> "Lia",
*				"age"	=> 3
*			)			
*		)
*	));
*
*	Session::get("user.name") 			// return "John"
*	Session::get("user.pets.dog.name") 	// return "Bobby"
*	Session::get("user.pets") 			// return Array()
*
*
*/
class Session {
	
	/**
	*
	* set - Static function to set values into $_SESSION array
	* @param string $name - The key of array
	* @param string $value - The value
	*/
    public static function set($name, $value) {
	
		// set new key with new value
        $_SESSION[$name] = $value;
    }

	/**
	*
	*@param string $name - A dot separated key string ( ex: user.pets.dog.name = $_SESSION[user][pets][dog][name])
	*@return mixed - False if isn't key in array else Array or String
	*
	*/
    public static function get($name) {

		// explode string by dot.
        $aSession = explode(".", $name);
		
		// if is a single key
        if (count($aSession) <= 1) {
		
			// return the key if isset else false
            return (isset($_SESSION[$aSession[0]])) ? $_SESSION[$aSession[0]] : false;
        }
		
		// set default currentValue to false.
		$currentValue = false;

		// loop to navigate all keys
        for ($a = 0; $a < count($aSession); $a++) {
			
			if(!$currentValue){
				// if isn't set the current key in session array return false.
				if(!isset($_SESSION[$aSession[$a]])){
					return false;
				}
				
				// set current value
				$currentValue = $_SESSION[$aSession[$a]];
			
			}
			// if have $currentValue
			else{
				
				// if isn't set the key into current value return false
				if(!isset($currentValue[$aSession[$a]])){
					return false;
				}
				
				// set new current value
				$currentValue = $currentValue[$aSession[$a]];
			}
			
        }
		
		// return current value
		return $currentValue;
    }
}

?>