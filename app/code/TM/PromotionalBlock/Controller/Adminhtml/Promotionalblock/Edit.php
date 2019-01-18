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
namespace TM\PromotionalBlock\Controller\Adminhtml\Promotionalblock;

class Edit extends \TM\PromotionalBlock\Controller\Adminhtml\Promotionalblock
{
    /**
     * Initialize current Promotional Block and set it in the registry.
     *
     * @return int
     */
    protected function initPromotionalblock()
    {
        $promotionalblockId = $this->getRequest()->getParam('promotionalblock_id');
        $this->coreRegistry->register(\TM\PromotionalBlock\Controller\RegistryConstants::CURRENT_PROMOTIONALBLOCK_ID, $promotionalblockId);

        return $promotionalblockId;
    }

    /**
     * Edit or create Promotional Block
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $promotionalblockId = $this->initPromotionalblock();

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('TM_PromotionalBlock::promotionalblock_promotionalblock');
        $resultPage->getConfig()->getTitle()->prepend(__('Promotional&#x20;Blocks'));
        $resultPage->addBreadcrumb(__('Custom'), __('Custom'));
        $resultPage->addBreadcrumb(__('Promotional&#x20;Blocks'), __('Promotional&#x20;Blocks'), $this->getUrl('tm_promotionalblock/promotionalblock'));

        if ($promotionalblockId === null) {
            $resultPage->addBreadcrumb(__('New Promotional&#x20;Block'), __('New Promotional&#x20;Block'));
            $resultPage->getConfig()->getTitle()->prepend(__('New Promotional&#x20;Block'));
        } else {
            $resultPage->addBreadcrumb(__('Edit Promotional&#x20;Block'), __('Edit Promotional&#x20;Block'));
            $resultPage->getConfig()->getTitle()->prepend(
                $this->promotionalblockRepository->getById($promotionalblockId)->getName()
            );
        }
        return $resultPage;
    }
}
