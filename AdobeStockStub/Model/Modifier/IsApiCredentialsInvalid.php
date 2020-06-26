<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\AdobeStockStub\Model\Modifier;

/**
 * Validate is Adobe Stock API credentials invalid and modify is yes.
 */
class IsApiCredentialsInvalid implements ModifierInterface
{
    private const INCORRECT_API_KEY_USED_FOR_TESTS = [
        'blahblahblah',
        'wrong-api-key',
    ];


    /**
     * Validate is invalid API credentials condition in the request URL.
     *
     * @see [Story #6] User configures Adobe Stock integration
     * @param array $files
     * @param string $url
     * @param array $headers
     *
     * @return array
     */
    public function modify(array $files, string $url, array $headers): array
    {
        return (in_array($headers['headers']['x-api-key'], self::INCORRECT_API_KEY_USED_FOR_TESTS)) ?
            [
                'nb_results' => 0,
                'files' => []
            ]
            : $files;
    }
}
