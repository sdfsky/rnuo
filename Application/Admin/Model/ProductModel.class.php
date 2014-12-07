<?php

/*
 * www.rongnuo.net 融诺网
 * Copyright(C)2015 http://www.rongnuo.net All Rights reserved
 * Author: 宋登峰 <sky_php@qq.com> <http://www.tipask.com>
 */

namespace Admin\Model;
use Think\Model;

class ProductModel extends Model {

    protected $_validate = array(
        array('name', '1,16', '贷款名称长度为1-100个字符', self::EXISTS_VALIDATE, 'length'),
        array('name', '', '贷款名称占用', self::EXISTS_VALIDATE, 'unique'),
    );


    /* 自动完成规则 */
    protected $_auto = array(
        array('applys', 0, self::MODEL_INSERT),
        array('views', 0, self::MODEL_INSERT),
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('update_time', NOW_TIME, self::MODEL_BOTH),
    );

}
