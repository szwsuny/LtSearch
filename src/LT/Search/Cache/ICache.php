<?php
/**
 * @file ICache.php
 * @brief 
 * @author sunzhiwei
 * @version 1.1.3
 * @date 2019-01-31
 */

namespace SzwSuny\LT\Search\Cache;

interface ICache
{

    /**
     * @brief 写入索引
     *
     * @param $id
     * @param $word
     *
     * @return 
     */
    public function writeIndex(string $word,array $index):bool;

    /**
     * @brief 读取索引
     *
     * @param $word
     *
     * @return 
     */
    public function readIndex(string $word):array;

    /**
     * @brief 写入分词后的数组
     *
     * @param $id
     * @param $words
     *
     * @return 
     */
    public function writeWords(int $id,array $words):bool;

    /**
     * @brief 读取分词后的数组
     *
     * @param $id
     *
     * @return 
     */
    public function readWords(int $id):array;

    /**
     * @brief 写入查询结果集
     *
     * @param $key
     * @param $value
     *
     * @return 
     */
    public function writeResult(string $key,array $value):bool;

    /**
     * @brief 读取查询结果集
     *
     * @param $key
     *
     * @return 
     */
    public function readResult(string $key):array;
}
