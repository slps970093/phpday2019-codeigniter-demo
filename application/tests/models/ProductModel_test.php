<?php

class ProductModel_test extends UnitTestCase
{
    /**
     * @var ProductModel
     */
    private $model;

    /**
     * @setup
     */
    public function setUp()
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

    /**
     * @test
     */
    public function test_update()
    {
        $this->model->truncate();

        $primaryKey = $this->model->append([
            'name' => 'hello',
            'price' => 666
        ],true);

        $this->model->update(['name' => '我要綠燈'],['id' => $primaryKey]);

        $result = $this->model->getWhere(['id' => $primaryKey],1);

        $this->assertEquals(['id' => 1 ,'name' => '我要綠燈' , 'price' => 666], $result);
    }
}