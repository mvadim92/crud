<?php
declare(strict_types=1);

namespace Malesh\Partner\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

/**
 * Columns action on grid
 */
class PartnerActions extends Column
{
    /**
     * Path to edit action
     */
    private const PARTNER_URL_PATH_EDIT = 'malesh/partner/edit';

    /**
     * Path to delete action
     */
    private const PARTNER_URL_PATH_DELETE = 'malesh/partner/delete';

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        $confirmDeleteMessage = __('Are you sure you wan\'t to delete a partner "${ $.$data.name }" ?');

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['id'])) {
                    $name = $this->getData('name');
                    $itemId = $item['id'];

                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::PARTNER_URL_PATH_EDIT,
                            ['id' => $itemId]
                        ),
                        'label' => __('Edit'),
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::PARTNER_URL_PATH_DELETE,
                            ['id' => $itemId]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete partner'),
                            'message' => $confirmDeleteMessage,
                        ],
                    ];
                }
            }
        }

        return $dataSource;
    }
}
