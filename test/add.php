<?php
/**
 * @file addIndex.php
 * @brief 添加几条索引
 * @author sunzhiwei
 * @version 1.0
 * @date 2019-01-28
 */

require __DIR__ . '/../vendor/autoload.php';

use SzwSuny\LT\Search\LtSearch;

$ltSearch = new LtSearch();

$ltSearch->add(1,'你知道你是谁？');
$ltSearch->add(2,'这是一篇文章的标题');
$ltSearch->add(3,'或者索引你想要的文章');
$ltSearch->add(4,'返回的是一个数组包含所有结果id');
$ltSearch->add(5,'目前采用IO方式，请在配置文件设置索引文件存储位置');
$ltSearch->add(6,'不要放到项目中，索引文件会很多');
$ltSearch->add(7,'你也可以根据需要修改成redis存储');
$ltSearch->add(7,'修改Cache.php代码实现可以调整为其他存储方式');
$ltSearch->add(9,'那样能够提高检索效率');

echo 'ok';
