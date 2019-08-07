<?php


class ProductCategroyModel_test extends UnitTestCase
{

    /**
     * @var ProductCategoryModel
     */
    private $model;

    public function setup()
    {
        $this->model = $this->newModel('ProductCategoryModel');
    }

    public function test_append()
    {
        $res = $this->model->append(['name' => 'hello']);
        $this->assertTrue($res);
    }
}