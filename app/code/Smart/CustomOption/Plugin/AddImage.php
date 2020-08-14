<?php

namespace Smart\CustomOption\Plugin;

use Magento\Catalog\Controller\Adminhtml\Category\Image\Upload;

class AddImage
{
    private $_objectManager;

    /**
     * @param Upload $subject
     * @return array
     */
    public function beforeExecute(Upload $subject)
    {
        $test = json_encode($_FILES['product']);
        $image = json_decode($test, true);

        $name = current(current($image['name']['options'])['values'])['image'];

        $type = current(current($image['type']['options'])['values'])['image'];
        $type = preg_replace('/([^A-Za-z0-9\s])/', '\\\\$1', $type);

        $tmp_name = current(current($image['tmp_name']['options'])['values'])['image'];
        $tmp_name = preg_replace('/([^A-Za-z0-9\s])/', '\\\\$1', $tmp_name);

        $error = current(current($image['error']['options'])['values'])['image'];
        $size = current(current($image['size']['options'])['values'])['image'];

        $_FILES = '{"product":{"name":"' . $name . '","type":"' . $type . '","tmp_name":"' . $tmp_name . '","error":' . $error . ',"size":' . $size . '}}';

        $_FILES = json_decode($_FILES, true);

        return $_FILES;
    }
}
