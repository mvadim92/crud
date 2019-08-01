<?php
declare(strict_types=1);

namespace Malesh\Partner\Controller\Adminhtml\Partner;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use Malesh\Partner\Api\PartnerRepositoryInterface;
use Malesh\Partner\Model\PartnerFactory;

/**
 * Action for save partner
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * ACL resource name to partner save action
     */
    public const ADMIN_RESOURCE = 'Malesh_Partner::save';

    /**
     * @var PartnerRepositoryInterface
     */
    private $partnerRepository;

    /**
     * @var PartnerFactory
     */
    private $partnerFactory;

    /**
     * @param Context $context
     * @param PartnerFactory $partnerFactory
     * @param PartnerRepositoryInterface $partnerRepository
     */
    public function __construct(
        Context $context,
        PartnerFactory $partnerFactory,
        PartnerRepositoryInterface $partnerRepository
    ) {
        $this->partnerFactory = $partnerFactory;
        $this->partnerRepository = $partnerRepository;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return Redirect
     */
    public function execute(): Redirect
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue();
        $id = array_key_exists('id', $data) ? (int) $data['id'] : 0;

        try {
            if ($id > 0) {
                $partner = $this->partnerRepository->getById($id);
            } else {
                $partner = $this->partnerFactory->create();
                unset($data['id']);
            }

            $partner->setData($data);

            $this->partnerRepository->save($partner);

            $this->getMessageManager()->addSuccessMessage(__('Successfully saved the partner.'));
            $this->_getSession()->setFormData(false);
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage($e->getMessage());
            $this->_getSession()->setFormData($data);

            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
