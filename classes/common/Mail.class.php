<?php

namespace app\common;
require_once __DIR__."/../../lib/phpmailer/class.phpmailer.php";
require_once __DIR__."/../../lib/phpmailer/class.smtp.php";

/**
 * mail.class.php
 */
class mail
{
  //!送信専用メールアドレス
  const SEND_ONLY_EMAIL = "send-only@lenshare.com";

  //!送信専用メール表示名
  const SEND_ONLY_EMAIL_NAME = "lens-share「レンズシェア」";

  //!送信専用メール　言語
  const SEND_ONLY_EMAIL_LANGUAGE = "japanese";

  //!送信専用メール　文字コード
  const SEND_ONLY_EMAIL_ENCODING = 'utf-8';

  //!ホスト名
  const MAIL_HOST = 'mail.example.com';

  //!ポート
  const MAIL_PORT = '25';

  //!ユーザ名
  const MAIL_USER = 'contact@example.com';

  //!パスワード
  const MAIL_PASS = 'passwordsmtp';

  /**
   * メールを送信する
   * @param string $rec 宛先
   * @param string $sub 題名
   * @param string $body 本文
   * @param array $attachment 添付ファイル
   * @throws \ErrorException
   */
  public static function send($rec, $sub, $body, array $attachment = [])
  {
    Log::write('*** send_mail ***');

    if(empty($rec))
    {
      throw new \Exception('宛先が設定されていません。');
    }
    if(empty($sub))
    {
      throw new \Exception('件名が設定されていません。');
    }
    if(empty($body))
    {
      throw new \Exception('本文が設定されていません。');
    }

    mb_language(self::SEND_ONLY_EMAIL_LANGUAGE);
    mb_internal_encoding(self::SEND_ONLY_EMAIL_ENCODING);

    $from = self::SEND_ONLY_EMAIL;
    $fromname = self::SEND_ONLY_EMAIL_NAME;

    $mail = new PHPMailer;

    $mail->IsSMTP();
    $mail->STMPAuth = TRUE;
    $mail->Host = self::MAIL_HOST;
    $mail->Port = self::MAIL_PORT;
    $mail->Username = self::MAIL_USER;
    $mail->Password = self::MAIL_PASS;

    $mail->CharSet = "iso-2022-jp";
    $mail->Encoding = "7bit";
    
    $mail->AddAddress($rec);
    $mail->From = $from;
    $mail->FromName = mb_encode_mimeheader(
      mb_convert_encoding(
        $fromname,
        "JIS",
        self::SEND_ONLY_EMAIL_ENCODING
      )
    );
    $mail->Subject = mb_encode_mimeheader($sub);
    $mail->Body = mb_convert_encoding(
      $body,
      "JIS",
      self::SEND_ONLY_EMAIL_ENCODING
    );

    foreach($attachment as $bin)
    {
      if(array_key_exists('path',$bin) &&
      array_key_exists('name', $bin) &&
      file_exists($bin['path']))
      {
        $mail->AddAttachment($bin['path'], $bin['name']);
      }elseif (array_key_exists('path', $bin) &&
      file_exists($bin)) {
        $mail->AddAttachment($bin['path']);
      }elseif (file_exists($bin)) {
        $mail->AddAttachment($bin);
      }
    }
    if(!$mail->Send())
    {
      throw new \Exception($mail->ErrorInfo);
    }
  }
}
