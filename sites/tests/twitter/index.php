<?php
	session_start();
	include_once('library/twitteroauth.php');
	
	$twitteruser = "nikom2532";
	$notweets = 30;
	
	$consumerkey = "YdljHfELFcHxaF0eyazk2SfMY";
	$consumersecret = "08ugbkfVGT7dF7SG6yvKSMgL0niOtsrYM0W1aEJM2v2AkF3z3N";
	$accesstoken = "109898812-CF7g8GFIszC4sUTEhdorPgCtRzYee7TUNWCTDiCt";
	$accesstokensecret = "6v8y9cLvgflg0W3VBpmrWqELHpRQCF1P47LfQB8kJ990W";
	
	
	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}
	 
	$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
	
	$connection->host = 'https://api.twitter.com/1.1/';
	
	// $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
	
	// $tweets2 = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=%23adecco&result_type=recent&geocode=37.781157,-122.398720,1mi&count=4");
	
	// $text = "ไม่เคยจ่ายแมคด้วยบัตรเครดิตมาก่อน กระต่ายเอาไปแหลกหมด";
	$text = "Bubble question sophistication: is there a bubble? < when will the bubble pop? < how will the bubble pop? < why does the bubble have to pop?";
	$text = "Thailand";
	
	$tweets2 = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".$text."&result_type=recent&count=4");
	
	
	// var_dump($tweets2);
	echo json_encode($tweets2);
	
	
	// foreach ($tweets2 as $key => $value) {
		// echo $value[""]
	// }
	
	// exit;

	
	/*
	$twitter = new TwitterOAuth(
		$consumerkey,
		$consumersecret,
		$accesstoken,
		$accesstokensecret
	);
	
	// var_dump($twitter);
	// exit;
	
	// $tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=test&result_type=recent&count=10');
	$tweets = $twitter->get('statuses/home_timeline');
	
	var_dump($tweets);
	*/
	
	
	/*
	function getConnectionWithAccessToken($consumer, $consumersecret, $oauth_token, $oauth_token_secret) {
		$connection = new TwitterOAuth($consumer, $consumersecret, $oauth_token, $oauth_token_secret);
		return $connection;
	}
	 
	$connection = getConnectionWithAccessToken(
		$consumerkey,
		$consumersecret,
		$accesstoken,
		$accesstokensecret
	);
	$content = $connection->get("statuses/home_timeline");
	
	var_dump($content);
	*/
	
	/*
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>new_file</title>
		<meta name="description" content="">
		<meta name="author" content="root">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div>
			<header>
				<h1>new_file</h1>
			</header>
			<nav>
				<p>
					<a href="/">Home</a>
				</p>
				<p>
					<a href="/contact">Contact</a>
				</p>
			</nav>

			<div>
				<?php //var_dump($tweets); ?>
			</div>

			<footer>
				<p>
					&copy; Copyright  by root
				</p>
			</footer>
		</div>
	</body>
</html>
*/ ?>