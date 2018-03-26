<?php define('DIRECTACCESS', TRUE); require_once 'functions.php' ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>passBook</title>
	<link rel="stylesheet" href="style.css"/>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery-ui.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>

<?php if(!@$_SESSION['oturum']){ ?>

<div id="loginbox">
<input type="password" placeholder="Password"/> <button id="login">Login</button>
</div>

<?php }else{ ?>
<input type="text" placeholder="Name" class="input" id="aname"/>
<input type="text" placeholder="Email/ID" class="input" id="aemail"/>
<input type="password" placeholder="Password" class="input" id="apass"/>
<button id="add">Add</button>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search With Name or Email/ID">
<div class="info">Press the enter key after edit informations </div>
<input type="password" placeholder="New password" class="cpass"/><input type="password" placeholder="New password again" class="cpass"/>
<button id="cpassb">Change Password</button>
<img src="logout.svg" width="48px" height="48px" style="float:right;margin:5px 15px;cursor:pointer;" id="logout"/>
<table id="myTable">
<tr class="header">
<th style="width:25%;">Name</th>
<th style="width:25%;">Email/ID</th>
<th style="width:50%;">Password</th>
</tr>
<?php listPass(); ?>
</table><?php } ?>

</body>
</html>