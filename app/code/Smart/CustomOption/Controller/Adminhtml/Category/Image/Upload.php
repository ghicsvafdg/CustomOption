<?php

namespace Smart\CustomOption\Controller\Adminhtml\Category\Image;

use Magento\Framework\Controller\ResultFactory;

class Upload extends \Magento\Catalog\Controller\Adminhtml\Category\Image\Upload
{
    public function execute()
    {
        if (!isset($_FILES['image'])) {
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
        }

        if (isset($_FILES['image'])) {
            $imageId = $this->_request->getParam('param_name', 'image');
        } else {
            $imageId = 'product';
        }

        try {
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
