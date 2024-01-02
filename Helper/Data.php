<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\FieldLengthValidation\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    const CONFIG_PATH_ENABLED             = 'fieldlengthvalidation/general/enable';

    const CONFIG_PATH_FIELD_LENGTH_STREET = 'fieldlengthvalidation/fieldlengths/street';

    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Is module enabled?
     *
     * @return bool
     */
    public function isModuleEnabled()
    {
        return $this->scopeConfig->isSetFlag(self::CONFIG_PATH_ENABLED);
    }

    public function getFieldLengthStreet()
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_FIELD_LENGTH_STREET);
    }
}
