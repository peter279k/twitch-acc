<?php
	require "vendor/autoload.php";
	use \ritero\SDK\TwitchTV\TwitchSDK;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Twitch-login-demo</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			$pass = json_decode(file_get_contents("pass.txt"), true);
			$twitch_config = array(
				'client_id' => $pass["client-id"],
				'client_secret' => $pass["client-secret"],
				'redirect_uri' => 'https://peter279k.com/twitch-acc/auth.php'
			);

			$twitch = new TwitchSDK($twitch_config);
			$loginURL = $twitch->authLoginURL('chat_login');
			if(empty($_GET["code"]))
				echo "<h2><a href='" . $loginURL . "'>login with Twitch</a></h2>";
			else {
				$accessToken = $twitch -> authAccessTokenGet($_GET["code"]);
				$result = json_decode(json_encode($accessToken), true);
				var_dump($result);
			}
				
		?>
	</body>
</html>
