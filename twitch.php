<?php
	function IRCBot()
	{
		$token = json_decode(file_get_contents("pass.txt"), true);
		$config = array(
			'server'  => 'irc.twitch.tv',
			'port'    => 6667, 
			'channel' => 'dreamhacksc2',
			'name'    => 'peter279k', 
			'nick'    => 'peter279k', 
			'pass'    => 'oauth:' . $token["access_token"] //http://twitchapps.com/tmi/
		);

		echo 'test';
		$server = array();

		$sock = @fsockopen($config["server"], 6667, $errno, $errstr, 30);
		if(!$sock) {
			printf("errno: %s, errstr: %s", $errno, $errstr);
		}
		else {
			SendData($sock, "PASS " . $config['pass'] . "\r\n");
			SendData($sock, "NICK " . $config['nick'] . "\r\n");
			SendData($sock, "USER " . $config['nick'] . "\r\n");
			SendData($sock, "JOIN " . $config['channel'] . "\r\n");
			while (!feof($sock)) {
				echo fgets($sock, 4096);
			}
		}

	}

	function SendData($sock, $cmd)
	{
		fwrite($sock, $cmd, strlen($cmd));
	}

	IRCBot();
?>