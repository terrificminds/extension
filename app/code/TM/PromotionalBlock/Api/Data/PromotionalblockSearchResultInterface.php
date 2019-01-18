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
namespace TM\PromotionalBlock\Api\Data;

/**
 * @api
 */
interface PromotionalblockSearchResultInterface
{
    /**
     * Get Promotional Blocks list.
     *
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface[]
     */
    public function getItems();

    /**
     * Set Promotional Blocks list.
     *
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
