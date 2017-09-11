<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>頭皮にやさしい ガチャガチャ</title>
</head>
<body>
	<p style="color: red">	ようこそガチャへ()</p>

	<?php
		if(isset($_SESSION['us']) && $_SESSION['us'] != null)
		{
//			ループ回数の設定
			$roop_temp;
 			if(isset($_SESSION['gatya_kaisuu']) && $_SESSION['gatya_kaisuu'] == "1")
			{
				$roop_temp = 1;
			}
			else if(isset($_SESSION['gatya_kaisuu']) && $_SESSION['gatya_kaisuu'] == "10")
			{
				$roop_temp = 10;
			}
			else
 	  		{
 	  			session_destroy();
 	  		}

			if(isset($_SESSION['gatya_start']) && $_SESSION['gatya_start'] == "true")
			{
//				対応するIDを検索
				require_once("db_init.php");
				$ps = $db->query("SELECT ID, name, rare FROM gatya WHERE ID='$Get_charID'");

//				ガチャメイン
 				if($ps->rowCount()>0)
 				{
	 				for($i = 1; $i <= roop_temp; $i++)
	 				{
	 					$Get_charID = rand(1, 10);
 						$r = $ps->fetch();

//						データベースに追加
 						$ps = $db->prepare("INSERT INTO tempbox ( ID, name, rare) VALUES (:v_id, :v_name, :v_rare)");
	 					$ps->bindParam(':v_id', $r['ID']);
 						$ps->bindParam(':v_name', $r['name']);
 						$ps->bindParam(':v_rare', $r['rare']);
 						$ps->execute();
 					}
 				}

//				セッション変数の初期化
 				$_SESSION['gatya_start'] = "false";
	?>

		 		<p><a href="gatya_result.php">結果へ移動！！</a></p>

 	<?php
 			}
 			else
 			{
 				session_destroy();
 				print "<p>エラー：：不正なガチャデータです。再度ログインしてお試しください。<br>
 						<a href='g_logon.html'>ログオン</a></p>";
 			}
 		}
 		else
 		{
 			session_destroy();
 			print "<p>ちゃんとログオンしてね！<br>
 					<a href='g_logon.html'>ログオン</a></p>";
 		}
 	?>

</body>
</html>