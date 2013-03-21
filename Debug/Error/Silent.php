<?php
/**
 * Обработчик ошибок и вывод дампа переменных
 *
 * @author    Valetin Gernovich <gernovich@ya.ru>
 * @copyright Copyright (c) 2011, Valetin Gernovich. All rights reserved.
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version   0.2
 */

/**
 * Обработчик подавленных ошибок
 */
class Debug_Error_Silent extends Debug_Error_Abstract implements Debug_Error_Interface {

	/**
	 * Подходил ли данный обработчик под отображение ошибки
	 *
	 * @param integer         $code
	 * @param string|Exeption $message
	 *
	 * @return boolean
	 */
	public function is($code, $message) {
		if (error_reporting() == 0) {
			return true;
		}
		return false;
	}

	/**
	 * Отобразить ошибку
	 *
	 * @param integer         $code
	 * @param string|Exeption $message
	 * @param string          $file
	 * @param integer         $line
	 * @param array           $trace
	 * @param integer         $counter
	 *
	 * @return string
	 */
	public function show($code, $message, $file=null, $line=null, $trace=array(), $counter=0) {
		$render = $counter.') @ '.Debug_Processor::$error_type[$code].': '.$message.' в файле '.$file.' строка '.$line;
		return $this->view->showErrorSilent($render, $code);
	}

}