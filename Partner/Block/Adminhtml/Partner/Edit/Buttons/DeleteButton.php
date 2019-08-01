<?php
declare(strict_types=1);

namespace Malesh\Partner\Block\Adminhtml\Partner\Edit\Buttons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Button for delete partner
 */
class DeleteButton extends BaseButton implements ButtonProviderInterface
{
    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData(): array
    {
        $data = [];

        if ($this->getId()) {
            $data = [
                'label' => __('Delete partner'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure to delete this partner ?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }

        return $data;
    }

    /**
     * Get delete URL for button
     *
     * @return string
     */
    private function getDeleteUrl(): string
    {
        return $this->getUrl(
            '*/*/delete',
            ['id' => $this->getId()]
        );
    }
}
