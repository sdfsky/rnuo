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
        $search['type'] = I('type');
        $search['name'] = I('name');

        $productModel = M('Product');
        $map = array();
        $search['type'] && $map['type'] = array('eq', $search['type']);
        $search['name'] && $map['name'] = array('LIKE', $search['name'] . '%');
        $productList = $productModel->where($map)->select();
        $this->assign("search", $search);
        $this->assign("productlist", $productList);
        $this->display();
    }

    /* 添加贷款 */

    public function add() {
        if (IS_POST) {
            $productModel = D('Product');
            $productModel->create();
            $id = $productModel->add();
            if (!$id) {
                $this->error("贷款添加失败！");
            }
            $this->success('贷款添加成功！', U('index'));
        }
        $this->display();
    }

    public function edit() {
        $id = I('id');
        if (!$id) {
            $this->error("参数错误，非法请求！");
        }
        $productModel = M('Product');
        if (IS_POST) {
            if ($productModel->create() && $productModel->save()) {
                $this->success("修改保存成功！", U('index'));
            } else {
                $this->error("修改失败");
            }
        }
        $map['id'] = array('eq', $id);
        $product = $productModel->where($map)->find();
        $this->assign("product", $product);
        $this->display();
    }

    /**
     * 修改贷款状态
     */
    public function changeStatus($method = null) {
        $id = array_unique((array) I('ids', 0));
        $id = is_array($id) ? implode(',', $id) : $id;
        if (empty($id)) {
            $this->error('请选择要操作的数据!');
        }
        $map['id'] = array('in', $id);
        switch (strtolower($method)) {
            case 'disable':
                $this->forbid('Product', $map);
                break;
            case 'enable':
                $this->resume('Product', $map);
                break;
            default:
                $this->error('参数非法');
        }
    }

    /**
     * 删除贷款产品
     */
    public function remove() {
        $ids = I('ids');
        $map['id'] = array('in', $ids);
        M('Product')->where($map)->delete();
        $this->success("删除成功吧");
    }

}
