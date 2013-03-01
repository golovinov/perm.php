perm.php
========

This script sets correct permissions to files and folder.

Usage: php -f '.basename(__FILE__).' <folder> <user>'."\n\n";
  <folder>    project folder. Relative to $root
	<user>"     user, having right to this project. Use www-data for common case


Use it correctly, please.
Script is potentially dangerous for you system. Make sure that you users CAN'T RUN it
