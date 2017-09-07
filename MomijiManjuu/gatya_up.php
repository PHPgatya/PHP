<?php
session_start();
?>

<HTML>
<HEAD>
<META HTTP EQUIV='Content-Type' CONTENT='text/html;charset=UTF-8'>
<TITLE>ガチャガチャ</TITLE>
</HEAD>
<BODY>
<P STYLE='color: red'>　ガチャガチャ</P>

<?php
if (isset($_SESSION['us']) && $_SESSION['us'] != null){
?>

<P>投稿よろしくお願いします！</P>
<FORM ENCTYPE = 'multipart/form-data' ACTION = 'gatya_up_set.php' 
      METHOD = 'post'>
    名前<BR>
    <INPUT TYPE='text' NAME='myn'><BR>
    メッセージ<BR>
    <TEXTAREA NAME='mym' ROWS='10' COLS=70'></TEXTAREA><BR>
    <INPUT TYPE = 'file' NAME='myf'>
    <P>>送信できるのは1MBまでのJPEG画像だけです！<BR>
    また展開後のメモリ消費が多い場合アップロードできません。</P>
    <INPUT TYPE='submit' VALUE='送信'>
</FORM>
<P><A HREF=gatya_mypage.php>一覧表示へ</A></P>

<?php
}else{
     session_destroy();
     print "<P>ちゃんとログオンしてね！<BR>
            <A HREF='gatya_logon.html'>ログオン</A></P>";
}
?>
</BODY>
</HTML>
