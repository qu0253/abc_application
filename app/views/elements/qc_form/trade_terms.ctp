<table border="1" cellspacing="0" cellpadding="0"  cellspacing="0" cellpadding="0" width="100%">
    <tr class="ic-heading">
        <td colspan="2">
            <?php
                echo str_replace(" Subscription", "", $saleTypes[$sale_type_id]);
                echo $subscription_type_id == 1 ? ' Copies Sales' : ' Subscription';
            ?>
        </td>
    </tr>
    <tr>
        <td class="number-align bold13"><?php echo __('Sold At Trade Term', true); ?></td>
        <td class="number-align bold13"><?php echo __('Copies Sold', true); ?></td>
    </tr>
    <?php
    $temp = 0;
    $i = 0;
    foreach ($tradeTerms as $tradeTerm):
        ?>
        <tr>
            <td class="number-align">
    <?php echo number_format($tradeTerm['TradeTerm']['sold_at_trade_term']); ?>
            </td>
            <td class="number-align">
                <?php
                echo number_format($tradeTerm['TradeTerm']['copies_sold']);
                $temp += $tradeTerm['TradeTerm']['copies_sold'];
                ?>
            </td>
        </tr>
        <?php
    endforeach;
    if ($temp) {
        ?>
        <tr>
            <td class="number-align bold13"><?php echo $saleTypes[$sale_type_id]; ?> Total:</td>
            <td class="number-align bold13"><?php echo number_format($temp); ?></td>
        </tr>
<?php } ?>
</table>