<?php
declare(strict_types=1);

namespace Malesh\Partner\Model;

use Magento\Framework\Model\AbstractModel;
use Malesh\Partner\Model\ResourceModel\Partner as PartnerResourceModel;
use Malesh\Partner\Api\Data\PartnerInterface;

/**
 * Partner model
 */
class Partner extends AbstractModel implements PartnerInterface
{
    /**
     * @inheritdoc
     */
    protected $_eventObject = 'partner';

    /**
     * @inheritdoc
     */
    protected $_cacheTag = 'malesh_partner';

    /**
     * @inheritdoc
     */
    protected $_eventPrefix = 'malesh_partner';

    /**
     * @inheritdoc
     */
    protected function _construct(): void
    {
        $this->_init(PartnerResourceModel::class);
    }

    /**
     * @inheritdoc
     */
    public function getPartnerId(): int
    {
        return (int) $this->_getData(self::ID);
    }

    /**
     * @inheritdoc
     */
    public function setPartnerId(int $id): void
    {
        $this->setData(self::ID, $id);
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return $this->_getData(self::NAME);
    }

    /**
     * @inheritdoc
     */
    public function setName(string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @inheritdoc
     */
    public function getEmail(): string
    {
        return $this->_getData(self::EMAIL);
    }

    /**
     * @inheritdoc
     */
    public function setEmail(string $email): void
    {
        $this->setData(self::EMAIL, $email);
    }

    /**
     * @inheritdoc
     */
    public function getPhone(): string
    {
        return $this->_getData(self::PHONE);
    }

    /**
     * @inheritdoc
     */
    public function setPhone(string $phone): void
    {
        $this->setData(self::PHONE, $phone);
    }
}
