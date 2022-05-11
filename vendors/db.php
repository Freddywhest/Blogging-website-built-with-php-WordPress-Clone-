<?php
/*replace:
database host -> with your host name from your host site
database name -> with your database name from your host site
database user -> with the database user from your host site
password -> with the database password from your host site

If any issues,
Contact me on:
Email -> contact@alfrednti.com / alfrednti5000@gmail.com
Website-> https://alfrednti.com
I will reply you as soon as I can
*/
$dsn="mysql:host=localhost;dbname=newspaper";
	try{
		$pdo = new PDO($dsn,'root', '');
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>