<?php

namespace app\common;

/**
* ErrorCode クラス
* @brief エラーコードに対応するメッセージを管理するクラス
*/
class ExceptionCode
{
    //エラーコードの定義
    const INVALID_ERR = 1000;
    const INVALID_ADDRESS_ERR = 1001;
    const INVALID_LOGIN_FAIL = 1002;
    const INVALID_URL = 1003;
    const INVALID_PICTURE = 1004;
    const INVALID_FORM = 1005;
    const INVALID_DATE = 1006;
    const INVALID_DELETE = 1007;
    const APPLICATION_ERR = 2000;
    const SYSTEM_ERR = 3000;
    
    //メッセージの定義
    static private $_arrMessage = array(
    self::INVALID_ERR => '不正な操作です。',
    self::INVALID_ADDRESS_ERR => 'すでに同じアドレスが登録されています。',
    self::INVALID_LOGIN_FAIL => 'ログインに失敗しました。',
    self::INVALID_URL => 'ページが存在しません。',
    self::INVALID_PICTURE => '画像が不正です。',
    self::INVALID_FORM => '必須項目に空欄があるか、パスワードが一致しません。',
    self::INVALID_DATE => '日付が不正です。',
    self::INVALID_DELETE => '予約が入っている商品は削除できません。',
    self::APPLICATION_ERR => 'アプリケーションエラーが発生しました。',
    self::SYSTEM_ERR => 'システムエラーが発生しました。'
    );
    
    /**
    * エラーメッセージを返すメソッド
    * @param  int $intCode エラーコード
    * @return string          エラーメッセージ
    */
    static public function getMessage($intCode)
    {
        if(array_key_exists($intCode, self::$_arrMessage)){
            return self::$_arrMessage[$intCode];
        }
    }
}