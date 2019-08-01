<?php
declare(strict_types=1);

namespace Malesh\Partner\Block\Adminhtml\Partner\Edit\Buttons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Button for save partner
 */
class SaveButton extends BaseButton implements ButtonProviderInterface
{
    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Save Partner'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'button' => [
                        'event' => 'save',
                    ],
                ],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
