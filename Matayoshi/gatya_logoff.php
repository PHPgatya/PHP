<?php
	session_start();


$_SESSION = array();
if(isset($_COOKIE["PHPSESSID"])){
	setcookie("PHPSESSID", '',time() - 3600, '/');
}
session_destroy();
?>
<HTML>
<HEAD>
<META HTTP EQUIV='Content-Type' CONTENT='text/html;charset=UTF-8'>
<TITLE>ご利用ありがとうございました</TITLE>
</HEAD>
<BODY>
<P STYLE = 'color: red'>ガチャガチャ</P>
<P>またのご来場お待ちしています。<BR>
<A HREF = 'gatya_logon.html'>再度ログオンするときはここから</A></P>
</BODY>
</HTML>