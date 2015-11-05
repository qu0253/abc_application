<?php

class SupportHelper extends AppHelper {

    function isEditable($mem_status_id) {    
        return ($mem_status_id < 2) ? true : false;
    }
    function isNewspaper($publication_type_id) {
        return ($publication_type_id == 1) ? true : false;
    }
    function isMagazine($publication_type_id) {    
        return ($publication_type_id == 2) ? true : false;
    }
    function isAnnual($frequency_type_id) {    
        return ($frequency_type_id == 6) ? true : false;
    }
    function whiteFormSundayCalc($qualifyingCirculation) {
        $sundayCopies = Set::extract('/WhiteForm/sunday', $qualifyingCirculation);
        return array_sum($sundayCopies) ? array_sum($sundayCopies) : 0;
    }
    function weekdaySundayCalc($qualifyingCirculation) {
        $weekdaySunday = Set::extract('/WeekdaysSunday', $qualifyingCirculation);
        return $weekdaySunday[0]['WeekdaysSunday']['total_monthly_qualifying_circulation_sunday_month_1'] +
                $weekdaySunday[0]['WeekdaysSunday']['total_monthly_qualifying_circulation_sunday_month_2'] +
                $weekdaySunday[0]['WeekdaysSunday']['total_monthly_qualifying_circulation_sunday_month_3'] +
                $weekdaySunday[0]['WeekdaysSunday']['total_monthly_qualifying_circulation_sunday_month_4'] +
                $weekdaySunday[0]['WeekdaysSunday']['total_monthly_qualifying_circulation_sunday_month_5'] +
                $weekdaySunday[0]['WeekdaysSunday']['total_monthly_qualifying_circulation_sunday_month_6'];
    }
    function coverPriceLabel($qualifyingCirculation) {
        $coverPriceTotalCopies = Set::extract('/CoverPrice/total_copies', $qualifyingCirculation);
        
        if (array_sum($coverPriceTotalCopies) < $qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation']) {
            return '<li class="span_register">' . __('Total Cover Prices Copies Pending To Be Added: <b>', true) . ($qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation'] - array_sum($coverPriceTotalCopies)) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Total Cover Prices Copies Need To Be Removed: <b>', true) . ($qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation'] - array_sum($coverPriceTotalCopies)) . '</b></li>';
        }
    }
    function whiteFormLabel($qualifyingCirculation) {
        $arrTotalWeekdayCopies = Set::extract('/WhiteForm/circulation', $qualifyingCirculation);
        $arrTotalSundayCopies = Set::extract('/WhiteForm/sunday', $qualifyingCirculation);
        $whiteFormTotalCopies = array_sum($arrTotalWeekdayCopies) + array_sum($arrTotalSundayCopies);
        $copies = $qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation'] - $whiteFormTotalCopies;
        $weekdayExtra = $this->whiteFormSundayCalc($qualifyingCirculation) - $this->weekdaySundayCalc($qualifyingCirculation);
        $sundayExtra = $this->weekdaySundayCalc($qualifyingCirculation) - $this->whiteFormSundayCalc($qualifyingCirculation);
        if ($whiteFormTotalCopies < $qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation']) {
            return '<li class="span_register">' . __('Total Copies Pending To Be Added: <b class="white_form_cnt_limit">', true) . $copies . '</b></li>';
        } else if ($copies) {
            return '<li class="span_register">' . __('Total Copies Need To Be Removed: <b class="white_form_cnt_limit">', true) . $copies . '</b></li>';
        } else if ($weekdayExtra < 0) {
            return '<li class="span_register">' . __('Total Copies not matching with Weekday Sunday form. Weekday copies to removed: <b>', true) . $weekdayExtra . '</b></li>';
        } else if ($sundayExtra < 0) {
            return '<li class="span_register">' . __('Total Copies not matching with Weekday Sunday form. Sunday copies to removed: <b>', true) . $sundayExtra . '</b></li>';
        }
    }
    function nssTradeTermsforSingle($qualifyingCirculation) {
        $tradeTermsCopiesSold = array_sum(Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=1]/copies_sold', $qualifyingCirculation));
        if ($tradeTermsCopiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_sales']) {
            return '<li class="span_register">' . __('Total Trade Terms for Single Copies Pending To Be Added: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_sales'] - $tradeTermsCopiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Total Trade Terms for Single Copies Need To Be Removed: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_sales'] - $tradeTermsCopiesSold) . '</b></li>';
        }
    }
    function nssTradeTermsforCombo($qualifyingCirculation) {
        $tradeTermsCopiesSold = array_sum(Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=2]/copies_sold', $qualifyingCirculation));
        if ($tradeTermsCopiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies']) {
            return '<li class="span_register">' . __('Total Trade Terms for Combo Copies Pending To Be Added: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies'] - $tradeTermsCopiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Total Trade Terms for Combo Copies Need To Be Removed: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies'] - $tradeTermsCopiesSold) . '</b></li>';
        }
    }
    function nssTradeTermsforInstn($qualifyingCirculation) {
        $tradeTermsCopiesSold = array_sum(Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=3]/copies_sold', $qualifyingCirculation));
        if ($tradeTermsCopiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies']) {
            return '<li class="span_register">' . __('Total Trade Terms for Institutional Copies Pending To Be Added: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies'] - $tradeTermsCopiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Total Trade Terms for Institutional Copies Need To Be Removed: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies'] - $tradeTermsCopiesSold) . '</b></li>';
        }
    }
    function comboDetails($qualifyingCirculation) {
        $comboDetails12 = array_sum(Set::extract('/Combo/combo', $qualifyingCirculation));
        if ($comboDetails12 < $qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies']) {
            return '<li class="span_register">' . __('Copies Pending To Be Added: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies'] - $comboDetails12) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Combo Copies Need To Be Removed: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies'] - $comboDetails12) . '</b></li>';
        }
    }
    function ssTradeTermsforSingle($qualifyingCirculation) {
        $tradeTermsCopiesSold = array_sum(Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=1]/copies_sold', $qualifyingCirculation));
        if ($tradeTermsCopiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription']) {
            return '<li class="span_register">' . __('Total Trade Terms for Single Copies Pending To Be Added: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription'] - $tradeTermsCopiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Total Trade Terms for Single Copies Need To Be Removed: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription'] - $tradeTermsCopiesSold) . '</b></li>';
        }
    }
    function subscriptionSchemes1($qualifyingCirculation) {
        $copiesSold = array_sum(Set::extract('/SubscriptionScheme[sale_type_id=1]/no_of_copies', $qualifyingCirculation));
        if ($copiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription']) {
            return '<li class="span_register">' . __('Single Copies Pending To Be Added: <b>', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription'] - $copiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Single Copies Need To Be Removed: <b>', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription'] - $copiesSold) . '</b></li>';
        }
    }
    function subscriptionSchemes2($qualifyingCirculation) {
        $copiesSold = array_sum(Set::extract('/SubscriptionScheme[sale_type_id=2]/no_of_copies', $qualifyingCirculation));
        if ($copiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies']) {
            return '<li class="span_register">' . __('Joint Copies Pending To Be Added: <b>', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies'] - $copiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Joint Copies Need To Be Removed: <b>', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies'] - $copiesSold) . '</b></li>';
        }
    }
    function subscriptionSchemes3($qualifyingCirculation) {
        $copiesSold = array_sum(Set::extract('/SubscriptionScheme[sale_type_id=3]/no_of_copies', $qualifyingCirculation));
        if ($copiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies']) {
            return '<li class="span_register">' . __('Institutional Copies Pending To Be Added: <b>', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies'] - $copiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Institutional Copies Need To Be Removed: <b>', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies'] - $copiesSold) . '</b></li>';
        }
    }
    function ssTradeTermsforCombo($qualifyingCirculation) {
        $tradeTermsCopiesSold = array_sum(Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=2]/copies_sold', $qualifyingCirculation));
        if ($tradeTermsCopiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies']) {
            return '<li class="span_register">' . __('Total Trade Terms for Combo Copies Pending To Be Added: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies'] - $tradeTermsCopiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Total Trade Terms for Combo Copies Need To Be Removed: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies'] - $tradeTermsCopiesSold) . '</b></li>';
        }
    }
    function ssTradeTermsforInstn($qualifyingCirculation) {
        $tradeTermsCopiesSold = array_sum(Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=3]/copies_sold', $qualifyingCirculation));
        if ($tradeTermsCopiesSold < $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies']) {
            return '<li class="span_register">' . __('Total Trade Terms for Institutional Copies Pending To Be Added: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies'] - $tradeTermsCopiesSold) . '</b></li>';
        } else {
            return '<li class="span_register">' . __('Total Trade Terms for Institutional Copies Need To Be Removed: <b class="trade_term_cnt_limit">', true) . ($qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies'] - $tradeTermsCopiesSold) . '</b></li>';
        }
    }
    function displayTTMessage($qualifyingCirculation) {
        foreach($qualifyingCirculation['TradeTerm'] as $k => $v) {
            if (isset($this->data['TradeTerm']['id']) && $v['id'] == $this->data['TradeTerm']['id']) {
                unset($qualifyingCirculation['TradeTerm'][$k]);
            }
        }
        $functionName = ($this->data['TradeTerm']['subscription_type_id'] == 1) ? 'nssTradeTermsfor' : 'ssTradeTermsfor';
        if ($this->data['TradeTerm']['sale_type_id'] == 1) {
            $functionName .= 'Single';
        } elseif ($this->data['TradeTerm']['sale_type_id'] == 2) {
            $functionName .= 'Combo';
        } else {
            $functionName .= 'Instn';
        }
        echo '<ul>' . $this->$functionName($qualifyingCirculation) . '</ul>';
    }
}
?>
