<?php
/*
 * Plugin Name: Mapper(真っ裸ー)
 * Plugin URI: 
 * Description: lib/MapperConfig.php にYahooアプリケーションIDを設定してください。
 * Author: Akihito Nakano
 * Version: 0.1
 * Author URI: http://github.com/ackintosh
 */

require_once(dirname(__FILE__) . '/lib/Mapper.php');
require_once(dirname(__FILE__) . '/lib/YahooTextAnalysis.php');
require_once(dirname(__FILE__) . '/lib/MapperConfig.php');

add_filter('the_content', array(new Mapper(), 'strip'));

/* End of file mapper.php */

