<?php
namespace Smart\CustomOption\Observer;

use Magento\Catalog\Model\Product as Product;
use Magento\Framework\Event\ObserverInterface;

class ProductSaveBefore implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $products = $product->getOptions();
        foreach ($products as $product) {
            $test = [];
            if (isset($product->getData()['values'])) {
                $options = $product->getData()['values'];
                foreach ($options as $option) {
                    if (isset($option['image'])) {
                        $image = $option['image'][0];
                        $option['image'] = json_encode($image);
                    }
                    $test[] = $option;
                }
                $product->setValues($test);
            }
        }
    }
}
