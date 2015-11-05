<table border="1" width="950">
    <tr class="data">
        <td colspan="2">
        </td>
        <td colspan="3" class="ic-heading"><?php echo $outgoingCertificateDetails['RegularPeriod']['regular_period_name']; ?>
        </td>
    </tr>
    <tr class="sortHeader">
        <th><?php echo __('Edition(s)', true); ?></th>
        <th><?php echo __('Printing Center(s)', true); ?></th>
        <th><?php echo __('Total Qualifying Sales', true); ?></th>
        <th><?php echo __('No. of Publishing Days', true); ?></th>
        <th><?php echo __('Average Qualifying Sales', true); ?></th>
    </tr>

    <?php
    $i = 0;
    foreach ($outgoingCertificateDetails['OutgoingCertificateDetail'] as $outgoingCertificateDetail):
        $i++;
        ?>
        <tr class="data">
            <td>
                <?php echo $outgoingCertificateDetail['Edition']['city_name']; ?> <?php echo $outgoingCertificateDetail['edition_symbol']; ?>
            </td>
            <td>
                <?php echo $outgoingCertificateDetail['PrintingCenter']['PrintedAt']['city_name']; ?> <?php echo $outgoingCertificateDetail['printing_center_symbol']; ?>
            </td>
            <td class="number-align">
                <?php echo $outgoingCertificateDetail['total_qualifying_sales_symbol']; ?> <?php echo number_format($outgoingCertificateDetail['total_qualifying_sales']); ?>
            </td>
            <td class="number-align">
                <?php echo $outgoingCertificateDetail['total_number_of_publishing_days_symbol']; ?> <?php echo number_format($outgoingCertificateDetail['total_number_of_publishing_days']); ?>
            </td>
            <td class="number-align">
                <?php echo $outgoingCertificateDetail['average_total_qualifying_sales_symbol']; ?> <?php echo number_format($outgoingCertificateDetail['average_total_qualifying_sales']); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr class="data">
        <td>
        </td>
        <td>
        </td>
        <td class="number-align">
            <?php echo number_format($outgoingCertificateDetails['OutgoingCertificate']['total_qualifying_sales']); ?>
        </td>
        <td>
        </td>
        <td>
        </td>
    </tr>
    <tr class="data">
        <td colspan="4" class="number-align bold13"><?php ___('Total Ss Sa Average Monthly Qualifying Circulation 1') ?></td>
        <td class="number-align bold13"><?php echo number_format($outgoingCertificateDetails['OutgoingCertificate']['average_total_qualifying_sales']); ?>
        </td>
    </tr>
</table>
<table width="950">
    <tr class="data">
        <td><?php echo $outgoingCertificateDetails['OutgoingCertificate']['circulation_notes']; ?>
        </td>
    </tr>
</table>

