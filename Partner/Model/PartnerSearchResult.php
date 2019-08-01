<?php
declare(strict_types=1);

namespace Malesh\Partner\Model;

use Magento\Framework\Api\SearchResults;
use Malesh\Partner\Api\Data\PartnerSearchResultInterface;

/**
 * Result partner search
 */
class PartnerSearchResult extends SearchResults implements PartnerSearchResultInterface
{
}
