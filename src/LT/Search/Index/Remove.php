<?php
/**
* @file Remove.php
* @brief 索引移除
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

namespace Suny\LT\Search\Index;

use Suny\LT\Search\Config;
use Suny\LT\Search\Cache;

class Remove 
{


    /**
        * @brief 移除指定文档id的索引
        *
        * @param $id 文档id
        *
        * @return bool
     */
    public function remove(int $id):bool
    {

        return true;
    }
}
