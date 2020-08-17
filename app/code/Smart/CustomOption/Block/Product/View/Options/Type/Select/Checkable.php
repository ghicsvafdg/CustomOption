<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Smart\CustomOption\Block\Product\View\Options\Type\Select;

use Magento\Catalog\Api\Data\ProductCustomOptionValuesInterface;
use Magento\Catalog\Block\Product\View\Options\AbstractOptions;
use Magento\Catalog\Model\Product\Option;

/**
 * Represent needed logic for checkbox and radio button option types
 */
class Checkable extends \Magento\Catalog\Block\Product\View\Options\Type\Select\Checkable
{
    /**
     * @var string
     */
    protected $_template = 'Smart_CustomOption::custom_template.phtml';

    public function getImage($optionTypeId, $optionId)
    {

    }
}
