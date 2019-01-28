<?php
/**
* @file Remove.php
* @brief 索引移除
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

namespace SzwSuny\LT\Search\Index;

use SzwSuny\LT\Search\Config;
use SzwSuny\LT\Search\Cache;

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
        $words = Cache::readWords($id);

        foreach($words as $word)
        {
            $indexs = $this->removeIndex($id,$word);
            Cache::writeIndex($word,$indexs);
            Cache::deleteWords($id);
        }

        return true;
    }

    public function removeIndex(int $id,string $word)
    {
        $indexs = Cache::readIndex($word);

        $length = intval($id / Config::INDEX_UNIT_MAX);
        $surplus = $id % Config::INDEX_UNIT_MAX;

        $baseIndex = 1 << $surplus;

        if(($indexs[$length] >> $surplus & 1) == 1)
        {
            $indexs[$length] = $indexs[$length] - $baseIndex;
        }

        return $indexs;
    }
}
