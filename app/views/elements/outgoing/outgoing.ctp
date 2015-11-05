<link rel="stylesheet" type="text/css" href="/css/print_form.css" />
<table border="0" cellpadding="0" cellspacing="0" width="950">
    <tr>
        <td>
            <table border="0" cellpadding="2" cellspacing="0" width="950">
                <tr>
                    <td width="650"><span class="normal11"></span><br />
                        <br /><span class="bold16">Audit Bureau of Circulations</span><br /> Wakefield House, Sprott Road, Ballard Estate, Mumbai - 1</td>
                    <td align="center" valign="top" width="100">
                        <img src="http://www.auditbureau.org/abclogo1.gif">
                    </td>
                    <td align="middle" valign="top" width="200">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br />

<table border="0" cellpadding="2" cellspacing="0" width="950">
    <tr>
        <td width="475" valign="top"><span class="bold13">Audit Period: </span><?php echo $outgoingCertificate['RegularPeriod']['regular_period_name']; ?></td>
    </tr>
    <tr>
        <td width="475" valign="top"><span class="bold13">Publication: </span><?php echo $outgoingCertificate['Publication']['publication_name']; ?></td>
    </tr>
    <tr>
        <td colspan="2" valign="top"><span class="bold13">Address: </span><?php echo $outgoingCertificate['OutgoingCertificate']['address']; ?></td>
    </tr>
    <tr>
        <td colspan="2" valign="top"><span class="bold13">Published from: </span><?php echo $outgoingCertificate['OutgoingCertificate']['published_printed']; ?></td>
    </tr>
    <tr>
        <td width="475" valign="top"><span class="bold13">Language: </span><?php echo $outgoingCertificate['Language']['language_name']; ?></td>
        <td width="475" valign="top"><span class="bold13">Frequency of issue: </span><?php echo $outgoingCertificate['FrequencyType']['frequency_type_name']; ?></td>
    </tr>


    <tr>
        <td colspan="2" valign="top"><span class="bold13">Auditor(s): </span><?php echo $outgoingCertificate['OutgoingCertificate']['auditors']; ?></td>
    </tr>

    <tr>
        <td colspan="2" valign="top"><span class="bold13">
                <?php ___('Single Copy') ?>: </span><?php echo $outgoingCertificate['OutgoingCertificate']['single_copy']; ?>
        </td>
    </tr>

    <tr>
        <td colspan="2" valign="top"><span class="bold13">
                <?php ___('Combo Copy'); ?>: </span><?php echo $outgoingCertificate['OutgoingCertificate']['combo_copy']; ?>
        </td>
    </tr>
</table>
<br/>
<?php
if ($outgoingCertificate['OutgoingCertificateDetail']) {
    echo $this->element('outgoing/outgoing_certificate_details', array('outgoingCertificateDetails' => $outgoingCertificate));
}
?>
<br/>
<table border="1" width="950">
    <tr>
        <td>
            <?php echo $outgoingCertificate['Previous1RegularPeriod']['regular_period_name']; ?> : <?php
            echo ($outgoingCertificate['OutgoingCertificate']['previous_1_circulations']) ? number_format($outgoingCertificate['OutgoingCertificate']['previous_1_circulations']) : '';
            echo $outgoingCertificate['OutgoingCertificate']['previous_1_issues'] ? ' ( ' . number_format($outgoingCertificate['OutgoingCertificate']['previous_1_issues']) . ' ISSUES )' : '';
            ?>
        </td>
        <td>
            <?php echo $outgoingCertificate['Previous2RegularPeriod']['regular_period_name']; ?> : <?php
            echo ($outgoingCertificate['OutgoingCertificate']['previous_2_circulations']) ? number_format($outgoingCertificate['OutgoingCertificate']['previous_2_circulations']) : '';
            echo $outgoingCertificate['OutgoingCertificate']['previous_2_issues'] ? ' ( ' . number_format($outgoingCertificate['OutgoingCertificate']['previous_2_issues']) . ' ISSUES )' : '';
            ?>
        </td>
    </tr>
    <?php
    if ($outgoingCertificate['OutgoingCertificate']['previous_1_note'] || $outgoingCertificate['OutgoingCertificate']['previous_2_note']) {
        ?>
        <tr >
            <td>
                <?php echo $outgoingCertificate['OutgoingCertificate']['previous_1_note']; ?>
            </td>
            <td>
                <?php echo $outgoingCertificate['OutgoingCertificate']['previous_2_note']; ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<br/>
<table border="1" width="950">
    <tr>
        <td colspan="3" class="ic-heading">
            PART A - Qualifying Sales
        </td>
    </tr>
    <tr>
        <td colspan="2">
        </td>
        <td class="number-align bold13">
            <?php ___('Average Copies') ?>
        </td>
    </tr>
    <tr>
        <td rowspan="2" class="bold13">
            <?php ___('A. Non subscription sales') ?>
        </td>
        <td><?php ___('Ss Sa Single Copy Sales') ?></td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['ss_sa_single_copy_sales']); ?>
        </td>
    </tr>
    <tr>
        <td><?php ___('Ss Sa Combo Sales Copies') ?></td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['ss_sa_combo_sales_copies']); ?>
        </td>
    </tr>
    <tr>
        <td rowspan="3" class="bold13">
            <?php ___('B. Subscription Sales') ?>
        </td>
        <td><?php ___('Ss Sa Single Copy Subscription') ?></td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['ss_sa_single_copy_subscription']); ?>
        </td>
    </tr>
    <tr>
        <td><?php ___('Ss Sa Joint Subscription Copies') ?></td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['ss_sa_joint_subscription_copies']); ?>
        </td>
    </tr>
    <tr>
        <td><?php ___('Ss Sa Institutional Subscription Copies') ?></td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['ss_sa_institutional_subscription_copies']); ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="bold13">
            <?php ___('C. Institutional Sales') ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['ss_sa_institutional_sale_copies']); ?>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td class="number-align bold13"><?php ___('Total Ss Sa Average Monthly Qualifying Circulation 1') ?></td>
        <td class="number-align bold13">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['total_ss_sa_average_monthly_qualifying_circulation_1']); ?>
        </td>
    </tr>
    <tr>
        <td colspan="3">DATED : <?php echo $outgoingCertificate['OutgoingCertificate']['date_issue']; ?>
        </td>
    </tr>
