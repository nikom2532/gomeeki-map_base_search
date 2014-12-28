asdf
<?php
	include_once("twitteroauth/twitteroauth/twitteroauth.php");
	
	$consumer = "YdljHfELFcHxaF0eyazk2SfMY";
	$consumersecret = "08ugbkfVGT7dF7SG6yvKSMgL0niOtsrYM0W1aEJM2v2AkF3z3N";
	$accesstoken = "109898812-oG9ZeiGOWIdKLIbTsaDk4eIrnUpVcuDhtq2Dfvky";
	$accesstokensecret = "2BlT2W5kg6O8qKsQNKrkXJQPEYkPBZLe7isUtVaxPuxCO";
	
	$twitter = new TwitterOAuth(
		$consumer,
		$consumersecret,
		$accesstoken,
		$accesstokensecret
	);
	
	$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=test&result_type=recent&count=10');
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
				<?php var_dump($tweets); ?>
			</div>

			<footer>
				<p>
					&copy; Copyright  by root
				</p>
			</footer>
		</div>
	</body>
</html>
