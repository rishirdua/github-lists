function oauth_login() {
	var oauthurl = "https://github.com/login/oauth/authorize?client_id=c87152c56b0cdc93461d&scope=user:follow";
	window.location.href = oauthurl;
};

function get_accesstoken(code) {	
	$.get('token.php?code=' + code, function (access_token) {
	    console.log(access_token);
	    alert(code);
	    alert(access_token);
	    //TODO:
	    //enable div 2
	    //add the access_token to the hidden element
	    //scroll to div 2
	    document.getElementById("list").style.display = "block";
	    document.getElementById("accessToken").value = access_token;

	});
};

function get_users(url, access_token) {
	$.get('users.php?url=' + url, function (users) {
	   console.log(users);
	   var ks = users.split("\n");
       $.each(ks, function(usernum, username){
       	alert(username);
          follow_user(access_token, username);
       });
	});
}

function follow_user(access_token, username) {
	console.log("following"+username+" with "+access_token);
	var followurl = 'https://api.github.com/user/following/' + username + '?access_token=' + access_token;
	$.ajax({
        url: followurl,
        type: "PUT",
        success: function () {
          console.log("followed");
        }
	});
	//TODO: Append to #users
};