</table>
<div class="pagebreak"></div>
<?php
if ($outgoingCertificate['OutgoingCertificateCoverprice']) {
    echo $this->element('outgoing/outgoing_certificate_coverprices', array('outgoingCertificateCoverprices' => $outgoingCertificate));
}
?>
<div class="pagebreak"></div>
<table width="950" border="1">
    <tr>
        <td colspan="2"></td>
        <td class="ic-heading">
            <?php ___('Single copy Sales') ?>
        </td>       
        <td class="ic-heading">
            <?php ___('Combo Copy Sales') ?>
        </td>       		
        <td class="ic-heading">
            <?php ___('INSTN Sales') ?><br/>
        </td>
    </tr>
    <tr>
        <td colspan="5" class="ic-heading-left">
            <?php ___('Details of NRR') ?>
        </td>
    </tr>
    <tr class="single_nnr">
        <td>
            <?php ___('Single Nnr 10') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['single_nnr_10']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['combo_nnr_10']); ?>
        </td>
        <td>
        </td>
    </tr>
    <tr class="single_nnr">
        <td>
            <?php ___('Single Nnr 20') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['single_nnr_20']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['combo_nnr_20']); ?>
        </td>
        <td>
        </td>
    </tr>
    <tr class="single_nnr">
        <td>
            <?php ___('Single Nnr 100') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['single_nnr_100']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['combo_nnr_100']); ?>
        </td>
        <td>
        </td>
    </tr>
    <tr class="single_nnr">
        <td>
            <?php ___('Single Nnr Below Nnr Within Qualifying') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['single_nnr_below_nnr_within_qualifying']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['combo_nnr_below_nnr_within_qualifying']); ?>
        </td>
        <td>
        </td>
    </tr>
    <tr class="single_nnr">
        <td class="number-align bold13">
            <?php ___('Total') ?>   
        </td>
        <td>:</td>
        <td class="number-align bold13">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['single_nnr_10']+$outgoingCertificate['OutgoingCertificate']['single_nnr_20']+$outgoingCertificate['OutgoingCertificate']['single_nnr_100']+$outgoingCertificate['OutgoingCertificate']['single_nnr_below_nnr_within_qualifying']) ?>
        </td>
        <td class="number-align bold13">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['combo_nnr_10']+$outgoingCertificate['OutgoingCertificate']['combo_nnr_20']+$outgoingCertificate['OutgoingCertificate']['combo_nnr_100']+$outgoingCertificate['OutgoingCertificate']['combo_nnr_below_nnr_within_qualifying']) ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td colspan="5" class="ic-heading-left">
            <?php ___('Break up of copies sold with / without incentives') ?>
        </td>
    </tr>
    <tr class="nss_incentive">
        <td>
            <?php ___('Nss Incentive Single Nil') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_single_nil']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_nil']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_nil']); ?>
        </td>
    </tr>
    <tr class="nss_incentive">
        <td>
            <?php ___('Nss Incentive Single 50') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_single_50']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_50']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_50']); ?>
        </td>
    </tr>
    <tr class="nss_incentive">
        <td>
            <?php ___('Nss Incentive Single 100') ?>
        </td>
        <td>:</td>

        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_single_100']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_100']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_100']); ?>
        </td>
    </tr>
    <tr class="nss_incentive">
        <td class="number-align bold13">
            <?php ___('Total') ?>
        </td>
        <td>:</td>

        <td class="number-align bold13">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_single_nil']+$outgoingCertificate['OutgoingCertificate']['nss_incentive_single_50']+$outgoingCertificate['OutgoingCertificate']['nss_incentive_single_100']); ?>
        </td>
        <td class="number-align bold13">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_nil']+$outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_50']+$outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_100']); ?>
        </td>
        <td class="number-align bold13">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_nil']+$outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_50']+$outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_100']); ?>
        </td>
    </tr>
