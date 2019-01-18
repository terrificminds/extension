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

class Index extends \TM\PromotionalBlock\Controller\Adminhtml\Promotionalblock
{
    /**
     * Promotional Blocks list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('TM_PromotionalBlock::promotionalblock');
        $resultPage->getConfig()->getTitle()->prepend(__('Promotional&#x20;Blocks'));
        $resultPage->addBreadcrumb(__('Custom'), __('Custom'));
        $resultPage->addBreadcrumb(__('Promotional&#x20;Blocks'), __('Promotional&#x20;Blocks'));
        return $resultPage;
    }
}
