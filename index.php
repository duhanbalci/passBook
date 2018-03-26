<?php define('DIRECTACCESS', TRUE); require_once 'functions.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>passBook</title>
	<meta name="description" content="">
	<meta name="author" content="Duhan BALCI">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery-ui.min.js"></script>
	<script type="text/javascript" src="jquery-paginate.min.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="icon" type="image/png" href="images/favicon.png">
<style type="text/css">
	@font-face{
		font-family:'raleway';
		src:url('css/Raleway-Medium.ttf');
	}
	body{
		font-family:raleway;
	}
	table img{
		width:38px;
		height:38px;
		margin:0px 5px;
		float:right;
		cursor:pointer;
	}
	table button{
		float:right;
	}
	.tabloinput{
		padding-bottom:0 !important;
		border-radius:0 !important;
		-webkit-border-radius:0 !important;
		-moz-border-radius:0 !important;
		border:0 !important;
		border-bottom:1px dashed #000 !important;
	}
	.page-navigation{
		margin:0 0 30px 40%;
		-moz-user-select: -moz-none;
	   -khtml-user-select: none;
	   -webkit-user-select: none;
	   -ms-user-select: none;
	   user-select: none;
	}
	.page-navigation a {
	  margin: 0 2px;
	  display: inline-block;
	  padding: 3px 5px;
	  color: #ffffff;
	  background-color: #70b7ec;
	  border-radius: 5px;
	  text-decoration: none;
	  font-weight: bold;
	}

	.page-navigation a[data-selected] {
	  background-color: #3d9be0;
	}
	#expand{
		height:3px;
		width:100%;
		background-color:#33C3F0;
		text-align:center;
		cursor:pointer;
	}
	#escapingBallG{	position:relative;	width:160px;	height:55px;	margin:auto;	top:100px;}.escapingBallG{	background-color:rgb(138,138,138);	position:absolute;	top:0;	left:0;	width:55px;	height:55px;	border-radius:28px;		-o-border-radius:28px;		-ms-border-radius:28px;		-webkit-border-radius:28px;		-moz-border-radius:28px;	animation-name:bounce_escapingBallG;		-o-animation-name:bounce_escapingBallG;		-ms-animation-name:bounce_escapingBallG;		-webkit-animation-name:bounce_escapingBallG;		-moz-animation-name:bounce_escapingBallG;	animation-duration:0.905s;		-o-animation-duration:0.905s;		-ms-animation-duration:0.905s;		-webkit-animation-duration:0.905s;		-moz-animation-duration:0.905s;	animation-iteration-count:infinite;		-o-animation-iteration-count:infinite;		-ms-animation-iteration-count:infinite;		-webkit-animation-iteration-count:infinite;		-moz-animation-iteration-count:infinite;	animation-timing-function:linear;		-o-animation-timing-function:linear;		-ms-animation-timing-function:linear;		-webkit-animation-timing-function:linear;		-moz-animation-timing-function:linear;	animation-delay:0s;		-o-animation-delay:0s;		-ms-animation-delay:0s;		-webkit-animation-delay:0s;		-moz-animation-delay:0s;	transform:scale(0.5, 1);		-o-transform:scale(0.5, 1);		-ms-transform:scale(0.5, 1);		-webkit-transform:scale(0.5, 1);		-moz-transform:scale(0.5, 1);}@keyframes bounce_escapingBallG{	0%{		left:0px;		transform:scale(0.5, 1);	}	25%{		left:53px;		transform:scale(1, 0.5);	}	50%{		left:133px;		transform:scale(0.5, 1);	}	75%{		left:53px;		transform:scale(1, 0.5);	}	100%{		left:0px;		transform:scale(0.5, 1);	}}@-o-keyframes bounce_escapingBallG{	0%{		left:0px;		-o-transform:scale(0.5, 1);	}	25%{		left:53px;		-o-transform:scale(1, 0.5);	}	50%{		left:133px;		-o-transform:scale(0.5, 1);	}	75%{		left:53px;		-o-transform:scale(1, 0.5);	}	100%{		left:0px;		-o-transform:scale(0.5, 1);	}}@-ms-keyframes bounce_escapingBallG{	0%{		left:0px;		-ms-transform:scale(0.5, 1);	}	25%{		left:53px;		-ms-transform:scale(1, 0.5);	}	50%{		left:133px;		-ms-transform:scale(0.5, 1);	}	75%{		left:53px;		-ms-transform:scale(1, 0.5);	}	100%{		left:0px;		-ms-transform:scale(0.5, 1);	}}@-webkit-keyframes bounce_escapingBallG{	0%{		left:0px;		-webkit-transform:scale(0.5, 1);	}	25%{		left:53px;		-webkit-transform:scale(1, 0.5);	}	50%{		left:133px;		-webkit-transform:scale(0.5, 1);	}	75%{		left:53px;		-webkit-transform:scale(1, 0.5);	}	100%{		left:0px;		-webkit-transform:scale(0.5, 1);	}}@-moz-keyframes bounce_escapingBallG{	0%{		left:0px;		-moz-transform:scale(0.5, 1);	}	25%{		left:53px;		-moz-transform:scale(1, 0.5);	}	50%{		left:133px;		-moz-transform:scale(0.5, 1);	}	75%{		left:53px;		-moz-transform:scale(1, 0.5);	}	100%{		left:0px;		-moz-transform:scale(0.5, 1);	}}

