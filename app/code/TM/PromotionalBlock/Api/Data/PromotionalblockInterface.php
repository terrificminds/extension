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
interface PromotionalblockInterface
{
    /**
     * ID
     * 
     * @var string
     */
    const PROMOTIONALBLOCK_ID = 'promotionalblock_id';

    /**
     * Name attribute constant
     * 
     * @var string
     */
    const NAME = 'name';

    /**
     * Status attribute constant
     * 
     * @var string
     */
    const STATUS = 'status';

    /**
     * Customer Group attribute constant
     * 
     * @var string
     */
    const CUSTOMERGROUPS = 'customergroups';

    /**
     * Where To Display? attribute constant
     * 
     * @var string
     */
    const DISPLAY = 'display';

    /**
     * Position attribute constant
     * 
     * @var string
     */
    const POSITION = 'position';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getPromotionalblockId();

    /**
     * Set ID
     *
     * @param int $promotionalblockId
     * @return PromotionalblockInterface
     */
    public function setPromotionalblockId($promotionalblockId);

    /**
     * Get Name
     *
     * @return mixed
     */
    public function getName();

    /**
     * Set Name
     *
     * @param mixed $name
     * @return PromotionalblockInterface
     */
    public function setName($name);

    /**
     * Get Status
     *
     * @return mixed
     */
    public function getStatus();

    /**
     * Set Status
     *
     * @param mixed $status
     * @return PromotionalblockInterface
     */
    public function setStatus($status);

    /**
     * Get Customer Group
     *
     * @return mixed
     */
    public function getCustomergroups();

    /**
     * Set Customer Group
     *
     * @param mixed $customergroups
     * @return PromotionalblockInterface
     */
    public function setCustomergroups($customergroups);

    /**
     * Get Where To Display?
     *
     * @return mixed
     */
    public function getDisplay();

    /**
     * Set Where To Display?
     *
     * @param mixed $display
     * @return PromotionalblockInterface
     */
    public function setDisplay($display);

    /**
     * Get Position
     *
     * @return mixed
     */
    public function getPosition();

    /**
     * Set Position
     *
     * @param mixed $position
     * @return PromotionalblockInterface
     */
    public function setPosition($position);
}
