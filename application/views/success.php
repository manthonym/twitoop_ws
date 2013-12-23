<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Twitoop - Tweets Analysis</title>
	
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php base_url() . 'assets/'?>js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	</head>
	
	<body>
		<table id="page-table"><tr><td id="page-td">
			<div class="jumbotron">
				<div class="container">
					<?php
						if($isOk) {
					?>
					<h2>Done!</h2>
					<br/>
					<p>Thank you for choosing us.<br/>We will send you an email to <?php echo '<span class="hashtag">' . $email . '</span>'; ?> when the analysis of 
						<span class="hashtag">
							<a href="https://twitter.com/search?q=<?php echo $hashtag; ?>&src=typd" alt="Click to see on Twitter">#<?php echo $hashtag; ?></a> 
						</span>
						is finished.<br/><br/>
						See you later !</p>
					<br/>
					<a href="<?php base_url() . 'index.php/qc/create'?>"><button class="btn btn-primary btn-lg">Ask for another analysis</button></a>
					<?php
						}
						else {
					?>
					<h2>Error!</h2>
					<br/>
					<p>Sorry but an error occured. Maybe you didn't fill in the form correctly ?<br/>
						Please try again! If it persists, please contact the administrator.</p>
					<br/>
					<a href="<?php base_url() . 'index.php/qc/create'?>"><button class="btn btn-primary btn-lg">Return to the form</button></a>
					<?php
						}
					?>
				</div>
			</div>
		</td></tr></table>
	</body>
</html>