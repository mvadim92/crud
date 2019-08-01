<?php
declare(strict_types=1);

namespace Malesh\Partner\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Malesh\Partner\Model\ResourceModel\Partner\CollectionFactory;

/**
 * Partner attribute source
 */
class Partner extends AbstractSource
{

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions(): array
    {
        $options = [];
        $collection = $this->collectionFactory->create();

        foreach ($collection as $item) {
            $options[] = [
                'label' => __($item->getName()),
                'value' => $item->getId(),
            ];
        }

        return $options;
    }
}