</style>
</head>
<body>
<div id="loading" style="position:absolute;top:0;right:0;bottom:0;left:0;z-index:999999999999999;background-color:#f4f8ff;">
<div id="escapingBallG"><div id="escapingBall_1" class="escapingBallG"></div></div>
</div>

	<div class="container">
	<?php if(!@$_SESSION['oturum']){ ?>
		<div class="row">
			<div class="three columns">.</div>
			<div class="six columns" style="margin-top:100px;border:1px solid;padding:30px 15px;border-radius:5px;">
				<div class="row" style="margin-bottom:20px;"><div class="twelve columns"><img src="logo.svg" alt="passwordstation" width="100%"/></div></div>
				<div class="row">
					<div class="nine columns">
						<input type="password" class="u-full-width" placeholder="Password" id="loginpass"/>
					</div>
					<div class="three columns">
						<button id="login" class="primary-button">Login</button>
					</div>
				</div>
			</div>
		</div>

	<?php }else{ ?>
		<div class="row" style="margin-top:25px;">
			<div class="twelve columns" id="expandable2">
				<div class="row">
					<div class="three columns"><img src="logo.svg" alt="passwordstation" style="width:100%;margin-top:10px"/></div>
					<div class="nine columns"><input id="search" onkeyup="search(this.value)" class="u-full-width search" type="search" style="background-image:url('searchicon.png');background-position:0px -8px;background-repeat:no-repeat;padding:12px 20px 12px 40px;" placeholder="Search With Name or Email/ID"/></div>
				</div>
				
			</div>
			<div id="expandable" style="display:none;">
				<div class="twelve columns"><img src="logo.svg" alt="passwordstation" width="100%"/></div>
				<div class="twelve columns" style="margin-top:20px;">
					<div class="row">
						<div class="seven columns">
							<div class="row">
								<div class="six columns"><input type="text" placeholder="Name" class="u-full-width" id="aname"/></div>
								<div class="six columns"><input type="text" placeholder="Email/ID" class="u-full-width" id="aemail"/></div>
							</div>
						</div>
						<div class="five columns">
							<div class="nine columns"><input type="password" placeholder="Password" class="u-full-width" id="apass"/></div>
							<div class="three columns"><button class="button-primary u-full-width" style="padding:0 20px;" id="add">Add</button></div>
						</div>
					</div>
					
				</div>
				<div class="twelve columns">
					<input id="search" onkeyup="search(this.value)" class="u-full-width search" type="search" style="background-image:url('searchicon.png');background-position:0px -8px;background-repeat:no-repeat;padding:12px 20px 12px 40px;" placeholder="Search With Name or Email/ID"/>
				</div>
				<div class="twelve columns">
					<div class="row">
						<div class="four columns"><span style="font-size:14px"><strong><a>*Press the enter key after edit informations!</a></strong></span></div>
						<div class="eight columns">
							<div class="row">
								<div class="four columns"><input type="text" placeholder="New password" class="u-full-width" id="pass1"/></div>
								<div class="four columns"><input type="text" placeholder="New password again" class="u-full-width" id="pass2"/></div>
								<div class="three columns"><button class="button-primary u-full-width" id="cpassb" style="padding:0 10px;">Change</button></div>
								<div class="one column"><img src="logout.svg" width="36px" height="36px" style="float:right;margin:1px 15px;cursor:pointer;" id="logout"/></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin:0 0 20px">
				<div class="twelve columns">
					<div id="expand" onclick="expand()"><span style="background-color:#33C3F0;border:2px solid #33C3F0;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;">Expand</span></div>
				</div>
			</div>
			<div class="twelve columns">
				<div class="row">
					<table class="u-full-width" id="passList">
					  <thead>
						<tr>
							<th style="width:25%">Name</th>
							<th style="width:25%">Email/ID</th>
							<th style="width:50%">Password</th>
						</tr>
						</thead>
						<tbody>
						<?php listPass(); ?>
						</tbody>
					</table>
					
				</div>
			</div>
		</div><?php } ?>
	</div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
