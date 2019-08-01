<?php
declare(strict_types=1);

namespace Malesh\Partner\Controller\Adminhtml\Partner;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * New action will redirect to edit partner action
 */
class NewAction extends Action implements HttpGetActionInterface
{
    /**
     * Redirect to Edit Action
     *
     * @return void
     */
    public function execute(): void
    {
        $this->_forward('edit');
    }
}
