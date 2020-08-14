<?php

namespace Smart\CustomOption\Plugin;

use Magento\Catalog\Model\Product;

class ProductPlugin
{
    public function afterGetName(Product $subject, $result)
    {
//        echo "tewssdg";
//        die();
        return $result . ' modified 12314';
    }
}
