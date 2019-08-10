<?php


use Behat\Mink\Element\NodeElement;
use Behat\MinkExtension\Context\MinkContext;

class BuyProductContext extends MinkContext
{

    private $ci;

    public function __construct()
    {
        require_once  dirname(__FILE__) . DIRECTORY_SEPARATOR. "../../../codeigniter-init.php";
        $this->ci = new CI_Controller();
    }

    /**
     * @Given /^go to product page$/
     */
    public function ProductDataBaseInit() {
        $this->ci->load->model('ProductModel');
        $this->ci->load->model('ProductCategoryModel');

        /** @var ProductModel $this->ProductModel */
        $productModel = $this->ci->ProductModel;
        /** @var ProductCategoryModel $productCategory */
        $productCategory = $this->ci->ProductCategoryModel;

        $productCategory->truncate();
        $productModel->truncate();

        $category_id = $productCategory->append(['name' => '飲料'],true);

        $productModel->append([
            'category_id' => $category_id,
            'name' => '咖啡',
            'price' => 55
        ]);

        $productModel->append([
            'category_id' => $category_id,
            'name' => '牛奶',
            'price' => 40
        ]);

        $this->visit('index.php/buy');
    }

    /**
     * @Given /^I click Coffee$/
     */
    public function IclickProductAsCoffee() {
        $page = $this->getSession()->getPage();


        $element = $page->find('css' , "input[name='items[]'][value='1']");

        if ( !$element instanceof NodeElement) {
            throw new Exception('cannot find element');
        }

        $element->click();
    }

    /**
     * @Given /^I click Milk$/
     */
    public function IclickProductAsMilk() {
        $page = $this->getSession()->getPage();


        $element = $page->find('css' , "input[name='items[]'][value='2']");

        if ( !$element instanceof NodeElement) {
            throw new Exception('cannot find element');
        }

        $element->click();
    }

}