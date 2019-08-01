<?php
declare(strict_types=1);

namespace Malesh\Partner\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Search result interface for partner
 */
interface PartnerSearchResultInterface extends SearchResultsInterface
{
    /**
     * Get partner items
     *
     * @return \Malesh\Partner\Api\Data\PartnerInterface[]
     */
    public function getItems();

    /**
     * Set partner items
     *
     * @param \Malesh\Partner\Api\Data\PartnerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
