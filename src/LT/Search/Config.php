<?php
/**
 * @file Config.php
 * @brief 搜索配置文件，基本上没啥用
 * @author sunzhiwei
 * @version 1.0
 * @date 2019-01-27
 */

namespace SzwSuny\Lt\Search;

final class Config 
{
    const STORAGE_IS_FILE = 0; //存储类别0 文件 
    const STORAGE_IS_REDIS = 1; //存储类别1 redis
    const STORAGE_TYPE = self::STORAGE_IS_FILE; //存储方式


    const STORAGE_CONFIG = [
        self::STORAGE_IS_FILE => //文本存储方式
        [
            'INDEX_DIR' =>  '/tmp/ltSearch/index/', //索引文件存储目录
            'WORDS_DIR' =>  '/tmp/ltSearch/words/',  //索引分词存储目录
            'RESULT_DIR' => '/tmp/ltSearch/result/', //缓存结果存储目录
            'INDEX_FILE_PREFIX' => 'index_', //索引文件前缀
            'WORDS_FILE_PREFIX' => 'doc_',   //文档文件前缀
            'RESULT_FILE_PREFIX'=> 'result_' //缓存结果缓存文件前缀 
        ],

        self::STORAGE_IS_REDIS => //redis存储方式
        [
            'HOST' => '127.0.0.1',
            'PORT' => '6379',
            'INDEX_KEY_PREFIX'  => 'index_',    //索引key前缀
            'WORDS_KEY_PREFIX'  => 'doc_',      //文档key前缀
            'RESULT_KEY_PREFIX' => 'result_'    //缓存结果key浅醉
        ],
    ];


    /**
     * @brief 索引采用的模式 （只有2种 32位模式 64位模式 ，请根据服务器不同采用）
     */
    const INDEX_UNIT_MAX = 32;

    /**
     * @brief 缓存结果有效时间
     */
    const RESULT_TTY = 10800;
}
