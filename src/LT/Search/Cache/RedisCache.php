<?php
/**
* @file RedisCache.php
* @brief Redis存储
* @author sunzhiwei
* @version 1.1.3
* @date 2019-01-31
 */

namespace SzwSuny\LT\Search\Cache;

use SzwSuny\LT\Search\Cache\ACache;
use SzwSuny\LT\Search\Config;

class RedisCache extends ACache
{
    /**
     * @brief 写入索引
     *
     * @param $id
     * @param $word
     *
     * @return 
     */
    public function writeIndex(string $word,array $index):bool
    {
        $key = $this->config['INDEX_KEY_PREFIX'] . md5($word);
        $write = implode(' ',$index);
        $redis = $this->getRedis();
        return $redis->set($key,$write);
    }

    /**
     * @brief 读取索引
     *
     * @param $word
     *
     * @return 
     */
    public function readIndex(string $word):array
    {
        $key = $this->config['INDEX_KEY_PREFIX'] . md5($word);
        $redis = $this->getRedis();
        $result = $redis->get($key);
        if($result === false)
        {
            return [];
        }

        $result = explode(' ',$result);
        return $result;
    }


    /**
     * @brief 写入分词后的数组
     *
     * @param $id
     * @param $words
     *
     * @return 
     */
    public function writeWords(int $id,array $words):bool
    {
        $key = $this->config['WORDS_KEY_PREFIX'] . $id;
        $write = implode(' ',$words);
        $redis = $this->getRedis();
        return $redis->set($key,$write);
    }

    /**
     * @brief 读取分词后的数组
     *
     * @param $id
     *
     * @return 
     */
    public function readWords(int $id):array
    {
        $key = $this->config['WORDS_KEY_PREFIX'] . $id;
        $redis = $this->getRedis();
        $result = $redis->get($key);
        if($result === false)
        {
            return [];
        }

        $result = explode(' ',$result);
        return $result;
    }

    /**
     * @brief 写入查询结果集
     *
     * @param $key
     * @param $value
     *
     * @return bool
     */
    public function writeResult(string $key,array $value):bool
    {
        $key = $this->config['RESULT_KEY_PREFIX'] . $key;
        $write = implode(' ',$value);
        $redis = $this->getRedis();
        return $redis->setex($key,Config::RESULT_TTY,$write);
    }

    /**
     * @brief 读取查询结果集
     *
     * @param $key
     *
     * @return 
     */
    public function readResult(string $key):array
    {
        $key = $this->config['RESULT_KEY_PREFIX'] . $key;
        $redis = $this->getRedis();
        $result = $redis->get($key);
        if($result === false)
        {
            return [];
        }

        $result = explode(' ',$result);
        return $result;
    }

    private function getRedis()
    {
        $host = $this->config['HOST'];
        $port = $this->config['PORT'];

        $redis = new \Redis();
        $redis->connect($host,$port);

        return $redis;
    }
}
