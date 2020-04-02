<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title>请先登陆</title>
</head>
<body style="text-align:center;margin-top:200px;">
	<img src="/logints.png">
</body>
</html>
<script src="/jquery-3.1.1.min.js"></script>
<script>
   function delayer(){
 window.location = "/login";
}
jQuery(document).ready(function(){
 setTimeout('delayer()', 2000);
});
</script>
