<?php

namespace Smart\CustomOption\Plugin;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\CustomOptions as BaseCustomOptions;
use Magento\Framework\UrlInterface;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Field;

class CustomOptions
{
    protected $urlBuilder;

    public function __construct(
        UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @param BaseCustomOptions $subject
     * @param array $meta
     * @return array
     */
    public function afterModifyMeta(BaseCustomOptions $subject, $meta)
    {
        $imageFieldConfig = $this->getImageFieldConfig(60);
        $meta['custom_options']['children']['options']['children']['record']['children']
        ['container_option']['children']['values']['children']['record']['children']['image'] = $imageFieldConfig;
        return $meta;
    }

    /**
     * @param int $sortOrder
     * @return array
     */
    protected function getImageFieldConfig($sortOrder)
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Image'),
                        'componentType' => Field::NAME,
                        'formElement' => 'imageUploader',
                        'previewTmpl' => "Magento_Catalog/image-preview",
                        'dataScope' => 'image',
                        'elementTmpl' => "ui/form/element/uploader/image",
                        'uploaderConfig' => [
                            'url' => 'catalog/category_image/upload',
                        ],
                        'initialMediaGalleryOpenSubpath' => 'catalog/category',
                        'dataType' => Text::NAME,
                        'sortOrder' => $sortOrder,
                    ],
                ],
            ],
        ];
    }

    protected function urlConfig(UrlInterface $urlBuilder)
    {
        return $this->urlBuilder = $urlBuilder;
    }
}
