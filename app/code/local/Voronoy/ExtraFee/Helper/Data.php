<?php
/**
 * Magento Extra Fee Extension
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright Copyright (c) 2015 by Yaroslav Voronoy (y.voronoy@gmail.com)
 * @license   http://www.gnu.org/licenses/
 */

class Voronoy_ExtraFee_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_EXTRA_FEE_RULE_ACTIVE              = 'extra_fee_settings/extra_fee_rule/active';
    const XML_PATH_EXTRA_FEE_RULE_LABEL               = 'extra_fee_settings/extra_fee_rule/label';

    /**
     * Check If Rule Extra Fee Enabled
     *
     * @return bool
     */
    public function isRuleExtraFeeEnabled()
    {
        $result = (bool) Mage::getStoreConfig(self::XML_PATH_EXTRA_FEE_RULE_ACTIVE);
        return $result;
    }

    /**
     * Get Extra Fee for Shopping Cart Rule
     *
     * @return string
     */
    public function getExtraFeeRuleLabel()
    {
        return (string) Mage::getStoreConfig(self::XML_PATH_EXTRA_FEE_RULE_LABEL);
    }
}