<?php
/**
* @file Search.php
* @brief 搜索
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

namespace SzwSuny\LT\Search\Index;

use SzwSuny\LT\Search\Config;
use SzwSuny\LT\Search\Cache\Cache;

class Search
{

    /**
        * @brief 搜索
        *
        * @param $words 搜索拆分后的关键字
        *
        * @return array
     */
    public function search(array $words):array
    {
        $wordsIndex = [];
        foreach($words as $word)
        {
            $wordsIndex[] = Cache::readIndex($word);
        }

        $minCount = 0;
        foreach($wordsIndex as $indexs)
        {
            if(count($indexs) < $minCount || $minCount == 0)
            {
                $minCount = count($indexs);
            }
        }

        $indexResult = [];
        for($in = 0;$in < $minCount; $in++)
        {
            $indexTo = [];
            foreach($wordsIndex as $indexs)
            {
                $indexTo[] = $indexs[$in];
            }

            $last = -1;
            for($oi = 0;$oi < count($indexTo);$oi++)
            {
                $nIndex = $indexTo[$oi] ?? 0;

                if($nIndex == 0)
                {
                    $last = 0;
                    break;
                }

                if($last == -1)
                {
                    $last = $nIndex; 
                    continue;
                }
            
                $last = $last & $nIndex;
            }

            $perValue = $in * Config::INDEX_UNIT_MAX;

            for($i = 0; $i < Config::INDEX_UNIT_MAX;$i++)
            {
                $nValue = $last >> $i & 1;
                if($nValue == 1)
                {
                    $indexResult[] = $perValue + $i;
                }
            }
        }

        rsort($indexResult,SORT_NUMERIC);
        return $indexResult;
    }
}
