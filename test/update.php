<?php
/**
* @file update.php
* @brief 修改索引
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

require __DIR__ . '/../vendor/autoload.php';

use SzwSuny\LT\Search\LtSearch;

$ltSearch = new LtSearch();
$result = $ltSearch->update(1,'这条是经过修改的文章');

var_dump($result);
