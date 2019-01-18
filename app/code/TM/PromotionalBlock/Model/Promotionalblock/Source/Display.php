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

class Display implements \Magento\Framework\Option\ArrayInterface
{
    const HOME_PAGE = 1;
    const CATEGORY_PAGE = 2;
    const CATALOG_PAGE = 3;
    const CART_PAGE = 4;
    const CHECKOUT = 5;

    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::HOME_PAGE,
                'label' => __('Home Page')
            ],
            [
                'value' => self::CATEGORY_PAGE,
                'label' => __('Category Page')
            ],
            [
                'value' => self::CATALOG_PAGE,
                'label' => __('Catalog Page')
            ],
            [
                'value' => self::CART_PAGE,
                'label' => __('Cart Page')
            ],
            [
                'value' => self::CHECKOUT,
                'label' => __('Checkout')
            ],
        ];
        return $options;

    }
}
