Users class and functions - how to use user/member object
described in some simple examples
==============


* $user->login(string $username, string $password); 
	* [DESC] note that the $password will be encoded inside the class, so if you want to login a user just pass the $username and $password
	* [RETURN]
		* true - if the login was successfuly done
		* false - if the username/password doesn't match
* $user->register()
	* [NOTE] this method is under development
* $user->is_auth()
	* [DESC] check if current member is authenticated on the web site
	* [RETURN] 
		* true - if the user is authenticated
		* false - if the user is not authenticated
* $user->is_admin()
	* [DESC] check if the current user is admin 
	* [NOTE] if the $user->is_admin() return true, then the user is authenticated also
	* [RETURN]
		* true - if the user is admin
		* false - if the user is not admin
* $user->get_id()
	* [DESC] get the current unique ID specified to this user
	* [RETURN]
		* int $id
* $user->get_username()
	* [DESC] get the current username of the user	
	* [RETURN]
		* string $username
* $user->add_field(int $user_id, $index, $value)
	* [DESC] add a new custom field in users_meta table
	* [PARAMS]
		* $user_id - unique ID of the user which you want to add a new custom field
		* $index - the custom field name, for example, you can add a custom field like: 'name' => 'John', then the $index will be 'name'
		* $value - the value of the index, as in the above example, the value will be equal with 'John'
	* [EXAMPLE] $user->add_field(25, 'name', 'John')
	* [RETURN]
		* true - if the query was ran successfuly
		* false - if the query was failed 	
* $user->change_field($user_id, $index, $value)
	* [DESC] change the value of the custom field with index equal with $index and the user id equal with $user_id
	* [EXAMPLE] $user->change_field(25, 'name', 'Petter')
	* [RETURN]
		* true - if the query was ran
		* false - if the query was failed

* $user->get_field($user_id, $index)
	* [DESC] this method will get the value of this custom field
	* [EXAMPLE] $user->get_field(25, 'name')
	* [RETURN]
		* string $value - a string with the value of this custom field
		* false - if there was a problem while mysql select or this custom field doesn't exists
		
		
