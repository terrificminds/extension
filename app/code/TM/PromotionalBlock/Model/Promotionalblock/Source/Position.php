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

class Position implements \Magento\Framework\Option\ArrayInterface
{
    const SIDEBAR_TOP = 1;
    const SIDEBAR_BOTTOM = 2;
    const MENU_TOP = 3;
    const MENU_BOTTOM = 4;
    const CONTENT_TOP = 5;
    const CONTENT_BOTTOM = 6;

    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::SIDEBAR_TOP,
                'label' => __('Sidebar Top')
            ],
            [
                'value' => self::SIDEBAR_BOTTOM,
                'label' => __('Sidebar Bottom')
            ],
            [
                'value' => self::MENU_TOP,
                'label' => __('Menu Top')
            ],
            [
                'value' => self::MENU_BOTTOM,
                'label' => __('Menu Bottom')
            ],
            [
                'value' => self::CONTENT_TOP,
                'label' => __('Content Top')
            ],
            [
                'value' => self::CONTENT_BOTTOM,
                'label' => __('Content Bottom')
            ],
        ];
        return $options;

    }
}
