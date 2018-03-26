//Definitions
var passlist	= $('#passList');
var i;
//FUNCTIONS
function search(v){
	var input, filter, table, tr, td, i;
	filter = v.toUpperCase();
	table = document.getElementById("passList");
	tr = table.getElementsByTagName("tr");
  
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		td2 = tr[i].getElementsByTagName("td")[1];
		if(td){
			$('.page-navigation').remove();
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1){
				tr[i].style.display = "";
			}else{
				tr[i].style.display = "none";
			}
		} 
	}
}
//login
function login(){
	var loginpass	= $('#loginpass');
	var login		= $('#login');
	var pass 		= loginpass.val();
	$.ajax({
		url:'ajax.php?q=login',
		data:'pass='+pass,
		method:'POST',
		success:function(e){
			if(e==1){
				location.reload();
			}else{
				loginpass.css('border-color','red');
				login.css('background-color','red');
				setTimeout(function(){loginpass.css('border-color','#9191ff');login.css('background-color','#e4e4ff');},3000);
			}
		}
	});
}
//logout
function logout(){
	$.ajax({
		url:'ajax.php?q=logout',
		success:function(){
			window.location='index.php';
		}
	});
}
//ChangePass
function changepass(){
	var pass1	= $('#pass1');
	var pass2	= $('#pass2');
	var p1		= pass1.val();
	var p2		= pass2.val();
	if(p1 == p2){
		$.ajax({
			url:'ajax.php?q=newpass',
			data:'newpass='+p1,
			method:'POST',
			success:function(e){
				if(e==1){
					alert("The password has been changed.You will now be redirected to login page!");
					window.location = 'index.php';
				}else{
					alert(e);
				}
			}
		});
	}else{
		pass1.val('');
		pass2.val('');
		alert("Passwords does not match!");
	}
}
//ShowPass
function showpass(e){
	if(e.html() == "Show Password"){
		e.html("Hide Password");
		e.parent().prev().find('input').attr('type','text');
	}else{
		e.html("Show Password");
		e.parent().prev().find('input').attr('type','password');			
	}
}
//New entry
function newEntry(){	
	var name		= $('#aname').val();
	var eid			= $('#aemail').val();
	var pass		= $('#apass').val();
	$.ajax({
		url:'ajax.php?q=add',
		data:'name='+name+'&email='+eid+'&pass='+pass,
		method:'POST',
		success:function(e){
			if(e>0){
				var append = '';
				append += "<tr data-id='"+e.trim()+"'>";
				append += "<td><input type='text' class='tabloinput' value='"+name+"'></td>";
				append += "<td><input type='text' class='tabloinput' value='"+eid+"'></td>";
				append += "<td><div class='row'>";
				append += "<div class='seven columns'> <input type='password' class='u-full-width' value='"+pass+"'/></div>";
				append += "<div class='five columns'><img src='trash.svg'/><button class='button' style='padding:0 3px;'>Show Password</button></div>";
				append += "</div></tr>";
				$('#passList tbody').append(append);
				$('.page-navigation').remove();
				$('#passList').paginate({limit:5,initialPage:i,onSelect:function(t,i){i=i;}});
			}else{
				alert(e);
			}
		}
	});
}
//Delete entry
function deleteEntry(t){
	var tr 	= t.parent().parent().parent().parent();
	var id	= tr.data('id');
	var i	= $('#passList tr').index(tr);
	var s	= Math.ceil((i)/5) - 1;
	t.attr('src','deleting.svg');
	$.ajax({
		url:'ajax.php?q=delete',
		data:'id='+id,
		method:'POST',
		success:function(e){
			if(e==1){
				t.attr('src','trash.svg');
				tr.remove();
				$('.page-navigation').remove();
				if($('#passList tr').size()%5 == 1){s = s-1;}
				$('#passList').paginate({limit:5,initialPage:s,onSelect:function(t,i){i=i;}});
				if($('#passList tr').length <= 6){
					$('#passList tr').show();
				}
			}else{
				alert(e);
			}
		}
	});
}
//Edit entry
function editEntry(e,t){
	if (e.keyCode == 13) {
		var t	= t.closest('tr');
		var to	= setInterval(function(){
			t.find('input,button').animate({backgroundColor: "#d8d8d8"},100);
			setTimeout(function(){t.find('input,button').animate({backgroundColor: "#fff"},100);},100);
		},200);
		var name	= $('input:eq(0)',t).val();
		var eid		= $('input:eq(1)',t).val();
		var pass	= $('input:eq(2)',t).val();
		var id		= t.data('id');
		$.ajax({
			url:'ajax.php?q=edit',
			data:'id='+id+'&name='+name+'&eid='+eid+'&pass='+pass,
			method:'POST',
			success:function(e){
				clearInterval(to);
				t.find('input,button').animate({backgroundColor: "#1bd600"},100);
				t.find('input,button').animate({backgroundColor: "#fff"},2000);
			}
		});
	}
}
//Expand
function expand(){
	var t	= $('#expand span');
	var e	= $('#expandable');
	var e2	= $('#expandable2');
	e2.toggle(100);
	e.slideToggle(100, function () {
		t.html(function () {
			return e.is(":visible") ? "Collapse" : "Expand";
		});
    });
	
}


$(function(){
	//Loading
	setTimeout(function(){$('#loading').hide();},500);
	//Login
	$('#login').on('click',function(){
		login();
	});
	$('#loginpass').on('keyup',function(e){
		if(e.keyCode==13){
			$('#login').click(); 
		}
    });
	//LogOut
	$('#logout').on('click',function(){
		logout();
	});
	//ChangePass
	$('#cpassb').on('click',function(){
		changepass();
	});
	//Show Password Button
	$('#passList').on('click','button',function(){
		showpass($(this));
	});
	//New entry
	$('#add').on('click',function(){
		newEntry();
	});
	//Delete entry
	$('#passList').on('click','img',function(){
		deleteEntry($(this));
	});
	//Edit
	$('#passList').on('keyup','input',function(e){
		if(e.keyCode==13){
			editEntry(e,$(this));			
		}
	});
	//Check pagination
	$('.search').on('keyup',function(){
		$('.search').not(this).val(this.value);
		if(this.value == ''){
			$('#passList').paginate({ limit: 5,onSelect:function(t,i){i=i;} });
		}
	});
	$('#passList').paginate({ limit: 5,onSelect:function(t,i){i=i;} });
});










