<?php
/**
 * TM_PromotionalBlock extension
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category  TM
 * @package   TM_PromotionalBlock
 * @author    kavitha@terrificminds.com
 * @copyright Copyright (c) 2019
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */
namespace TM\PromotionalBlock\Model\Promotionalblock\Source;

class Customergroups implements \Magento\Framework\Option\ArrayInterface
{
    const GENERAL = 1;
    const RETAILER = 2;

    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::GENERAL,
                'label' => __('General')
            ],
            [
                'value' => self::RETAILER,
                'label' => __('Retailer')
            ],
        ];
        return $options;

    }
}
