<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\FieldLengthValidation\Plugin\Checkout\Model;

use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Checkout\Model\ShippingInformationManagement;
use Magento\Framework\Exception\LocalizedException;

class ShippingInformationManagementPlugin
{
    /**
     * @var \ECInternet\FieldLengthValidation\Model\Config
     */
    private $config;

    /**
     * ShippingInformationManagementPlugin constructor.
     *
     * @param \ECInternet\FieldLengthValidation\Model\Config $config
     */
    public function __construct(
        \ECInternet\FieldLengthValidation\Model\Config $config
    ) {
        $this->config = $config;
    }

    /**
     * @param ShippingInformationManagement $subject
     * @param int                           $cartId
     * @param ShippingInformationInterface  $addressInformation
     *
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function beforeSaveAddressInformation(
        ShippingInformationManagement $subject,
        $cartId,
        ShippingInformationInterface $addressInformation
    ): array {
        if (!$this->config->isModuleEnabled()) {
            return [$cartId, $addressInformation];
        }

        if ($streetLength = $this->config->getFieldLengthStreet()) {
            /** @var string[] $street */
            $street = $addressInformation->getShippingAddress()->getStreet();
            for ($i = 0; $i < 4; $i++) {
                if (isset($street[$i]) && strlen($street[$i]) > $streetLength) {
                    throw new LocalizedException(
                        __('Street address line %1 exceeds the maximum length of %2 characters ("%3").', $i+1, $streetLength, $street[$i])
                    );
                }
            }
        }

        return [$cartId, $addressInformation];
    }
}
