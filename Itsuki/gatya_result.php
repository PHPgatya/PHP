<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> 頭皮にやさしい ガチャガチャ </title>
</head>
<body>

<?php 
//		ループ回数設定
		$roop_temp = 0;
		if(isset($_SESSION['gatya_kaisuu']) && $_SESSION['gatya_kaisuu'] == "1")
		{
 			$roop_temp = 1;
 		}
 		else if(isset($_SESSION['gatya_kaisuu']) && $_SESSION['gatya_kaisuu'] == "10"){
 			$roop_temp = 10;
 		}
 		else
 	  	{
 	  		$_SESSION['us'] = null;
 	  	}

 		if(isset($_SESSION['us']) && $_SESSION['us'] != null)
 		{
?>
 			<p style="color: red">	ようこそガチャへ (=^..^=)</p>

<?php
//			ガチャ結果表示
		 	require_once("db_init.php");
			$ps = $db->query("SELECT * FROM tempbox ORDER BY GetNumber DESC");

	 		for($i = 1; $i <= $roop_temp; $i++)
	 		{
				$r = $ps->fetch();

				print "<p>レア度{$r['rare']} : 【モンスター名:{$r['name']}】<BR></p>";
 			}

//			ガチャ後リンク
 			if($roop_temp == 1)
			{
	 			print "<a href='g_logoff.php'>もう一度ガチャを引く</a></p>";
	 		}
	 		else 
	 		{
	 			print "<a href='g_logoff.php'>もう一度ガチャを引く</a></p>";
	 		}
 	 		print "<p><a href='g_up.php'>マイページ</a><br>";
 	 	}
 	 	else
 	  	{
 	  		session_destroy();
 				print "<p>エラー：：不正なガチャデータです。再度ログインしてお試しください。<br>
 						<a href='g_logon.html'>ログオン</a></p>";
 	  	}
?>

 </body>
 </html>