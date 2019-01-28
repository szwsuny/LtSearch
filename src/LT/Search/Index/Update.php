<?php
/**
* @file Update.php
* @brief 修改索引
* @author sunzhiwei
* @version 1.0
* @date 2019-01-28
 */

namespace SzwSuny\LT\Search\Index;

use SzwSuny\LT\Search\Index\Remove;
use SzwSuny\LT\Search\Index\Add;

class Update
{

    /**
        * @brief 修改一条索引 其实就是先删除 在添加。。。
        *
        * @param $id 文档id
        * @param $words 拆分后的关键词
        *
        * @return bool
     */
    public function update(int $id,array $words):bool
    {

        $remove = new Remove();
        $remove->remove($id);

        $add = new Add();
        $add->add($id,$words);

        return true;
    }
}
