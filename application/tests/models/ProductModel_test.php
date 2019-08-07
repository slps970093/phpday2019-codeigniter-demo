<?php


class ProductModel_test extends UnitTestCase
{
    /**
     * @var ProductModel
     */
    private $model;

    protected function setUp()
    {
        $this->model = $this->newModel('ProductModel');
    }


    public function test_append() {
        $res = $this->model->append([
            'name' => 'hello',
            'price' => '100'
        ]);
        $this->assertTrue($res);
    }
}