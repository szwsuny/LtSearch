<?php
/**
 * @file Add.php
 * @brief 添加索引操作
 * @author sunzhiwei
 * @version 1.0
 * @date 2019-01-28
 */

namespace SzwSuny\LT\Search\Index;

use SzwSuny\LT\Search\Config;
use SzwSuny\LT\Search\Cache\Cache;

class Add 
{

    /**
     * @brief 新增一条索引
     *
     * @param $id 文档id
     * @param $words 拆分后的词
     *
     * @return bool
     */
    public function add(int $id,array $words):bool
    {
        foreach($words as $word)
        {
            $indexs = $this->makeIndex($id,$word);
            Cache::writeIndex($word,$indexs);
        }

        return true;
    }


    /**
     * @brief 创建并合并索引
     *
     * @param $id 文档id
     * 
     * @param $words 关键词
     *
     * @return array
     */
    private function makeIndex(int $id,string $words):array
    {
        $indexs = Cache::readIndex($words);

        $length = intval($id / Config::INDEX_UNIT_MAX);
        $surplus = $id % Config::INDEX_UNIT_MAX;

        $baseIndex = 1 << $surplus;

        //对前方的数组进行补全
        for($i = 0;$i < $length + 1;$i++)
        {
            if(!isset($indexs[$i]))
            {
                $indexs[$i] = 0;
            }

            if($i == $length)
            {
                $indexs[$i] = $indexs[$i] | $baseIndex;
            }
        }

        return $indexs;
    }
}
