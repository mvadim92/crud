<?php
declare(strict_types=1);

namespace Malesh\Partner\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Partner Resource Model
 */
class Partner extends AbstractDb
{
    /**
     * Partner table name
     */
    public const PARTNER_TABLE_NAME = 'malesh_partner';

    /**
     * Id field name of partner table
     */
    public const ID_FIELD = 'id';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(self::PARTNER_TABLE_NAME, self::ID_FIELD);
    }
}
