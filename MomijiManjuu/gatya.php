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
<P STYLE='color: red'>　ガチャガチャ　(=^・・^=)</P>
<P><A HREF='g_up.php'>アップロード</A><BR>
<A HREF='g_logoff.php'>ログオフ</A></P>

<?php
    require_once("db_init.php");
    $ps = $db->query('SELECT * FROM table1 ORDER BY ban DESC');
    while ($r = $ps->fetch()){
        $tg = $r['gaz'];
        print "<P>{$r['ban']}【投稿者：{$r['nam']}】{$r['dat']}<BR>"
               . nl2br($r['mes'])
               . "<BR><A HREF='./gz_img/$tg' TARGET='_blank'>
               <IMG SRC='./gz_img/thumb_$tg'></A><HR></P>";
    }
?>
<P><A HREF='g_up.php'>アップロード</A><BR>
<A HREF='g_logoff.php'>ログオフ</A></P>

<?php
}else{
    session_destroy();
    print "<P>ちゃんとログオンしてね！<BR>
           <A HREF='g_logon.html'>ログオン</A></P>";
}
?>
</BODY>
</HTML>
