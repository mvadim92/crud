<?php
declare(strict_types=1);

namespace Malesh\Partner\Model\ResourceModel\Partner;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Malesh\Partner\Model\Partner as PartnerModel;
use Malesh\Partner\Model\ResourceModel\Partner as PartnerResourceModel;

/**
 * Partners collection for malesh_partner
 */
class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected $_idFieldName = PartnerResourceModel::ID_FIELD;

    /**
     * @inheritdoc
     */
    protected $_eventPrefix = 'malesh_partner_collection';

    /**
     * @inheritdoc
     */
    protected $_eventObject = 'partner_collection';

    /**
     * @inheritdoc
     */
    protected function _construct(): void
    {
        $this->_init(PartnerModel::class, PartnerResourceModel::class);
    }
}
