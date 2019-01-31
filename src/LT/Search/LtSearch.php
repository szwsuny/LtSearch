<?php
/**
 * @file LtSearch.php
 * @brief ltSearch主程序
 * @author sunzhiwei
 * @version 1.0
 * @date 2019-01-27
 */

namespace SzwSuny\LT\Search;

use SzwSuny\LT\Search\SplitWords;
use SzwSuny\LT\Search\Cache\Cache;

class LtSearch 
{
    /**
     * @brief 新增搜索索引 id请最好从1开始，可以是你的文章或者其他的id。
     * 请注意id不能重复，否则或造成索引结果不准确。
     *
     * @param $id 给与索引的id,这个id将在搜索结果数组中返回
     * @param $content 要索引的字符串
     *
     * @return bool
     */
    public function add(int $id,string $content):bool
    {
        $words = SplitWords::getWords($content);

        //创建索引
        $ltSearchAddIndex = new \SzwSuny\LT\Search\Index\Add();
        $ltSearchAddIndex->add($id,$words);

        //保存文档词汇
        Cache::writeWords($id,$words); 

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
    public function update(int $id,string $content):bool
    {
        $words = SplitWords::getWords($content);

        $update = new \SzwSuny\LT\Search\Index\Update();
        return $update->update($id,$words);
    }


    /**
     * @brief 删除指定id的索引
     *
     * @param $id 删除的索引id
     *
     * @return bool
     */
    public function remove(int $id):bool
    {
        $remove = new \SzwSuny\LT\Search\Index\Remove();
        return $remove->remove($id);
    }



    /**
     * @brief 搜索内容 
     *
     * @param $content 要搜索的内容
     *
     * @param $words 分词后数组。可直接使用此数组
     *
     * @return array
     */
    public function search(string $content,array &$words = []):array
    {
        $words = SplitWords::getWords($content);

        $key = md5(implode('_',$words));
        $result = cache::readResult($key);

        if(!empty($result))
        {
            return $result;
        }
        
        $search = new \SzwSuny\LT\Search\Index\Search();
        $result = $search->search($words);

        cache::writeResult($key,$result);

        return $result;
    }


    /**
        * @brief 带分页的搜索结果
        *
        * @param $content 搜索的内容
        * @param $pageIndex 第几页
        * @param $pageSize 每页数量
        * @param $words 分词后的数组
        *
        * @return array
     */
    public function searchPage(string $content,int $pageIndex,int $pageSize,array &$words = []):array
    {
        $pageIndex = $pageIndex < 1 ? 1 : $pageIndex;
        $start = ($pageIndex - 1) * $pageSize;

        $searchResult = $this->search($content,$words);
        $result = array_slice($searchResult,$start,$pageSize);

        return $result;
    }
}
