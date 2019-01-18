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

class Delete extends \TM\PromotionalBlock\Controller\Adminhtml\Promotionalblock
{
    /**
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('promotionalblock_id');
        if ($id) {
            try {
                $this->promotionalblockRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('The Promotional&#x20;Block has been deleted.'));
                $resultRedirect->setPath('tm_promotionalblock/*/');
                return $resultRedirect;
            } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('The Promotional&#x20;Block no longer exists.'));
                return $resultRedirect->setPath('tm_promotionalblock/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('tm_promotionalblock/promotionalblock/edit', ['promotionalblock_id' => $id]);
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('There was a problem deleting the Promotional&#x20;Block'));
                return $resultRedirect->setPath('tm_promotionalblock/promotionalblock/edit', ['promotionalblock_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a Promotional&#x20;Block to delete.'));
        $resultRedirect->setPath('tm_promotionalblock/*/');
        return $resultRedirect;
    }
}