</table>
<?php
if ($outgoingCertificate['OutgoingCertificateCombo']) {
    echo $this->element('outgoing/outgoing_certificate_combos', array('outgoingCertificateCombos' => $outgoingCertificate));
}
?>
<table border="1" width="950">
    <tr>
        <td colspan="3" class="ic-heading-left">
            Institutional Sales
        </td>
    </tr>
    <tr>
        <td>
            <?php ___('Instn Airlines') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['instn_airlines']); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php ___('Instn Body Corporates') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['instn_body_corporates']); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php ___('Instn Edu Inst') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['instn_edu_inst']); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php ___('Instn Hotels') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['instn_hotels']); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php ___('Instn Libraries') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['instn_libraries']); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php ___('Instn Others') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['instn_others']); ?>
        </td>
    </tr>
    <tr>
        <td class="number-align bold13">
            <?php ___('Total Corporates Average Monthly Qualifying Circulation') ?>
        </td>
        <td>:</td>
        <td class="number-align bold13">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['total_corporates_average_monthly_qualifying_circulation']); ?>
        </td>
    </tr>
</table>
<table border="1" width="950">
    <tr>
        <td colspan="7" class="ic-heading">
            PART B - Non Qualifying Circulation
        </td>
    </tr>
    <tr>
        <td colspan="7" class="ic-heading-left">
            <?php ___('Non qualifying sales other than NRR') ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php ___('Single copy Sales') ?></td> 
        <td><?php ___('Combo Copy Sales') ?></td>
        <td><?php ___('Subscription Sales') ?></td>
        <td><?php ___('Institutional Sales') ?></td>
        <td><?php ___('Free Copies') ?></td>
    </tr>    
    <tr class="row50">
        <td>
            <?php ___('NQC Single Non Qualifying Sales Other Than Nnr') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['single_non_qualifying_sales_other_than_nnr']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['combo_non_qualifying_sales_other_than_nnr']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['subscription_non_qualifying_sales_other_than_nnr']); ?>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['institutional_non_qualifying_sales_other_than_nnr']); ?>
        </td>
        <td>
            <?php //echo $this->AlaxosForm->input('free_copies_non_qualifying_sales_other_than_nnr']; ?>
        </td>
    </tr>
    <tr class="row15">
        <td>
            <?php ___('NQC Single Single Copy Sales') ?>
        </td>
        <td>:</td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['single_single_copy_sales']); ?>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
    </tr>
    <tr class="row20">
        <td>
            <?php ___('NQC Single Combo Sales Copies') ?>
        </td>
        <td>:</td>
        <td>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['combo_combo_sales_copies']); ?>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
    </tr>
    <tr class="row25">
        <td>
            <?php ___('NQC Single Single Copy Subscription') ?>
        </td>
        <td>:</td>
        <td>
        </td>
        <td>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['subscription_single_copy_subscription']); ?>
        </td>
        <td>
        </td>
        <td>
        </td>
    </tr>
    <tr class="row30">
        <td>
            <?php ___('NQC Single Joint Subscription Copies') ?>
        </td>
        <td>:</td>
        <td>
        </td>
        <td>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['subscription_joint_subscription_copies']); ?>
        </td>
        <td>
        </td>
        <td>
        </td>
    </tr>
    <tr class="row35">
        <td>
            <?php ___('NQC Single Institutional Subscription Copies') ?>
        </td>
        <td>:</td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['institutional_institutional_subscription_copies']); ?>
        </td>
        <td>
        </td>
    </tr>
    <tr class="row40">
        <td>
            <?php ___('NQC Single Institutional Sale Copies') ?>
        </td>
        <td>:</td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['institutional_institutional_sale_copies']); ?>
        </td>
        <td>
        </td>
    </tr>
    <tr class="row45">
        <td>
            <?php ___('NQC Single Free Copies') ?>
        </td>
        <td>:</td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificate['OutgoingCertificate']['free_copies_free_copies']); ?>
        </td>
    </tr>
</table>