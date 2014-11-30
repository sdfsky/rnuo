<?php

/*
 * www.rongnuo.net 融诺网
 * Copyright(C)2015 http://www.rongnuo.net All Rights reserved
 * Author: 宋登峰 <sky_php@qq.com> <http://www.tipask.com>
 */

namespace Home\Controller;

/**
 * 文档模型控制器
 * 文档模型列表和详情
 */
class ProductController extends HomeController {
    /* 文档模型频道页 */

    public function index() {
        /* 分类信息 */
        $category = $this->category();

        //频道页只显示模板，默认不读取任何内容
        //内容可以通过模板标签自行定制

        /* 模板赋值并渲染模板 */
        $this->assign('category', $category);
        $this->display($category['template_index']);
    }

    /**
     * 贷款首頁
     */
    public function loan() {
        $this->display("daikuan");
    }

    /**
     * 车贷首頁
     */
    public function carloan() {
        $this->display("chedai");
    }

    /**
     * 房贷首頁
     */
    public function houseloan() {
        $this->display("fangdai");
    }

}
