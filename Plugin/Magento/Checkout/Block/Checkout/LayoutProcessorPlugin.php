<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\FieldLengthValidation\Plugin\Magento\Checkout\Block\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessor;
use ECInternet\FieldLengthValidation\Helper\Data;

/**
 * Plugin for Magento\Checkout\Block\Checkout\LayoutProcessor
 */
class LayoutProcessorPlugin
{
    /**
     * @var \ECInternet\FieldLengthValidation\Helper\Data
     */
    private $helper;

    /**
     * @param \ECInternet\FieldLengthValidation\Helper\Data $helper
     */
    public function __construct(
        Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     *
     * @return array
     */
    public function afterProcess(
        LayoutProcessor $subject,
        array $jsLayout
    ) {
        if ($this->helper->isModuleEnabled()) {
            if ($streetLength = $this->helper->getFieldLengthStreet()) {
                if (isset($jsLayout['components']['checkout']['children']
                                   ['steps']['children']
                                   ['shipping-step']['children']
                                   ['shippingAddress']['children']
                                   ['shipping-address-fieldset']['children']
                                   ['street']['children'][0]['validation'])) {
                    $jsLayout['components']['checkout']['children']
                             ['steps']['children']
                             ['shipping-step']['children']
                             ['shippingAddress']['children']
                             ['shipping-address-fieldset']['children']
                             ['street']['children'][0]['validation']['max_text_length'] = $streetLength;
                }

                if (isset($jsLayout['components']['checkout']['children']
                                   ['steps']['children']
                                   ['shipping-step']['children']
                                   ['shippingAddress']['children']
                                   ['shipping-address-fieldset']['children']
                                   ['street']['children'][1]['validation'])) {
                    $jsLayout['components']['checkout']['children']
                             ['steps']['children']
                             ['shipping-step']['children']
                             ['shippingAddress']['children']
                             ['shipping-address-fieldset']['children']
                             ['street']['children'][1]['validation']['max_text_length'] = $streetLength;
                }

                if (isset($jsLayout['components']['checkout']['children']
                                   ['steps']['children']
                                   ['shipping-step']['children']
                                   ['shippingAddress']['children']
                                   ['shipping-address-fieldset']['children']
                                   ['street']['children'][2]['validation'])) {
                    $jsLayout['components']['checkout']['children']
                             ['steps']['children']
                             ['shipping-step']['children']
                             ['shippingAddress']['children']
                             ['shipping-address-fieldset']['children']
                             ['street']['children'][2]['validation']['max_text_length'] = $streetLength;
                }

                if (isset($jsLayout['components']['checkout']['children']
                                   ['steps']['children']
                                   ['shipping-step']['children']
                                   ['shippingAddress']['children']
                                   ['shipping-address-fieldset']['children']
                                   ['street']['children'][3]['validation'])) {
                    $jsLayout['components']['checkout']['children']
                             ['steps']['children']
                             ['shipping-step']['children']
                             ['shippingAddress']['children']
                             ['shipping-address-fieldset']['children']
                             ['street']['children'][3]['validation']['max_text_length'] = $streetLength;
                }
            }
        }

        return $jsLayout;
    }
}
