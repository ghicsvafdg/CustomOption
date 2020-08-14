<?php

namespace Smart\CustomOption\Plugin;

use Magento\Catalog\Ui\DataProvider\Product\Form\ProductDataProvider;

class GetImage
{
    private $_objectManager;

    public function __construct() {

    }

    /**
     * @param ProductDataProvider $subject
     * @param $data
     * @return array
     */
    public function afterGetData(ProductDataProvider $subject, $data)
    {
//                echo '<pre>' . var_export($data, true) . '</pre>';
//        die();
        foreach ($data as &$product) {
            if (!empty($product['product']['options'])) {
                foreach ($product['product']['options'] as &$options) {
//                    echo '<pre>' . var_export($options['values'], true) . '</pre>';
                    if (!empty($options['values'])) {
                        foreach ($options['values'] as &$values) {
                            if (isset($values['image'])) {
                                $image = $values['image'];
                                $values['image'] = [json_decode($image, true)];
                            }
                        }
                    }
                }
            }
        }
//        echo '<pre>' . var_export($data, true) . '</pre>';
//        die();
//
//        $string = $data[5]['product']['options'][0]['values'][0]['image'];
//        $data[5]['product']['options'][0]['values'][0]['image'] = [json_decode($string, true)];
//        echo '<pre>' . var_export($data, true) . '</pre>';
//        die;
        return $data;
    }
}
