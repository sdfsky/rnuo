<?php

/*
 * www.rongnuo.net 融诺网
 * Copyright(C)2015 http://www.rongnuo.net All Rights reserved
 * Author: 宋登峰 <sky_php@qq.com> <http://www.tipask.com>
 */

namespace Admin\Controller;

class ProductController extends AdminController {

    /**
     * 贷款管理首页
     */
    public function index() {
        $productModel = M('Product');
        $productList = $productModel->where(true)->select();
        $this->assign("productlist", $productList);
        $this->display();
    }

    /* 添加贷款 */

    public function add() {
        $this->display();
    }

}
