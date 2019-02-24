<?php
require_once('class.phpmailer.php');

$mail = new PHPMailer(); //实例化
$mail->IsSMTP(); // 启用SMTP
$mail->Host = "smtp.163.com"; //SMTP服务器 以163邮箱为例子
$mail->Port = 25;  //邮件发送端口
$mail->SMTPAuth = true;  //启用SMTP认证

$mail->CharSet  = "UTF-8"; //字符集
$mail->Encoding = "base64"; //编码方式

$mail->Username = "xxx@163.com";  //你的邮箱
$mail->Password = "xxx";  //你的授权码


$mail->Subject = "xxx"; //邮件标题

$mail->From = "xxx@163.com";  //发件人地址（也就是你的邮箱）
$mail->FromName = "xxx";  //发件人姓名

$address = $_POST['addressee'];//收件人email
$mail->AddAddress($address, "xxx");//添加收件人（地址，昵称）

$mail->AddAttachment('xxx.xls','xxx.xls'); // 添加附件,并指定名称
$mail->IsHTML(true); //支持html格式内容
$mail->AddEmbeddedImage("xxx.jpg", "my-attach", "xxx.jpg"); //设置邮件中的图片
$mail->Body = '你好, <b>朋友</b>! '; //邮件主体内容

//发送
if(!$mail->Send()) {
  echo "发送失败: " . $mail->ErrorInfo;
} else {
  echo "发送成功！";
}
?>