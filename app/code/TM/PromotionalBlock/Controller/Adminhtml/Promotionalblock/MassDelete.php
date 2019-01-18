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

class MassDelete extends \TM\PromotionalBlock\Controller\Adminhtml\Promotionalblock\MassAction
{
    /**
     * @param \TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock
     * @return $this
     */
    protected function massAction(\TM\PromotionalBlock\Api\Data\PromotionalblockInterface $promotionalblock)
    {
        $this->promotionalblockRepository->delete($promotionalblock);
        return $this;
    }
}
