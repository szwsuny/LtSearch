<?php
/**
 * @file ltSearch.php
 * @brief ltSearch主程序
 * @author sunzhiwei
 * @version 1.0
 * @date 2019-01-27
 */

namespace Suny;

class ltSearch 
{
    /**
     * @brief 新增搜索索引
     *
     * @param $id 给与索引的id,这个id将在搜索结果数组中返回
     * @param $content 要索引的字符串
     *
     * @return bool
     */
    public function addIndex(int $id,string $content):bool
    {
        echo $id;

        return true;
    }

    /**
     * @brief 修改某个id的索引
     *
     * @param $id 要更改索引的id
     * @param $content 更改后的索引字符串  
     *
     * @return bool
     */
    public function updateIndex(int $id,string $content):bool
    {

        return true;
    }


    /**
     * @brief 删除指定id的索引
     *
     * @param $id 删除的索引id
     *
     * @return bool
     */
    public function removeIndex(int $id):bool
    {


        return true;
    }



    /**
     * @brief 搜索内容 
     *
     * @param $content 要搜索的内容
     *
     * @return array
     */
    public function search(string $content):array
    {


        return [];
    }
}
