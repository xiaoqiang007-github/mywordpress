<?php
$txt = "hello";

$mail = '2485669551@qq.com';
// �����ʼ�
mail($mail, "My subject", $txt);
echo 'message was sent!';
?>