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
namespace TM\PromotionalBlock\Api;

/**
 * @api
 */
interface PromotionalblockRepositoryInterface
{
    /**
     * Save Promotional Block.
     *
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock);

    /**
     * Retrieve Promotional Block
     *
     * @param int $promotionalblockId
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($promotionalblockId);

    /**
     * Retrieve Promotional Blocks matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Promotional Block.
     *
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock);

    /**
     * Delete Promotional Block by ID.
     *
     * @param int $promotionalblockId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($promotionalblockId);
}
