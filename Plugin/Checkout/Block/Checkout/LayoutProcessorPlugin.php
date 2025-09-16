<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\FieldLengthValidation\Plugin\Checkout\Block\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessor;
use ECInternet\FieldLengthValidation\Model\Config;

/**
 * Plugin for Magento\Checkout\Block\Checkout\LayoutProcessor
 */
class LayoutProcessorPlugin
{
    /**
     * @var \ECInternet\FieldLengthValidation\Model\Config
     */
    private $config;

    /**
     * LayoutProcessorPlugin constructor.
     *
     * @param \ECInternet\FieldLengthValidation\Model\Config $config
     */
    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array                                            $result
     *
     * @return array
     */
    public function afterProcess(
        LayoutProcessor $subject,
        array $result
    ) {
        if (!$this->config->isModuleEnabled()) {
            return $result;
        }

        if ($streetLength = $this->config->getFieldLengthStreet()) {
            if (isset($result['components']['checkout']['children']
                               ['steps']['children']
                               ['shipping-step']['children']
                               ['shippingAddress']['children']
                               ['shipping-address-fieldset']['children']
                               ['street']['children'][0]['validation'])) {
                $result['components']['checkout']['children']
                         ['steps']['children']
                         ['shipping-step']['children']
                         ['shippingAddress']['children']
                         ['shipping-address-fieldset']['children']
                         ['street']['children'][0]['validation']['max_text_length'] = $streetLength;
            }

            if (isset($result['components']['checkout']['children']
                               ['steps']['children']
                               ['shipping-step']['children']
                               ['shippingAddress']['children']
                               ['shipping-address-fieldset']['children']
                               ['street']['children'][1]['validation'])) {
                $result['components']['checkout']['children']
                         ['steps']['children']
                         ['shipping-step']['children']
                         ['shippingAddress']['children']
                         ['shipping-address-fieldset']['children']
                         ['street']['children'][1]['validation']['max_text_length'] = $streetLength;
            }

            if (isset($result['components']['checkout']['children']
                               ['steps']['children']
                               ['shipping-step']['children']
                               ['shippingAddress']['children']
                               ['shipping-address-fieldset']['children']
                               ['street']['children'][2]['validation'])) {
                $result['components']['checkout']['children']
                         ['steps']['children']
                         ['shipping-step']['children']
                         ['shippingAddress']['children']
                         ['shipping-address-fieldset']['children']
                         ['street']['children'][2]['validation']['max_text_length'] = $streetLength;
            }

            if (isset($result['components']['checkout']['children']
                               ['steps']['children']
                               ['shipping-step']['children']
                               ['shippingAddress']['children']
                               ['shipping-address-fieldset']['children']
                               ['street']['children'][3]['validation'])) {
                $result['components']['checkout']['children']
                         ['steps']['children']
                         ['shipping-step']['children']
                         ['shippingAddress']['children']
                         ['shipping-address-fieldset']['children']
                         ['street']['children'][3]['validation']['max_text_length'] = $streetLength;
            }
        }

        return $result;
    }
}
