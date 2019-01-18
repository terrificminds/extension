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
namespace TM\PromotionalBlock\Model;

/**
 * @method \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock _getResource()
 * @method \TM\PromotionalBlock\Model\ResourceModel\Promotionalblock getResource()
 */
class Promotionalblock extends \Magento\Framework\Model\AbstractModel implements \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
{
    /**
     * Cache tag
     * 
     * @var string
     */
    const CACHE_TAG = 'tm_promotionalblock_promotionalblock';

    /**
     * Cache tag
     * 
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Event prefix
     * 
     * @var string
     */
    protected $_eventPrefix = 'tm_promotionalblock_promotionalblock';

    /**
     * Event object
     * 
     * @var string
     */
    protected $_eventObject = 'promotionalblock';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\TM\PromotionalBlock\Model\ResourceModel\Promotionalblock::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Promotional Block id
     *
     * @return array
     */
    public function getPromotionalblockId()
    {
        return $this->getData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::PROMOTIONALBLOCK_ID);
    }

    /**
     * set Promotional Block id
     *
     * @param int $promotionalblockId
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     */
    public function setPromotionalblockId($promotionalblockId)
    {
        return $this->setData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::PROMOTIONALBLOCK_ID, $promotionalblockId);
    }

    /**
     * set Name
     *
     * @param mixed $name
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     */
    public function setName($name)
    {
        return $this->setData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::NAME, $name);
    }

    /**
     * get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::NAME);
    }

    /**
     * set Status
     *
     * @param mixed $status
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     */
    public function setStatus($status)
    {
        return $this->setData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::STATUS, $status);
    }

    /**
     * get Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::STATUS);
    }

    /**
     * set Customer Group
     *
     * @param mixed $customergroups
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     */
    public function setCustomergroups($customergroups)
    {
        return $this->setData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::CUSTOMERGROUPS, $customergroups);
    }

    /**
     * get Customer Group
     *
     * @return string
     */
    public function getCustomergroups()
    {
        return $this->getData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::CUSTOMERGROUPS);
    }

    /**
     * set Where To Display?
     *
     * @param mixed $display
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     */
    public function setDisplay($display)
    {
        return $this->setData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::DISPLAY, $display);
    }

    /**
     * get Where To Display?
     *
     * @return string
     */
    public function getDisplay()
    {
        return $this->getData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::DISPLAY);
    }

    /**
     * set Position
     *
     * @param mixed $position
     * @return \TM\PromotionalBlock\Api\Data\PromotionalblockInterface
     */
    public function setPosition($position)
    {
        return $this->setData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::POSITION, $position);
    }

    /**
     * get Position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->getData(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface::POSITION);
    }
}
