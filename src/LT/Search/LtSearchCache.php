<?php
/**
 * @file LtSearchCache.php
 * @brief 索引缓存操作，目前采用io模式，请根据需要自己改成redis或其他方式
 * @author sunzhiwei
 * @version 1.0
 * @date 2019-01-28
 */

namespace Suny;

class ltSearchConfig
{

    /**
     * @brief 写入索引， $key 或做md5方式，数组使用空行分隔
     *
     * @param $key 关键词
     * @param $array 索引数组
     *
     * @return bool 
     */
    public static function writeIndex(string $key,array $array):bool
    {
        return true;
    }


    /**
     * @brief 读取某一关键词索引
     *
     * @param $key 关键词
     *
     * @return array
     */
    public static function readIndex(string $key):array
    {

        return [];
    }


    /**
     * @brief 将建立索引的关键词写入，将来用于更新，删除索引
     *
     * @param $id 文档id
     * @param $array 已经拆分的关键词
     *
     * @return bool
     */
    public static function writeWords(int $id,array $array):bool
    {

        return true;
    }


    /**
     * @brief 读取文档拆分的关键词
     *
     * @param $id 文档id
     *
     * @return array
     */
    public static function readWords(int $id):array
    {

        return [];
    }


    /**
     * @brief 对搜索结果进行存储
     *
     * @param $words 拆分后的关键词
     * @param $array 结果集
     *
     * @return bool
     */
    public static function writeResult(array $words,array $array):bool
    {

        return true;
    }


    /**
     * @brief 读取结果集
     *
     * @param $words 拆分后的关键词
     *
     * @return 
     */
    public static function readResult(array $words):array
    {

        return [];
    }


    /**
     * @brief 创建文件夹
     *
     * @param $path文件夹路径
     *
     * @return 
     */
    private static function createDir($path):bool
    {
        if(!is_dir($path))
        {
            mkdir($path,0777,true);
            return true;
        }

        return false;
    }
}
