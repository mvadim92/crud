<?php
declare(strict_types=1);

namespace Malesh\Partner\Controller\Adminhtml\Partner;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultInterface;

/**
 * Action for edit and create partner
 */
class Edit extends Action implements HttpGetActionInterface
{
    /**
     * Resource name from sidebar menu
     */
    private const PARTNER_MENU = 'Malesh_Partner::partner_parent';

    /**
     * Edit action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE)
            ->setActiveMenu(self::PARTNER_MENU);
    }
}
