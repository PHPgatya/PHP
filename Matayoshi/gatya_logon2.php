<?php
	session_start();

	$u = htmlspecialchars($_POST['user'], ENT_QUOTES);
	$p = htmlspecialchars($_POST['pass'], ENT_QUOTES);
	require_once("../Db_init.php");
?>

<HTML>
<HEAD>
<META HTTP EQUIV='Content-Type' CONTENT='text/html;charser=UTF-8'>
<TITLE>ガチャガチャ</TITLE>
</HEAD>
<BODY>
	
<?php
	$ps = $db->query("SELECT pas FROM table2 WHERE id='$u'");
	if($ps->rowCount()>0)
	{
		$r = $ps->fetch();
		if($r['pas'] === md5($p)){
		$_SESSION['us']= $u;
?>


<P>ようこそガチャガチャへ</P>
<P><A HREF='gatya_mypage.php'>ここをクリックしてマイページにどうぞ</A></P>


<?php
	}else{
		session_destroy();
?>


<P>パスワードが違います<BR>
<A HREF='gatya_logon.html'>ログオン</A></P>


<?php
		}
	}else{
		session_destroy();
?>


<P>ユーザーが登録されていません<BR>
<A HREF='gatya_logon.html'>ログオン画面へ</A></P>


<?php
	}
?>


</BODY>	
</HTML>