<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\FieldLengthValidation\Model\Checkout;

use ECInternet\FieldLengthValidation\Model\Config;
use Magento\Checkout\Model\ConfigProviderInterface;

class ConfigProvider implements ConfigProviderInterface
{
    /**
     * @var \ECInternet\FieldLengthValidation\Model\Config
     */
    private $config;

    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    public function getConfig()
    {
        return [
            'fieldLengthValidation' => [
                'street' => $this->config->getFieldLengthStreet()
            ]
        ];
    }
}