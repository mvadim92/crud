<?php
declare(strict_types=1);

namespace Malesh\Partner\Controller\Adminhtml\Partner;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use Psr\Log\LoggerInterface;
use Malesh\Partner\Api\PartnerRepositoryInterface;

/**
 * Action for delete partner
 */
class Delete extends Action implements HttpGetActionInterface
{
    /**
     * ACL resource name to partner delete action
     */
    public const ADMIN_RESOURCE = 'Malesh_Partner::delete';

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var PartnerRepositoryInterface
     */
    private $partnerRepository;

    /**
     * @param Context $context
     * @param LoggerInterface $logger
     * @param PartnerRepositoryInterface $partnerRepository
     */
    public function __construct(
        Context $context,
        LoggerInterface $logger,
        PartnerRepositoryInterface $partnerRepository
    ) {
        $this->logger = $logger;
        $this->partnerRepository = $partnerRepository;

        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $success = false;
        $id = (int) $this->getRequest()->getParam('id');

        try {
            $partner = $this->partnerRepository->getById($id);
            $this->partnerRepository->delete($partner);
            $success = true;
        } catch (\Exception $e) {
            $this->logger->info($e->getMessage());
        }

        $this->setResultMessage($success);

        return $this->getRedirect();
    }

    /**
     * Set result message for delete action
     *
     * @param bool $success
     * @return void
     */
    private function setResultMessage(bool $success): void
    {
        $messageManager = $this->getMessageManager();

        if ($success) {
            $messageManager->addSuccessMessage(__('Partner has been deleted!'));
        } else {
            $messageManager->addErrorMessage(__('Error while trying to delete partner'));
        }
    }

    /**
     * Get Redirect to Index page
     *
     * @return Redirect
     */
    private function getRedirect(): Redirect
    {
        return $this->resultRedirectFactory->create()
            ->setPath('*/*/index', ['_current' => true]);
    }
}
