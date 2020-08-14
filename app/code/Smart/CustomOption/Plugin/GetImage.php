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
        foreach ($data as &$product) {
            if (!empty($product['product']['options'])) {
                foreach ($product['product']['options'] as &$options) {
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
        return $data;
    }
}
