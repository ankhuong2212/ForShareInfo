<!--
	HelpConnect website by 15ICE Group29
-->
<?php
class Connection
{
	function connect()
	{

		$connection_url='localhost';

		$username='akatsolc_acc'; // use your own mysql user name

		$password='$!$U@!k@2212'; // use your own mys1ql password

		$db_name='akatsolc_hw';

		//echo "connecting to db...";

		// make a conection to the database

		mysql_connect( "$connection_url","$username","$password" ) OR

			die("Could Not Connect to Database");

		// select the database to use

		mysql_select_db( "$db_name" ) OR

			die("Failed Selecting to DB");
	}

	function close()
	{
		mysql_close();
	}
}
?>