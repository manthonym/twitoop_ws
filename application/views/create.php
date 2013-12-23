<!DOCTYPE html>
<html>
	<head>
	<title>Twitoop - Tweets Analysis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="<?php base_url() . 'assets/'?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php base_url() . 'assets/'?>css/style.css" rel="stylesheet">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php base_url() . 'assets/'?>js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	</head>
	
	<script>
		function valider(){
			
			var ret = true;
			
			//On récupère le formulaire
			var form = document.forms['formSaisie'];
			// si un ou plusieurs champs sont vides
			if(form.number.value != "" && form.email.value != "" && form.hashtag.value != "")
			{
				document.getElementById('alertEmpty').style.display = "none";
				//On vérifie le hashtag, pas de #
				if((form.hashtag.value).indexOf("#") == -1)
				{
					document.getElementById('alertHashtag').style.display = "none";
					
					//on vérifie la valeur du nombre de tweet
					if( form.number.value > 0 && form.number.value <= 5000)
					{
						//OK  
						ret = true;
						document.getElementById('alertNumber').style.display = "none";
					}
					else 
					{
						// sinon on affiche un message
						//alert("Modifiez le nombre de tweets");
						document.getElementById('alertNumber').style.display = "block";
						ret = false;
					}
				}
				else
				{
					// sinon on affiche un message
					//alert("No # in the hashtag please");
					document.getElementById('alertHashtag').style.display = "block";
					ret = false;
				}
			}
			else 
			{
				// sinon on affiche un message
				//alert("Un ou plusieurs champs sont vides.");
				document.getElementById('alertEmpty').style.display = "block";
				ret =  false;
			}
			
			return ret;
		}
	</script>
	
	<body>
		<table id="page-table"><tr><td id="page-td">
			<div class="jumbotron">
				<div class="container">
					<h2>Hello there!</h2>
					<p>If you want to ask for an analysis of a specific hashtag, just fill in this little form. 
					The analysis could take from 4 to many minutes depending on the number of tweets.</p>
					
					<form role="form" action="<?php base_url() . 'index.php/qc/add'?>" method="POST" onsubmit="return valider()" name="formSaisie">
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Enter you email">
						</div>
						<div class="form-group">
							<label for="hashtag">Hashtag to analyse (without the "#")</label>
							<input type="text" name="hashtag" class="form-control" id="hashtag" placeholder="Enter the hashtag to analyse">
						</div>
						<div class="form-group">
							<label for="number">Number of tweets to retrieve (max. 5000)</label>
							<input type="number" name="number" class="form-control" id="number" placeholder="Enter number of tweets you want">
						</div>
						
						<div class="alert alert-danger" id="alertEmpty">One or many fields are empty.</div>
						<div class="alert alert-danger" id="alertHashtag">Please no "#" in the hashtag.</div>
						<div class="alert alert-danger" id="alertNumber">Invalid number of tweets.</div>
						
						<button type="submit" class="btn btn-primary btn-lg">Analyze!</button>
					</form>
				</div>
			</div>
		</td></tr></table>
	</body>
</html>