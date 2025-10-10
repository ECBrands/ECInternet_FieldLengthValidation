define([
    'jquery',
    'mage/translate',
    'Magento_Ui/js/model/messageList',
    'uiRegistry',
    'Magento_Checkout/js/model/quote'
], function (
    $,
    $t,
    globalMessageList,
    registry,
    quote
) {
    'use strict';

    return function (Component) {
        return Component.extend({
            getStreetMaxLength: function () {
                return window.checkoutConfig && window.checkoutConfig.fieldLengthValidation && window.checkoutConfig.fieldLengthValidation.street;
            },

            getLines: function (vm) {
                // blank lines
                var lines = vm.source && vm.source.get && vm.source.get('shippingAddress.street');
                if (Array.isArray(lines) && lines.length) { return lines; }

                // Try checkout provider
                var provider = registry.get('checkoutProvider');
                var sa = provider && provider.get && provider.get('shippingAddress');
                if (sa && sa.street) { if (Array.isArray(sa.street)) { return sa.street; } }

                // Try quote
                var addr = quote && quote.shippingAddress && quote.shippingAddress();
                if (addr && addr.street) { if (Array.isArray(addr.street)) { return addr.street; } }

                return [];
            },

            /**
             * Runs after core validation but before proceeding to billing/payment.
             * Returning false stops the flow on the shipping step.
             */
            validateShippingInformation: function () {
                // Run Magento's default validation first
                var isValid = this._super();
                if (!isValid) {
                    return false;
                }

                // Read address from the source (the UI registry data provider)
                //var address = this.source.get('shippingAddress') || {};
                //var lines = address.street || [];
                var lines = this.getLines(this);

                // Exposed via checkoutConfig
                var maxLen = this.getStreetMaxLength();
                if (!maxLen) {
                    return true;
                }

                var violations = [];

                for (var i = 0; i < lines.length; i++) {
                    var line = (lines[i] || '').trim();
                    if (line.length > maxLen) {
                        violations.push(
                            $t('Street address line %1 exceeds the maximum length of %2 characters ("%3").')
                                .replace('%1', String(i + 1))
                                .replace('%2', String(maxLen))
                                .replace('%3', line)
                        );
                    }
                }

                if (violations.length) {
                    // Put a clear summary at top and detailed reasons below
                    globalMessageList.addErrorMessage({
                        message: $t('Please shorten your street address before continuing.')
                    });

                    globalMessageList.addErrorMessage({
                        message: violations.join(' ')
                    });

                    // Keep user on Shipping step
                    return false;
                }

                // No issues; proceed as normal
                return true;
            }
        });
    };
});
