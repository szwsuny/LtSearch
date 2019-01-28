<?php
/**
 * @file addIndex.php
 * @brief 添加几条索引
 * @author sunzhiwei
 * @version 1.0
 * @date 2019-01-28
 */

require __DIR__ . '/../vendor/autoload.php';

use Suny\ltSearch;

$ltSearch = new ltSearch();

$ltSearch->addIndex(1,'你知道你是谁？');
$ltSearch->addIndex(2,'这是一篇文章的标题');
$ltSearch->addIndex(3,'或者索引你想要的文章');
$ltSearch->addIndex(4,'返回的是一个数组包含所有结果id');
$ltSearch->addIndex(5,'目前采用IO方式，请在配置文件设置索引文件存储位置');
$ltSearch->addIndex(6,'不要放到项目中，索引文件会很多');
$ltSearch->addIndex(7,'你也可以根据需要修改成redis存储');
$ltSearch->addIndex(8,'那样能够提高检索效率');
