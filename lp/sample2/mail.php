<?php
 mb_language("Japanese");
 mb_internal_encoding("UTF-8");
 
 //設定
   $sendmail = 'horiguchi_seito@liginc.co.jp';    //問い合わせ先メールアドレス (自分のメアド)
   $from     = $_POST['email'];  //送信元メールアドレス
 
 //管理者へ届くメール 本文
   $body  = sprintf("お名前：%s\n" ,$_POST['name'] );
   $body .= sprintf("メールアドレス：%s\n" ,$_POST['email'] );
   $body .= sprintf("内容：%s\n" ,$_POST['str'] );
   
   sendMail($body,'お問い合わせ',$sendmail,$from);
   
 //送信者へ届くメール 本文
   $body  = "以下の内容でお問い合わせを受け付けました\n\n";
   $body .= sprintf("お名前：%s\n" ,$_POST['name'] );
   $body .= sprintf("メールアドレス：%s\n" ,$_POST['email'] );
   $body .= sprintf("内容：%s\n" ,$_POST['str'] );
   
   sendMail($body,'お問い合わせありがとうございます',$from,$sendmail); 
 
/*
 * メール送信処理
 */
 function sendMail($body,$subject,$sendmail,$from){
   $header  = "From: $from"."\n"."X-Priority: 1"."\n"."X-Mailer: PHP/".phpversion();  
   mb_send_mail($sendmail,$subject,$body,$header);
 }
?>