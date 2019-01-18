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
 * @copyright Copyright (c) 2019
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */
namespace TM\PromotionalBlock\Block\Adminhtml\Promotionalblock\Edit\Buttons;

class Generic
{
    /**
     * Widget Context
     * 
     * @var \Magento\Backend\Block\Widget\Context
     */
    protected $context;

    /**
     * Promotional Block Repository
     * 
     * @var \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface
     */
    protected $promotionalblockRepository;

    /**
     * constructor
     * 
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \TM\PromotionalBlock\Api\PromotionalblockRepositoryInterface $promotionalblockRepository
    ) {
        $this->context                    = $context;
        $this->promotionalblockRepository = $promotionalblockRepository;
    }

    /**
     * Return Promotional Block ID
     *
     * @return int|null
     */
    public function getPromotionalblockId()
    {
        try {
            return $this->promotionalblockRepository->getById(
                $this->context->getRequest()->getParam('promotionalblock_id')
            )->getId();
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
