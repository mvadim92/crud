<?php
declare(strict_types=1);

namespace Malesh\Partner\Model\Partner;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Malesh\Partner\Model\ResourceModel\Partner\CollectionFactory;

/**
 * Provides information to partner form
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $partnerCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $partnerCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $partnerCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get partner data for form
     *
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        foreach ($this->getCollection() as $partner) {
            $data[$partner->getId()] = $partner->getData();
        }

        return $data;
    }
}
