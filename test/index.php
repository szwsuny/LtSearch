<?php
/**
* @file index.php
* @brief index 调用情况
* @author sunzhiwei
* @version 1.0
* @date 2019-01-27
 */

require __DIR__ . "/../vendor/autoload.php";

use Suny\ltSearch;

$ltSearch = new ltSearch();
$ltSearch->addIndex(1,"新增一条索引");
