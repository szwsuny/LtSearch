<?php
/**
 * @file Config.php
 * @brief 搜索配置文件，基本上没啥用
 * @author sunzhiwei
 * @version 1.0
 * @date 2019-01-27
 */

namespace Suny\Lt\Search;

final class Config 
{

    /**
     * @brief 索引文件存储目录
     */
    const INDEX_DIR = '/tmp/ltSearch/index/';

    /**
     * @brief 索引分词存储目录
     */
    const WORDS_DIR = '/tmp/ltSearh/words/';

    /**
        * @brief 结果集目录
     */
    const RESULT_DIR = '/tmp/ltSearch/result/';

    /**
     * @brief 索引采用的模式 （只有2种 32位模式 64位模式 ，请根据服务器不同采用）
     */
    const INDEX_UNIT_MAX = 32;

    /**
        * @brief 索引文件前缀
     */
    const INDEX_FILE_PREFIX = 'index_';

    /**
        * @brief 文档文件前缀
     */
    const DOC_FILE_PREFIX = 'doc_';

    /**
        * @brief 结果集文件前缀
     */
    const RESULT_FILE_PREFIX = 'result_';
}
