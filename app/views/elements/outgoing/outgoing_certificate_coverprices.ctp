<?php
$arrComments = implode('', array_unique(Set::extract('/comments', $outgoingCertificateCoverprices['OutgoingCertificateCoverprice'])));
$arrAdditionalNotes1 = implode('', array_unique(Set::extract('/additional_notes1', $outgoingCertificateCoverprices['OutgoingCertificateCoverprice'])));
$arrAdditionalNotes2 = implode('', array_unique(Set::extract('/additional_notes2', $outgoingCertificateCoverprices['OutgoingCertificateCoverprice'])));
$arrAdditionalNotes3 = implode('', array_unique(Set::extract('/additional_notes3', $outgoingCertificateCoverprices['OutgoingCertificateCoverprice'])));
?>
<table border="1" width="950">
        <tr class="sortHeader">
            <th><?php echo __('Edition Name', true); ?></th>
            <th><?php echo __('Printing Center Name', true); ?></th>
            <th><?php echo __('Single Combo Other Variant', true); ?></th>
            <th><?php echo __('Cover Price', true); ?></th>
            <th><?php echo __('No Of Publishing Days', true); ?></th>
<!--            <th><?php echo __('Total Copies', true); ?></th>-->
            <th><?php echo __('Copies Per Publishing Day', true); ?></th>
            <?php if (!empty($arrComments)) { ?>
            <th><?php echo $outgoingCertificateCoverprices['OutgoingCertificate']['comments_title']; ?></th>
            <?php }
            if (!empty($arrAdditionalNotes1)) { ?>
            <th><?php echo $outgoingCertificateCoverprices['OutgoingCertificate']['additional_notes1_title']; ?></th>
            <?php }
            if (!empty($arrAdditionalNotes2)) { ?>
            <th><?php echo $outgoingCertificateCoverprices['OutgoingCertificate']['additional_notes2_title']; ?></th>
            <?php }
            if (!empty($arrAdditionalNotes3)) { ?>
            <th><?php echo $outgoingCertificateCoverprices['OutgoingCertificate']['additional_notes3_title']; ?></th>
            <?php } ?>
        </tr>
        <?php
        $i = 0;
        $oldEdition = null;
        $coverpriceTotal = 0;
        foreach ($outgoingCertificateCoverprices['OutgoingCertificateCoverprice'] as $outgoingCertificateCoverprice):
            $i++;
            $edition = $outgoingCertificateCoverprice['Edition']['id'];
            ?>
            <tr class="data">
                <?php
                if ($edition != $oldEdition) {
                $oldEdition = $edition;
                $oldPrintedAt = null;
                $oldVariant = null;
                ?>
                <td rowspan="<?php echo count(Set::extract('/Edition[id='.$outgoingCertificateCoverprice['Edition']['id'].']', $outgoingCertificateCoverprices['OutgoingCertificateCoverprice'])); ?>">
                    <?php echo $outgoingCertificateCoverprice['Edition']['city_name']; ?>
                </td>
                <?php
                }
                ?>
                <?php
                $PrintedAt = $outgoingCertificateCoverprice['PrintingCenter']['PrintedAt']['id'];
                if ($PrintedAt != $oldPrintedAt) {
                $oldPrintedAt = $PrintedAt;
                $oldVariant = null;
                ?>
                <td rowspan="<?php echo count(Set::extract('/Edition[id='.$outgoingCertificateCoverprice['Edition']['id'].']/../PrintingCenter/PrintedAt[id=' . $PrintedAt . ']', $outgoingCertificateCoverprices['OutgoingCertificateCoverprice'])); ?>">
                    <?php echo $outgoingCertificateCoverprice['PrintingCenter']['PrintedAt']['city_name']; ?>
                </td>
                <?php
                }
                ?>
                <?php
                $variant = $outgoingCertificateCoverprice['single_combo_other_variant'];
                if ($variant != $oldVariant) {
                $oldVariant = $variant;
                ?>
                <td rowspan="<?php $arrTemp = Set::extract('/Edition[id='.$outgoingCertificateCoverprice['Edition']['id'].']/../PrintingCenter/PrintedAt[id=' . $PrintedAt . ']/../../single_combo_other_variant', $outgoingCertificateCoverprices['OutgoingCertificateCoverprice']); echo count(array_keys($arrTemp, $outgoingCertificateCoverprice['single_combo_other_variant'])); ?>">
                    <?php echo $outgoingCertificateCoverprice['single_combo_other_variant']; ?>
                </td>
                <?php
                }
                ?>
                <td class="number-align">
                    <?php echo number_format($outgoingCertificateCoverprice['cover_price']); ?>
                </td>
                <td class="number-align">
                    <?php echo number_format($outgoingCertificateCoverprice['no_of_publishing_days']); ?>
                </td>
<!--                <td class="number-align">
                    <?php echo number_format($outgoingCertificateCoverprice['total_copies']); ?>
                </td>-->
                <td class="number-align">
                    <?php echo number_format($outgoingCertificateCoverprice['copies_per_publishing_day']); $coverpriceTotal += $outgoingCertificateCoverprice['copies_per_publishing_day'];?>
                </td>
                <?php if (!empty($arrComments)) { ?>
                <td>
                    <?php echo $outgoingCertificateCoverprice['comments']; ?>
                </td>
                <?php }
                if (!empty($arrAdditionalNotes1)) { ?>
                <td>
                    <?php echo $outgoingCertificateCoverprice['additional_notes1']; ?>
                </td>
                <?php }
                if (!empty($arrAdditionalNotes2)) { ?>
                <td>
                    <?php echo $outgoingCertificateCoverprice['additional_notes2']; ?>
                </td>
                <?php }
                if (!empty($arrAdditionalNotes3)) { ?>
                <td>
                    <?php echo $outgoingCertificateCoverprice['additional_notes3']; ?>
                </td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td colspan="5">
                   Grand Total 
                </td>
                <td class="number-align">
                    <?php echo number_format($coverpriceTotal); ?>
                </td>
            </tr>
</table>