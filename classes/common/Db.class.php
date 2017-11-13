<?php

namespace app\common;

/**
 * Db クラス
 * @brief SQLを受け取るクラス
 */
class Db
{
  //!PDOインスタンス
  static private $instance = null;

  //!コンストラクタ
  private function __construct()
  {

  }

/**
 * @fn
 * PDOインスタンスを返すメソッド
 * @return var PDOインスタンス
 */
  private static function getInstance()
  {
    if(is_null(self::$instance))
    {
      //PDOインスタンスのオプションを設定
      $options = array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_AUTOCOMMIT => true
      );
      //PDOインスタンスを作成
      self::$instance = new \PDO(
        sprintf(DSN, DBNAME),
        DBUSER,
        DBPASS,
        $options
      );
    }
    return self::$instance;
  }

  /**
   * クローン
   */
  final public function __clone(){
    $msg = sprintf('Clone is not allowes against %s', get_class($this));
    throw new \Exception($msg);
  }

  /**
   * トランザクション実行
   */
  public static function transaction()
  {
    self::getInstance()->beginTransaction();
  }

  /**
   * コミット
   */
  public static function commit()
  {
    self::getInstance()->commit();
  }

  /**
   * ロールバック
   * @return void
   */
  public static function rollback()
  {
    self::getInstance()->rollback();
  }

  /**
   * セレクト実行
   * @param  string $sql SQL文
   * @param  array  $arr プリペアードステートメントに挿入する値
   * @return array      結果
   */
  public static function select($sql, array $arr = array())
  {
    $stmt = self::getInstance()->prepare($sql);
    $stmt->execute($arr);
    return $stmt->fetchAll();
  }

  /**
   * インサート実行
   * @param  string $sql SQL文
   * @param  array  $arr プリペアードステートメントに挿入する値
   * @return int      挿入したカラムのID
   */
  public static function insert($sql, array $arr)
  {
    if(!self::getInstance()->inTransaction())
    {
      throw new \Exception('Not in transaction!');
    }
    $stmt = self::getInstance()->prepare($sql);
    $stmt->execute($arr);
    return self::getInstance()->lastInsertId();
  }

  /**
   * アップデート実行
   * @param  string $sql SQL文
   * @param  array  $arr プリペアードステートメントに挿入する値
   * @return int      結果
   */
  public static function update($sql, array $arr)
  {
    if(!self::getInstance()->inTransaction())
    {
      throw new \Exception('Not in transaction!');
    }
    $stmt = self::getInstance()->prepare($sql);
    return $stmt->execute($arr);
  }

  /**
   * デリート実行
   * @param  string $sql SQL文
   * @param  array  $arr プリペアードステートメントに挿入する値
   * @return int      結果
   */
  public static function delete($sql, array $arr)
  {
    if(!self::getInstance()->inTransaction())
    {
      throw new \Exception('Not in transaction!');
    }
    $stmt = self::getInstance()->prepare($sql);
    return $stmt->execute($arr);
  }
}
