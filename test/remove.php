<?php
/**
* @file remove.php
* @brief 移除指定索引
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

require __DIR__ . '/../vendor/autoload.php';

use SzwSuny\LT\Search\LtSearch;

$ltSearch = new LtSearch();
var_dump($ltSearch->remove(2));
