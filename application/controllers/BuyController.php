<?php


class BuyController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('OrderModel');
        $this->load->model('OrderItemModel');
        $this->load->helper('url');
    }

    public function select() {
        $products = $this->ProductModel->getAllProducts();
        $this->load->view('buy/select',['products' => $products ]);
    }

    public function order() {
        $postData = $this->input->post();

        try {
            $this->db->trans_start();

            if (count($postData['items']) == 0) {
                throw new Exception('請選擇產品');
            }

            $products = $this->ProductModel->getProductInByPrimaryKeys($postData['items']);

            $total_price = collect($products)->sum('price');

            $orderNo = $this->OrderModel->append([
                'name' => $postData['name'],
                'address' => $postData['address'],
                'phone' => $postData['phone'],
                'total_price' => $total_price
            ],true);


            foreach ($products as $row) {
                $insertOrderItem[] = [
                    'order_id' => $orderNo,
                    'product_id' => $row['id'],
                    'price' => $row['price']
                ];
            }

            if (!is_array($insertOrderItem)) {
                throw new Exception('沒有下訂單');
            }

            $this->OrderItemModel->multi_append($insertOrderItem);

            $this->db->trans_complete();
            redirect('buy/success/' . $orderNo);
        }catch (Exception $e) {
            $this->db->trans_rollback();
            redirect('buy?error=' . $e->getMessage());
        }
    }

    public function success($id) {
        $orderData = $this->OrderModel->getWhere(['id' => $id],1);

        $this->load->view('buy/success',['orderData' => $orderData]);
    }
}