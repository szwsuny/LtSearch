<?php
/**
 * @file Cache.php
 * @brief 主存储程序
 * @author sunzhiwei
 * @version 1.1.3
 * @date 2019-01-31
 */

namespace SzwSuny\LT\Search\Cache;

use SzwSuny\LT\Search\Config;

/**
 * @brief 别问我为啥还要写一遍，魔术方法ide不提示~~~，哈哈哈哈哈哈任性
 */
class Cache
{

    /**
     * @brief 需要调用的存储单元
     */
    private static $cacheUnit = null;

    /**
     * @brief 存储配置对应的单元对象
     */
    private static $cacheUnits = [
        Config::STORAGE_IS_FILE   => '\SzwSuny\LT\Search\Cache\FileCache',
        Config::STORAGE_IS_REDIS  => '\SzwSuny\LT\Search\Cache\RedisCache',
    ];

    /**
     * @brief 初始化存储单元
     *
     * @return ACache 
     */
    private static function setCache()
    {
        if(self::$cacheUnit === null) 
        {
            $unit = self::$cacheUnits[Config::STORAGE_TYPE];
            $config = Config::STORAGE_CONFIG[Config::STORAGE_TYPE];

            self::$cacheUnit = new $unit($config);
        }

        return self::$cacheUnit;
    } 

    /**
     * @brief 写入索引
     *
     * @param $id
     * @param $word
     *
     * @return 
     */
    public static function writeIndex(string $word,array $index):bool
    {
        self::setCache();
        return self::$cacheUnit->writeIndex($word,$index);
    }

    /**
     * @brief 读取索引
     *
     * @param $word
     *
     * @return 
     */
    public static function readIndex(string $word):array
    {
        self::setCache();
        return self::$cacheUnit->readIndex($word);
    }

    /**
     * @brief 写入分词后的数组
     *
     * @param $id
     * @param $words
     *
     * @return 
     */
    public static function writeWords(int $id,array $words):bool
    {
        self::setCache();
        return self::$cacheUnit->writeWords($id,$words);
    }

    /**
     * @brief 读取分词后的数组
     *
     * @param $id
     *
     * @return 
     */
    public static function readWords(int $id):array
    {
        self::setCache();
        return self::$cacheUnit->readWords($id);
    }

    /**
     * @brief 写入查询结果集
     *
     * @param $key
     * @param $value
     *
     * @return 
     */
    public static function writeResult(string $key,array $value):bool
    {
        self::setCache();
        return self::$cacheUnit->writeResult($key,$value);
    }

    /**
     * @brief 读取查询结果集
     *
     * @param $key
     *
     * @return 
     */
    public static function readResult(string $key):array
    {
        self::setCache();
        return self::$cacheUnit->readResult($key);
    }
}
