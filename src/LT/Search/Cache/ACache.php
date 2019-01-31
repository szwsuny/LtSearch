<?php
/**
* @file ACache.php
* @brief 
* @author sunzhiwei
* @version 1.1.3
* @date 2019-01-31
 */

namespace SzwSuny\LT\Search\Cache;

use SzwSuny\LT\Search\Cache\ICache;

abstract class ACache implements ICache
{
    protected $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }
}
