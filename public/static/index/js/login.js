
function doLogin() {
	var user_name = $("input[name='user_name']").val();
	var user_pwd = $("input[name='user_pwd']").val();
	$.post(login_ajax_url,{user_name,user_pwd},function (rtnData) {
		// 同学很好
		console.log(rtnData)
	})
}	