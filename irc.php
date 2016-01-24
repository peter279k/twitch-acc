<?php
	require 'vendor/autoload.php';
	$connection = new \Phergie\Irc\Connection();

	$connection
		->setServerHostname('irc.twitch.tv')
		->setServerPort(6667)
		->setPassword('oauth:4q6ujtdfs74rhmsuotw46he7p3risc')
		->setNickname('peter279k')
		->setUsername('peter279k')
		->setHostname('irc.twitch.tv')
		->setServername('irc.twitch.tv')
		->setRealname('realname');
?>