<?php
/**
* @file Update.php
* @brief 修改索引
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

namespace Suny\LT\Search\Index;

use Suny\LT\Search\Config;
use Suny\LT\Search\Cache;

class Update
{

    /**
        * @brief 修改一条索引
        *
        * @param $id 文档id
        * @param $words 拆分后的关键词
        *
        * @return bool
     */
    public function update(int $id,array $words):bool
    {

        return true;
    }
}
