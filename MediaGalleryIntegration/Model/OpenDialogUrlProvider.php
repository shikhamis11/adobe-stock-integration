<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\MediaGalleryIntegration\Model;

use Magento\MediaGalleryUiApi\Api\ConfigInterface;
use Magento\Framework\DataObject;

/**
 * Provider to get open media gallery dialog URL for WYSIWYG and widgets
 */
class OpenDialogUrlProvider extends DataObject
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * Get Url based on media gallery configuration
     *
     * @return DataObject
     */
    public function getUrl(): string
    {
        if ($this->config->isEnabled()) {
            return 'media_gallery/index/index';
        }

        return 'cms/wysiwyg_images/index';
    }
}
