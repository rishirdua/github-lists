function oauth_login() {
	var oauthurl = "https://github.com/login/oauth/authorize?client_id=c87152c56b0cdc93461d&scope=user:follow";
	window.location.href = oauthurl;
};

function logout() {
	window.location = "logout.php";
}

function get_accesstoken(code) {
	$.get('token.php?code=' + code, function (access_token) {
	    //TODO:
	    //enable div 2
	    //add the access_token to the hidden element
	    //scroll to div 2
	    //document.getElementById("list").style.display = "block";
	    document.getElementById("accessToken").value = access_token;
	    document.getElementById("oauthparams").submit();

	});
};

function get_users(url, access_token) {
	$.get('users.php?url=' + url, function (users) {
	   console.log(users);
	   var ks = users.split("\n");
       $.each(ks, function(usernum, username){
       		if (username.length>0) {
       			document.getElementById("users").appendChild(new Option(username));	
       		}
       });
	});
}


function follow(access_token) {
	var users = document.getElementById("users");
	for (x=0; x<=users.length-1; x++) {
        if (users[x].selected) {
         	follow_user(access_token,users[x].value);
        }
  	}
}

function unfollow(access_token) {
	alert("wor");
	var users = document.getElementById("users");
	for (x=0;x<=users.length;x++) {
        if (users[x].selected) {
         	unfollow_user(access_token,users[x].value);
        }
  	}
}

function follow_user(access_token, username) {
	console.log("following "+username+" with "+access_token);
	var followurl = 'https://api.github.com/user/following/' + username + '?access_token=' + access_token;
	$.ajax({
        url: followurl,
        type: "PUT",
        success: function () {
          console.log("followed");
        }
	});
};

function unfollow_user(access_token, username) {
	console.log("following "+username+" with "+access_token);
	var followurl = 'https://api.github.com/user/following/' + username + '?access_token=' + access_token;
	$.ajax({
        url: followurl,
        type: "PUT",
        success: function () {
          console.log("followed");
        }
	});
};