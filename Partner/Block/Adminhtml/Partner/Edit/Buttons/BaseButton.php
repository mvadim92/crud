<?php
declare(strict_types=1);

namespace Malesh\Partner\Block\Adminhtml\Partner\Edit\Buttons;

use Magento\Framework\UrlInterface;
use Magento\Framework\App\Request\Http;

/**
 * Parent class for buttons
 */
class BaseButton
{
    /**
     * @var UrlInterface $urlBuilder
     */
    private $urlBuilder;

    /**
     * @var Http $request
     */
    private $request;

    /**
     * @param UrlInterface $urlBuilder
     * @param Http $request
     */
    public function __construct(
        UrlInterface $urlBuilder,
        Http $request
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->request = $request;
    }

    /**
     * Return the Id
     *
     * @return int
     */
    public function getId(): int
    {
        return (int) $this->request->getParam('id');
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
