<table border="1" width="950">
        <tr class="ic-heading-left">
            <td colspan="2"><?php echo __('Combo sales', true); ?></td>
        </tr>
        <?php
        $i = 0;
        $comboTotal = 0;
        foreach ($outgoingCertificateCombos['OutgoingCertificateCombo'] as $outgoingCertificateCombo):
            $i++;
            ?>
            <tr class="data">
                <td>
                    <?php echo __('Combo Alongwith ', true) . $outgoingCertificateCombo['combo_name']; ?>
                </td>
<!--                <td>
                    <?php echo $outgoingCertificateCombo['cover_price']; ?>
                </td>-->
                <td class="number-align">
                    <?php echo number_format($outgoingCertificateCombo['combo']); $comboTotal += $outgoingCertificateCombo['combo']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="data">
            <td class="number-align bold13">
                Total :
            </td>
            <td class="number-align bold13">
                <?php echo number_format($comboTotal); ?>
            </td>
        </tr>
</table>