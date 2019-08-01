<?php
declare(strict_types=1);

namespace Malesh\Partner\Model;

use Malesh\Partner\Api\PartnerRepositoryInterface;
use Malesh\Partner\Model\ResourceModel\Partner as PartnerResourceModel;
use Malesh\Partner\Model\ResourceModel\Partner\CollectionFactory;
use Malesh\Partner\Api\Data\PartnerInterface;
use Malesh\Partner\Api\Data\PartnerSearchResultInterface;
use Malesh\Partner\Model\ResourceModel\Partner\Collection;
use Malesh\Partner\Api\Data\PartnerSearchResultInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;

/**
 * Partner Repository.
 */
class PartnerRepository implements PartnerRepositoryInterface
{
    /**
     * @var PartnerFactory
     */
    private $partnerFactory;

    /**
     * @var PartnerResourceModel
     */
    private $partnerResourceModel;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var PartnerSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @param PartnerFactory $partnerFactory
     * @param PartnerResourceModel $partnerResourceModel
     * @param CollectionFactory $collectionFactory
     * @param PartnerSearchResultInterfaceFactory $partnerSearchResultInterfaceFactory
     */
    public function __construct(
        PartnerFactory $partnerFactory,
        PartnerResourceModel $partnerResourceModel,
        CollectionFactory $collectionFactory,
        PartnerSearchResultInterfaceFactory $partnerSearchResultInterfaceFactory
    ) {
        $this->partnerFactory = $partnerFactory;
        $this->partnerResourceModel = $partnerResourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultFactory = $partnerSearchResultInterfaceFactory;
    }

    /**
     * @inheritdoc
     */
    public function save(PartnerInterface $partner): PartnerInterface
    {
        $this->partnerResourceModel->save($partner);

        return $partner;
    }

    /**
     * @inheritdoc
     */
    public function getById(int $partnerId): PartnerInterface
    {
        $partner = $this->partnerFactory->create();
        $this->partnerResourceModel->load($partner, $partnerId);
        if (!$partner->getId()) {
            throw new NoSuchEntityException(__('Unable to find partner with ID "%1"', $partnerId));
        }

        return $partner;
    }

    /**
     * @inheritdoc
     */
    public function delete(PartnerInterface $partner): void
    {
        $this->partnerResourceModel->delete($partner);
    }

    /**
     * @inheritdoc
     */
    public function deleteById(int $partnerId): bool
    {
        $partner = $this->getById($partnerId);
        $this->delete($partner);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria): PartnerSearchResultInterface
    {
        $collection = $this->collectionFactory->create();
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    /**
     * Add filters to collection
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     * @return void
     */
    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection): void
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    /**
     * Add sort orders to collection
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     * @return void
     */
    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection): void
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() === SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    /**
     * Build search results
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     * @return PartnerSearchResultInterface
     */
    private function buildSearchResult(
        SearchCriteriaInterface $searchCriteria,
        Collection $collection
    ): PartnerSearchResultInterface {
        /** @var PartnerSearchResult $searchResults */
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
