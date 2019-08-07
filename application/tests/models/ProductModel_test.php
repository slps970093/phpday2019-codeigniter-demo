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
    public function test_sayHello() {
        echo "hello world";
    }
}