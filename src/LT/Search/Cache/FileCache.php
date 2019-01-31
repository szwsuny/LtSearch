<?php
/**
 * @file FileCache.php
 * @brief 文件方式存储
 * @author sunzhiwei
 * @version 1.1.3
 * @date 2019-01-31
 */

namespace SzwSuny\LT\Search\Cache;

use SzwSuny\LT\Search\Cache\ACache;
use SzwSuny\LT\Search\Config;

class FileCache extends ACache 
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
        $key = md5($word);
        $fileName = $this->config['INDEX_FILE_PREFIX'] . $key;
        $filePath = $this->config['INDEX_DIR'] . $fileName;

        self::createDir($this->config['INDEX_DIR']);

        $write = implode(' ',$index);
        $result = file_put_contents($filePath,$write);

        return $result !== false;
        
        return true;
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
        $key = md5($word);
        $fileName = $this->config['INDEX_FILE_PREFIX'] . $key;
        $filePath = $this->config['INDEX_DIR'] . $fileName;

        if(!file_exists($filePath))
        {
            return [];
        }

        $result = file_get_contents($filePath);

        return explode(' ',$result);

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
        $fileName = $this->config['WORDS_FILE_PREFIX'] . $id;
        $filePath = $this->config['WORDS_DIR'] . $fileName;

        self::createDir($this->config['WORDS_DIR']);

        $write = implode(' ',$words);
        $result = file_put_contents($filePath,$write);

        return $result !== false;
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
        $fileName = $this->config['WORDS_FILE_PREFIX'] . $id;
        $filePath = $this->config['WORDS_DIR'] . $fileName;

        if(!file_exists($filePath))
        {
            return [];
        }

        $result = file_get_contents($filePath);

        return explode(' ',$result);
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
        $fileName = $this->config['RESULT_FILE_PREFIX'] . $key;
        $filePath = $this->config['RESULT_DIR'] . $fileName;

        self::createDir($this->config['RESULT_DIR']);

        $write = implode(' ',$value);
        $result = file_put_contents($filePath,$write);

        return $result !== false;
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
        $fileName = $this->config['RESULT_FILE_PREFIX'] . $key;
        $filePath = $this->config['RESULT_DIR'] . $fileName;

        if(!file_exists($filePath))
        {
            return [];
        }

        $ctime = filemtime($filePath);

        //判断是否过期
        if(time() - $ctime > Config::RESULT_TTY)
        {
            return [];
        }

        $result = file_get_contents($filePath);

        return explode(' ',$result);
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
