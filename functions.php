<?php require_once 'conn.php';

define('IV',$iv = chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0));
define('PW',@$_SESSION['oturum']);
function pw($pass){
	return substr(hash('sha256', $pass, true), 0, 32);
}
function encrypt($pass,$word,$method = 'aes-256-cbc'){
	return base64_encode(openssl_encrypt($word, $method, pw($pass), OPENSSL_RAW_DATA, IV));
}
function decrtypt($pass,$encrypted,$method = 'aes-256-cbc'){
	return openssl_decrypt(base64_decode($encrypted), $method, pw($pass), OPENSSL_RAW_DATA, IV);
}
function add($name,$email,$pass){
	loginCotrol();
	global $sql;
	$name	= encrypt(PW,$name);
	$email	= encrypt(PW,$email);
	$pass	= encrypt(PW,$pass);
	$sql->query("INSERT INTO pw SET name='$name',eid='$email',pass='$pass'");
	if($sql->affected_rows) return $sql->insert_id;
	return 0;
}
function delete($id){
	loginCotrol();
	global $sql;
	$id		= $sql->real_escape_string($id);
	$sql->query("DELETE FROM pw WHERE id='$id'");
	if($sql->affected_rows) return 1;
	return 0;	
}
function listPass(){
	loginCotrol();
	global $sql;
	$sorgu	= $sql->query("SELECT * FROM pw");
	while($s = $sorgu->fetch_assoc()){
		echo "
		<tr data-id='".$s['id']."'>
			<td><input type='text' class='tabloinput' value='".decrtypt(PW,$s['name'])."'></td>
			<td><input type='text' class='tabloinput' value='".decrtypt(PW,$s['eid'])."'></td>
			<td>
			<div class='row'>
				<div class='seven columns'> <input type='password' class='u-full-width' value='".decrtypt(PW,$s['pass'])."'/></div>
				<div class='five columns'><img src='trash.svg'/><button class='button' style='padding:0 3px;'>Show Password</button></div>
			</div>
			</td>
		</tr>";
	}	
}
function mlistPass(){
	loginCotrol();
	global $sql;
	$sorgu	= $sql->query("SELECT * FROM pw");
	while($s = $sorgu->fetch_assoc()){
		echo "
		<tr data-id='".$s['id']."'>
			<td><div data-tip='Name - Press the enter key after edit'><input type='text' class='tabloinput' value='".decrtypt(PW,$s['name'])."'></div></td>
			<td><div data-tip='Email/ID  - Press the enter key after edit'><input type='text' class='tabloinput' value='".decrtypt(PW,$s['eid'])."'></div></td>
			<td>
			<div data-tip='Password - Press the enter key after edit' style='display:inline'><input type='password' class='passwd' value='".decrtypt(PW,$s['pass'])."'/></div>
			<img src='trash.svg'/>
			</td>
		</tr>";
	}	
}
function edit($id,$name,$eid,$pass){
	loginCotrol();
	global $sql;
	$id		= $sql->real_escape_string($id);
	$name	= encrypt(PW,$name);
	$eid	= encrypt(PW,$eid);
	$pass	= encrypt(PW,$pass);
	$sql->query("UPDATE pw SET name='$name',eid='$eid',pass='$pass' WHERE id='$id'");
	if($sql->affected_rows) return 1;
	return 0;
}
function changePass($newPass){
	loginCotrol();
	global $sql;
	$sorgu	= $sql->query("SELECT * FROM pw");
	while($s = $sorgu->fetch_assoc()){
		$sql->query("UPDATE pw SET name='".encrypt($newPass,decrtypt(PW,$s['name']))."',eid='".encrypt($newPass,decrtypt(PW,$s['eid']))."',pass='".encrypt($newPass,decrtypt(PW,$s['pass']))."' WHERE id='".$s['id']."'");
	}
	if($sql->errno > 1) return 0;
	$file	= 'pass.word';
	$f		= fopen($file,'w');
	fwrite($f,encrypt("DUHKAN",$newPass));
	logout();
	return 1;
}
function login($pass){
	$file	= 'pass.word';
	$f		= fopen($file,'r');
	if(fread($f,filesize($file)) == encrypt("DUHKAN",$pass)){
		$_SESSION['oturum'] = $pass;
		return 1;
	}else{
		return 0;
	}
}
function loginCotrol(){
	if(!@$_SESSION['oturum']) die(0);
}
function logout(){
	$_SESSION = array();
	session_destroy();
}
?>


















