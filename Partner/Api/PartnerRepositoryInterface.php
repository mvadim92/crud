<?php
declare(strict_types=1);

namespace Malesh\Partner\Api;

use Malesh\Partner\Api\Data\PartnerInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Malesh\Partner\Api\Data\PartnerSearchResultInterface;

/**
 * Repository interface for partner entity
 */
interface PartnerRepositoryInterface
{
    /**
     * Create or update partner
     *
     * @param PartnerInterface $partner
     * @return PartnerInterface $partner
     * @throws \Exception
     */
    public function save(PartnerInterface $partner): PartnerInterface;

    /**
     * Get partner by partner id
     *
     * @param int $partnerId
     * @return PartnerInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $partnerId): PartnerInterface;

    /**
     * Get partner list by criteria
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return PartnerSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): PartnerSearchResultInterface;

    /**
     * Delete partner
     *
     * @param PartnerInterface $partner
     * @return void
     * @throws \Exception
     */
    public function delete(PartnerInterface $partner): void;

    /**
     * Delete partner by id
     *
     * @param int $partnerId
     * @return bool
     * @throws NoSuchEntityException
     * @throws \Exception
     */
    public function deleteById(int $partnerId): bool;
}
