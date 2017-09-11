<?php
session_start();
?>

<HTML>
<HEAD>
<META HTTP EQUIV='Content-Type' CONTENT='text/html;charset=UTF-8'>
<TITLE>ガチャガチャ</TITLE>
</HEAD>
<BODY>

<?php
if (isset($_SESSION['us']) && $_SESSION['us'] != null){
?>
<P STYLE='color: red'>ガチャガチャ</P>
<P><A HREF='gatya_roll1.php'>単発ガチャ！</A><BR>
<P><A HREF='gatya_roll10.php'>10連ガチャ！</A><BR>
<A HREF='gatya_box.php'>ボックス</A></P>

<A HREF='gatya_logoff.php'>ログオフ</A></P>

<?php
}else{
    session_destroy();
    print "<P>ちゃんとログオンしてね！<BR>
           <A HREF='gatya_logon.html'>ログオン</A></P>";
}
?>
</BODY>
</HTML>
