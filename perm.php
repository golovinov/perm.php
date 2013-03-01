<?php
/**
  This script sets correct permissions to files and folder.
	Use it correctly, please.
	Script is potentially dangerous for you system. Make sure that you users CAN'T RUN it
*/

$root = '/home/sites/'; //choose it to your own

if (!isset($argv[1])) {
	echo 'No params were givven. Use "php -f '.basename(__FILE__).' help" to help'."\n";
	die('');
}

if (trim($argv[1])=='help') {
	echo 'PERM.PHP v 1.0 script. Use it to set correct permissions to files and folder in your project'."\n";
	echo 'Usage: php -f '.basename(__FILE__).' <folder> <user>'."\n\n";
	echo "<folder>"."\t"."project folder. Relative to ".$root."\n";
	echo "<user>"."\t\t"."user, having right to this project. Use www-data for common case"."\n\n";
	die();
}

if (!isset($argv[2])) {
	echo 'No user given. Use "php -f '.basename(__FILE__).' help" to help'."\n";
	die();
}

$fold = trim($argv[1],'/');
$user = trim($argv[2]);


if (in_array($fold,array('etc','usr'))) {
	die('Wrong directory.'."\n");
}



$fold = $root.$fold.'/';

if (!is_dir($fold)) {
	die('Non existing directory. Use correct path ralative to '.$root."\n");
}


echo 'chmod -R 770 '.$fold."\r\n";
exec ("chmod -R 770 ".$fold);
echo 'chown -R '.$user.':www-data '.$fold."\r\n";
exec ("chown -R ".$user.":www-data ".$fold);
echo "chmod -R g+rw ".$fold."\r\n";
exec ("chmod -R g+rw ".$fold);
echo "chmod g+x ".$fold."\r\n";
exec ("chmod g+x ".$fold);


exit();

function readln($default='') {
	$handle = fopen ("php://stdin","r");
	$line = fgets($handle);

	$total = trim($line)? trim($line) : $default;

	return $total;
}



