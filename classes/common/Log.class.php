<?php

namespace app\common;

/**
 * Logクラス
 */
class Log
{
    const DESTINATION = BASE_DIR.'log/';

    /**
     * ログを書き込むメソッド
     * @param string $mes
     */
    public static function write($mes, $level = null)
    {
        if(!file_exists(self::DESTINATION) && is_writable(self::DESTINATION))
        {
            mkdir(self::DESTINATION, 0777, true);
        }

        $message = sprintf("%s %s", date("Y-m-d H:i:s"),
        str_replace("\n", ', $mes'));
        
        switch (MODE) {
			case DEVELOPPING:
				\Logger::configure(BASE_DIR . '/Logger.development.xml');
				break;
			case PRODUCTION:
				\Logger::configure(BASE_DIR . '/Logger.product.xml');
				break;
			case TEST:
				\Logger::configure(BASE_DIR . '/Logger.test.xml');
				break;
		}
		$main = \Logger::getLogger('main');
		switch ($level) {
			case \LoggerLevel::TRACE:
				$main->trace($message);
				break;
			case \LoggerLevel::DEBUG:
				$main->debug($message);
				break;
			case \LoggerLevel::INFO:
				$main->info($message);
				break;
			case \LoggerLevel::WARN: // ApplicationError
				$main->warn($message);
				break;
			case \LoggerLevel::ERROR: // SystemError
				$main->error($message);
				break;
			case \LoggerLevel::FATAL:
				$main->fatal($message);
				break;
			default :
				$main->trace($message);
				break;
		}
    }
}