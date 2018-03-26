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
	<script type="text/javascript" src="mscript.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="mstyle.css"/>
<script type="text/javascript">
$(function(){
	/*$('#passList input:password').focus(function(){
        this.type = "text";
    }).blur(function(){
        this.type = "password";
    });*/
	var t;
	var target;
	$('#passList').on('focus','input:password',function(e){
		if(e.target != target){
			$('.passwd').prop('type','password');
		}
		this.type = "text";
		$(this).trigger('mouseover');
		t		= this;
		target	= e.target;
	});
	$(document).on({
		'click':function(e){
			if(e.target != target){
				$('.passwd').prop('type','password');
			}
		}
	});
});
</script>
</head>
<body>
	<div class="container">
	<?php if(!@$_SESSION['oturum']){ ?>
	<!-- login -->
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
	<!-- Passwords area -->
		<div class="row" style="margin-top:25px;">
		<!-- Collapsed -->
			<div class="twelve columns" id="expandable2">
				<div class="row">
					<div class="three columns"><img src="logo.svg" alt="passwordstation" style="width:100%;margin-top:10px"/></div>
					<div class="nine columns"><input id="search" onkeyup="search(this.value)" class="u-full-width search" type="search" style="background-image:url('searchicon.png');background-position:0px -8px;background-repeat:no-repeat;padding:12px 20px 12px 40px;" placeholder="Search With Name or Email/ID"/></div>
				</div>
				
			</div>
		<!-- Expanded -->
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
		<!-- Expand/Collapse bar -->
			<div class="row" style="margin:0 0 20px">
				<div class="twelve columns">
					<div id="expand" onclick="expand()"><span style="background-color:#33C3F0;border:2px solid #33C3F0;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;">Expand</span></div>
				</div>
			</div>
		<!-- Passwords table -->
			<div class="twelve columns">
				<div class="row">
					<table class="u-full-width" id="passList">
					  <thead>
						<tr></tr>
						</thead>
						<tbody>
						<?php mlistPass(); ?>
						</tbody>
					</table>
					
				</div>
			</div>
		</div><?php } ?>
	</div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
