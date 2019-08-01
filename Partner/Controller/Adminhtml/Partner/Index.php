<?php
declare(strict_types=1);

namespace Malesh\Partner\Controller\Adminhtml\Partner;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;

/**
 * Action for show partners
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Resource name from sidebar menu
     */
    private const PARTNER_MENU = 'Malesh_Partner::partner_parent';

    /**
     * ACL resource name to partners grid
     */
    public const ADMIN_RESOURCE = 'Malesh_Partner::index';

    /**
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return Page
     */
    public function execute(): Page
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(self::PARTNER_MENU);
        $resultPage->getConfig()->getTitle()->prepend(__('Partner List'));

        return $resultPage;
    }
}
