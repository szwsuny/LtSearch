<?php
/**
* @file SplitWords.php
* @brief 拆分关键词
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

namespace SzwSuny\LT\Search;

class SplitWords
{
    
    /**
        * @brief 外部调用的拆分关键词过程
        *
        * @param $content 要拆分的内容
        *
        * @return 
     */
    public static function getWords(string $content):array
    {
        $words = self::scws($content);
        //去掉重复
        $words = array_flip(array_flip($words));

        return $words;
    }

    
    /**
        * @brief 使用 scws 拆分关键词，根据需要自己编辑
        *
        * @param $content 要拆分的内容
        *
        * @return array
     */
    private static function scws(string $content):array
    {
        $so = scws_new();
        $so->send_text($content);
        $so->set_multi(SCWS_MULTI_SHORT);
        $so->set_ignore(true);
        $result = [];
        while ($tmp = $so->get_result())
        {
            foreach($tmp as $item)
            {
                $result[] = $item['word'];
            }
        }
        $so->close();
        return $result;
    }
}
