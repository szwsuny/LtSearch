<?php
/**
* @file search.php
* @brief 搜索结果
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

require __DIR__ . '/../vendor/autoload.php';

use SzwSuny\LT\Search\LtSearch;

$ltSearch = new LtSearch();
$result = $ltSearch->search('文章');

var_dump($result);

/**
 *
 * 结果的id 请跟 add.php里面对照一下就能看到反馈的id为正确结果
 *
 */
