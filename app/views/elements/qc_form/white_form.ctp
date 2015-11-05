<?php
// membership
App::import('Model', 'State');
$objState = new State();
$options = array('contain' => array('Zone'), 'fields' => array('State.id', 'State.state_name', 'Zone.zone_name'));
$states = $objState->find('all', $options);
foreach($states as $k => $v) {
    $stateDetails[$v['Zone']['zone_name']][] = $v['State']['state_name'];
}
// membership
App::import('Model', 'Membership');
$objMembership = new Membership();
$options = array('conditions' => array('Membership.id' => $qualifyingCirculation['PrintingCenter']['membership_id']));
$mem = $objMembership->find('first', $options);

// printing center
App::import('Model', 'PrintingCenter');
$objPrintingCenter = new PrintingCenter();
$options = array('conditions' => array('PrintingCenter.id' => $qualifyingCirculation['PrintingCenter']['id']));
$pc = $objPrintingCenter->find('first', $options);

//pr($pc);
//pr($mem);
//pr($qualifyingCirculation);
// District
App::import('Model', 'District');
$objDistrict = new District();
$options = array('conditions' => array('District.id' => $pc['PrintedAt']['district_id']), 'contain' => array('State', 'State.Zone', 'State.Zone.Country'));
$districtVal = $objDistrict->find('first', $options);

$whiteForm = $qualifyingCirculation['WhiteForm'];
$whiteFormDetails = array();
$totalSunday = 0;
$totalCirculation = 0;
foreach($whiteForm as $k => $v) {
    $temp = Set::extract("/City[id={$v['city_id']}]/..", $cities);
    $whiteForm[$k]['details'] = $temp[0];

    if (!isset($whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']]['circulation'])) {
        $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']]['circulation'] = 0;
        $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']]['sunday'] = 0;
    }
    $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']]['circulation'] += ($v['circulation']);
    $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']]['sunday'] += ($v['sunday']);
    if ($v['circulation'] < 250) {
        if (!isset($whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']]['Other Places']['circulation'])) {
            $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']]['Other Places']['circulation'] = $v['circulation'];
            $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']]['Other Places']['sunday'] = $v['sunday'];
            $totalCirculation += $v['circulation'];
            $totalSunday += $v['sunday'];
        } else {
            $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']]['Other Places']['circulation'] += $v['circulation'];
            $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']]['Other Places']['sunday'] += $v['sunday'];
            $totalCirculation += $v['circulation'];
            $totalSunday += $v['sunday'];
        }
    } else {
        if (!isset($whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']][$temp[0]['City']['city_name']])) {
            $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']][$temp[0]['City']['city_name']]['circulation'] = $v['circulation'];
            $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']][$temp[0]['City']['city_name']]['sunday'] = $v['sunday'];
            $totalCirculation += $v['circulation'];
            $totalSunday += $v['sunday'];
        } else {
            $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']][$temp[0]['City']['city_name']]['circulation'] += $v['circulation'];
            $whiteFormDetails[$temp[0]['Zone']['zone_name']][$temp[0]['State']['state_name']][$temp[0]['District']['district_name']][$temp[0]['City']['city_name']]['sunday'] += $v['sunday'];
            $totalCirculation += $v['circulation'];
            $totalSunday += $v['sunday'];
        }
    }
}
foreach($whiteFormDetails as $zoneName => $StateNames) {
    foreach($StateNames as $stateName => $districts) {
        foreach($districts as $districtName => $cities) {
            if ($districtName == 'circulation' || $districtName == 'sunday') {
                continue;
            }
            if (is_array($cities)) {
                if (!isset($districtTotal[$districtName])) {
                    $districtTotal[$districtName] = 0;
                }
                ksort($cities);
                foreach($cities as $cityName => $cityDetails) {
                    if (is_array($cityDetails)) {
                        $districtTotal[$districtName] += $cityDetails['circulation'] + $cityDetails['sunday'];
                    }
                }
            }
            if ($districtTotal[$districtName] < 250) {
                if (!isset($whiteFormDetails[$zoneName][$stateName]['Other Districts']['Other Places']['circulation']) && !isset($whiteFormDetails[$zoneName][$stateName]['Other Districts']['Other Places']['sunday'])) {
                    $whiteFormDetails[$zoneName][$stateName]['Other Districts']['Other Places']['circulation'] = $cityDetails['circulation'];
                    $whiteFormDetails[$zoneName][$stateName]['Other Districts']['Other Places']['sunday'] = $cityDetails['sunday'];
                } else {
                    $whiteFormDetails[$zoneName][$stateName]['Other Districts']['Other Places']['circulation'] += $cityDetails['circulation'];
                    $whiteFormDetails[$zoneName][$stateName]['Other Districts']['Other Places']['sunday'] += $cityDetails['sunday'];
                }
                unset($whiteFormDetails[$zoneName][$stateName][$districtName]);
            }
        }
    }
}
// membership
App::import('Model', 'City');
$objEdition = new City();
$options = array('conditions' => array('City.id' => $mem['Edition']['id']), 'contain' => array('District'));
$resEdition = $objEdition->find('first', $options);
//$totalSunday = 0; // for testing
?>
<table border="0" cellpadding="2" cellspacing="0" width="950">
    <tr>
        <td width="650">
            <span class="bold16">Audit Bureau of Circulations</span><br />
            Wakefield House, Sprott Road, Ballard Estate, Mumbai - 1 <br /><br />
            <span class="normal11">Details of Distribution and Territorial 
                Breakdown of circulation</span><br />
            <br />
        </td>
        <td align="center" valign="top" width="100">
            <img src="http://www.auditbureau.org/abclogo1.gif"></td>
        <td align="middle" valign="top" width="200">
<!--            <table class="mytable" width="200">
                <tr>
                    <td align="center" colspan="2">(MULTI PRINTING CENTRE)</td>
                </tr>
                <tr>
                    <td align="center" colspan="2">Certificate Number</td>
                </tr>
                <tr>
                    <td align="center" width="100">(130)</td>
                    <td align="center" width="100">(1832)</td>
                </tr>
            </table>-->
        </td>
    </tr>
</table>
<br />
<table border="0" cellpadding="2" cellspacing="0" width="950">
	<tr>
		<td width="475" valign="top"><span class="bold13">Language: </span><?php echo $printingCenter['Membership']['Language']['language_name']; ?></td>
		<td width="475" valign="top"><span class="bold13">Frequency of issue: </span><?php echo $printingCenter['Membership']['FrequencyType']['frequency_type_name']; ?></td>
	</tr>

	<tr>
		<td width="475" valign="top"><span class="bold13">Published from: </span><?php echo $printingCenter['Membership']['Edition']['city_name']; ?></td>
		<td width="475" valign="top"><span class="bold13">Printed at: </span><?php echo $printingCenter['PrintedAt']['city_name']; ?></td>
	</tr>
	<tr>
        <td colspan="4" style="height: 20px">Name of the Publication: <?php echo $mem['Publication']['publication_name']; ?></td>
    </tr>
    <tr>
        <td align="left">Average Circulation for the audit period: <?php echo $qualifyingCirculation['RegularPeriod']['regular_period_name']; ?></td>
    </tr>
</table>
<br />
<table border="0" cellpadding="0" cellspacing="0" width="950">
    <tr>
        <td style="height: 864px; width: 475px;" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="475" class="rightTable">
                <tr>				
                    <th align="center" colspan="5" style="height: 39px">
                        <span class="bold16">Section A</span><br />
                        Statewise distribution in India and outside India</th>
                </tr>
                <tr>
                    <td class="border_b border_T" style="width: 37px; height: 32px;">&nbsp;</td>
                    <td class="border_b border_T" style="width: 899px; height: 32px;"></td>
                    <td class="border_b border_T border_L Average" style="height: 32px">Average Circulation</td>
                    <?php if ($totalSunday > 0) { ?>
						<td class="border_b border_T border_L Average" style="height: 32px">Sunday Circulation</td>
                    <?php } ?>
                    <td class=" border_b border_T" style="height: 32px"></td>
                </tr>
                <tr>
                    <td valign="top">1.</td>
                    <td style="width: 899px">In the town(s) of Publication <?php echo $printingCenter['PrintedAt']['city_name']; ?></td>
                    <td align="right" class="border_L"><?php $cityDetails = $whiteFormDetails[$resEdition['Zone']['zone_name']][$resEdition['State']['state_name']][$resEdition['District']['district_name']][$resEdition['City']['city_name']]; echo number_format($cityDetails['circulation']) ;?></td>
                    <?php if ($totalSunday > 0) { ?>
						<td align="right" class="border_L"><?php echo number_format($cityDetails['sunday']) ;?></td>
                    <?php } ?>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="underline" style="width: 899px"></td>
                    <td align="right" class="border_L">&nbsp;</td>
                    <?php if ($totalSunday > 0) { ?>
                    <td align="right" class="border_L">&nbsp;</td>
                    <?php } ?>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                    <td valign="top">2.</td>
                    <td style="height: 20px; width: 899px;">In the State(s) in which 
                        the town(s) of publication are situated : <br><?php echo $pc['State']['state_name']; ?></td>
                    <td align="right" class="border_L" style="height: 20px;"><?php echo number_format($whiteFormDetails[$districtVal['State']['Zone']['zone_name']][$pc['State']['state_name']]['circulation']) ;?></td>
                    <?php if ($totalSunday > 0) { ?>
                    <td align="right" class="border_L" style="height: 20px;"><?php echo number_format($whiteFormDetails[$districtVal['State']['Zone']['zone_name']][$pc['State']['state_name']]['sunday']) ;?></td>
                    <?php } ?>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="underline" style="width: 899px"></td>
                    <td align="right" class="border_L">&nbsp;</td>
                    <?php if ($totalSunday > 0) { ?>
                    <td align="right" class="border_L">&nbsp;</td>
                    </td>
                    <?php } ?>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr>
                    <td style="height: 16px">3. </td>
                    <td class="underline" style="width: 899px; height: 16px;">In Other States<br></td>
                    <td align="right" class="border_L" style=" height: 16px;"></td>
                    <?php if ($totalSunday > 0) { ?>
                    <td align="right" class="border_L" style=" height: 16px;">
                    </td>
                    <?php } ?>
                    <td align="right"></td>
                </tr>
                <?php
                foreach ($stateDetails as $zoneName => $stateLists) {
                    asort($stateLists);
                    ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="bold14underline"><?php echo $zoneName;?> ZONE</td>
                        <td align="right" class="border_L" style="height: 20px;">&nbsp;</td>
                        <?php if ($totalSunday > 0) { ?>
                        <td align="right" class="border_L" style="height: 20px;">&nbsp;</td>
                        <?php } ?>
                        <td align="right">&nbsp;</td>
                    </tr>
                    <?php
                    foreach ($stateLists as $stateName) {
                        if (strtolower($stateName) != strtolower($pc['State']['state_name'])) {
                        ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td style="height: 20px; width: 899px;"><?php echo $stateName; ?></td>
                            <td align="right" class="border_L" style="height: 20px;"><?php echo isset($whiteFormDetails[$zoneName][$stateName]['circulation']) ? number_format($whiteFormDetails[$zoneName][$stateName]['circulation']) : '-' ;?></td>
                            <?php if ($totalSunday > 0) { ?>
                            <td align="right" class="border_L" style="height: 20px;"><?php echo isset($whiteFormDetails[$zoneName][$stateName]['sunday']) ? number_format($whiteFormDetails[$zoneName][$stateName]['sunday']) : '-' ;?></td>
                            <?php } ?>
                            <td align="right">&nbsp;</td>
                        </tr>
                        <?php
                        }
                    }
                }
                ?>
                <tr>
                        <td class="border_T border_b">&nbsp;</td>
                        <td class="border_T border_b bold16">
                        Total</td>
                        <td align="right" class="border_b border_T border_L bold13"><?php echo number_format($totalCirculation);?></td>
                        <?php if ($totalSunday > 0) { ?>
                        <td align="right" class="border_b border_T border_L bold13"><?php echo number_format($totalSunday);?></td>
                        <?php } ?>
                        <td align="right" class="border_b border_T bold13"></td>
                </tr>
            </table>
        </td>
        <td style="height: 864px; width: 475px;" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="475" class="rightTable">
                <tr>
                    <th align="center" class="" style="height: 39px; width: 11px;">&nbsp;</th>
                    <th align="center" class="" colspan="5" style="height: 39px">
                        <span class="bold16">Section B</span><br />
                        Townwise distribution (250 copies or more) in various States</th>
                </tr>
                <tr>
                    <td class="border_b border_T" style="width: 11px; height: 32px;">&nbsp;</td>
                    <td class="border_b border_T" style="width: 899px; height: 32px;"></td>
                    <td class="border_b border_T border_L Average" style="height: 32px">Average Circulation</td>
                    <?php if ($totalSunday > 0) { ?>
                    <td class="border_b border_T border_L Average" style="height: 32px">Sunday Circulation</td>
                    <?php } ?>
                    <td class=" border_b border_T" style="height: 32px"></td>
                </tr>
                <?php
                $rowCount = 0;
                foreach($whiteFormDetails as $zoneName => $StateNames) {
                    ksort($StateNames);
                    foreach($StateNames as $stateName => $districts) {
                        ?>
                        <tr>
                            <td class="underline" style="width: 11px"></td>
                            <td class="underline" style="width: 899px"><?php echo $stateName; $rowCount++;?></td>
                            <td align="right" class="border_L">&nbsp;</td>
                            <?php if ($totalSunday > 0) { ?>
                            <td align="right" class="border_L">&nbsp;</td>
                            <?php } ?>
                            <td align="right">&nbsp;</td>
                        </tr>
                        <?php
                        if (is_array($districts)) {
                            ksort($districts);
                            foreach($districts as $districtName => $cities) {
                                if ($districtName == 'circulation' || $districtName == 'sunday') {
                                    continue;
                                }
                                
                                $subtotalCirculation = 0;
                                $subtotalSunday = 0;
                                ?>
                                <tr>
                                    <td class="underline" style="width: 11px"></td>
                                    <td class="underline" style="width: 899px"><?php echo strtolower($districtName) !=  'other districts' ? "{$districtName} District" : $districtName;  $rowCount++; $rowCount++; $rowCount++;?></td>
                                    <td align="right" class="border_L" style="height: 20px;"></td>
                                    <?php if ($totalSunday > 0) { ?>
                                    <td align="right" class="border_L" style="height: 20px;"></td>
                                    <?php } ?>
                                    <td align="right">&nbsp;</td>
                                </tr>
                                <?php
                                if (is_array($cities)) {
                                    ksort($cities);
                                    foreach($cities as $cityName => $cityDetails) {
                                        if (is_array($cityDetails)) {
                                        ?>
                                        <tr>
                                            <td style="height: 20px; width: 11px;"></td>
                                            <td style="height: 20px; width: 899px;"><?php echo $cityName; ?></td>
                                            <td align="right" class="border_L" style="height: 20px;"><?php echo number_format($cityDetails['circulation']); $subtotalCirculation +=$cityDetails['circulation'];  $rowCount++;?></td>
                                            <?php if ($totalSunday > 0) { ?>
                                            <td align="right" class="border_L" style="height: 20px;"><?php echo number_format($cityDetails['sunday']); $subtotalSunday +=$cityDetails['sunday'];  $rowCount++;?></td>
                                            <?php } ?>
                                            <td align="right" style="height: 20px"></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="underline" style="width: 11px"></td>
                                    <td class="bold13" style="width: 899px">Dist. Total:</td>
                                    <td align="right" class="border_b border_T border_L bold13" style="height: 20px;"><?php echo number_format($subtotalCirculation); ?></td>
                                    <?php if ($totalSunday > 0) { ?>
                                    <td align="right" class="border_b border_T border_L bold13" style="height: 20px;"><?php echo number_format($subtotalSunday); ?></td>
                                    <?php } ?>
                                    <td align="right" class="border_b border_T" >&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="underline" style="width: 11px"></td>
                                    <td class="underline" style="width: 899px"></td>
                                    <td align="right" class="border_L">&nbsp;</td>
                                    <?php if ($totalSunday > 0) { ?>
                                    <td align="right" class="border_L">&nbsp;</td>
                                    <?php } ?>
                                    <td align="right">&nbsp;</td>
                                </tr>
                                <?php
                                if ($rowCount > 45 && !@$flag1) {
                                    $flag1 = true;
                                ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <?php
                                }
                    if (@$flag1 && !@$flag2) {
                        @$flag2 = true;
                    ?>
                    <div class="pagebreak"></div>
                    <table cellpadding="0" cellspacing="0"  border="0"style="width: 957px">
                        <tr>
                            <td style="text-align: center; height: 55px; width: 937px;">
                                <span class="bold16">Section B</span> <br>Town-wise distribution (250 copies or more) in various States </td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="950">
                        <tr>
                            <td style="height: 864px; width: 475px;" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="475" class="rightTable">
                                    <tr>
                                        <td class="border_b " style="width: 11px; height: 32px;">&nbsp;</td>
                                        <td class="border_b" style="width: 899px; height: 32px;"></td>
                                        <td class="border_b border_L Average" style="height: 32px">Average Circulation</td>
                                        <?php if ($totalSunday > 0) { ?>
                                        <td class="border_b border_L Average" style="height: 32px">Sunday Circulation</td>
                                        <?php } ?>
                                        <td class=" border_b " style="height: 32px">
                                        </td>
                                    </tr>            
                                <?php
                                }
                                if (@$flag2 && !@$flag3 && $rowCount > 90) {
                                    $flag3 = true;
                                    ?>
                                </table>
                            </td>
                            <td style="height: 864px; width: 475px;" valign="top">
                                <?php
                                }
                                if (@$flag2 && @$flag3 && !@$flag4) {
                                    @$flag4 = true;
                                ?>
                                <table border="0" cellpadding="0" cellspacing="0" width="475" class="rightTable">
                                    <tr>
                                        <td class="border_b " style="width: 11px; height: 32px;">&nbsp;</td>
                                        <td class="border_b" style="width: 899px; height: 32px;"></td>
                                        <td class="border_b border_L Average" style="height: 32px">Average Circulation</td>
                                        <?php if ($totalSunday > 0) { ?>
                                        <td class="border_b border_L Average" style="height: 32px">Sunday Circulation</td>
                                        <?php } ?>
                                        <td class=" border_b " style="height: 32px"></td>
                                    </tr>
                                    <?php
                                }
                                if ($rowCount > 135 && !@$flag5) {
                                    $flag5 = true;
                                ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <?php
                                }
                    if (@$flag5 && !@$flag6) {
                        @$flag6 = true;
                    ?>
                    <div class="pagebreak"></div>
                    <table cellpadding="0" cellspacing="0"  border="0"style="width: 957px">
                        <tr>
                            <td style="text-align: center; height: 55px; width: 937px;">
                                <span class="bold16">Section B</span> <br>Town-wise distribution (250 copies or more) in various States 
							</td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="950">
                        <tr>
                            <td style="height: 864px; width: 475px;" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="475" class="rightTable">
                                    <tr>
                                        <td class="border_b " style="width: 11px; height: 32px;">&nbsp;</td>
                                        <td class="border_b" style="width: 899px; height: 32px;"></td>
                                        <td class="border_b border_L Average" style="height: 32px">Average Circulation</td>
                                        <?php if ($totalSunday > 0) { ?>
                                        <td class="border_b border_L Average" style="height: 32px">Sunday Circulation</td>
                                        <?php } ?>
                                        <td class=" border_b " style="height: 32px"></td>
                                    </tr>            
                                <?php
                                }
                                if (@$flag6 && !@$flag7 && $rowCount > 180) {
                                    $flag7 = true;
                                    ?>
                                </table>
                            </td>
                            <td style="height: 864px; width: 475px;" valign="top">
                                <?php
                                }
                                if (@$flag7 && !@$flag8) {
                                    @$flag8= true;
                                ?>
                                <table border="0" cellpadding="0" cellspacing="0" width="475" class="rightTable">
                                    <tr>
                                        <td class="border_b " style="width: 11px; height: 32px;">&nbsp;</td>
                                        <td class="border_b" style="width: 899px; height: 32px;"></td>
                                        <td class="border_b border_L Average" style="height: 32px">Average Circulation</td>
                                        <?php if ($totalSunday > 0) { ?>
                                        <td class="border_b border_L Average" style="height: 32px">Sunday Circulation</td>
                                        <?php } ?>
                                        <td class=" border_b " style="height: 32px"></td>
                                    </tr>
                                    <?php
                                }
                                if ($rowCount > 225 && !@$flag9) {
                                    $flag9 = true;
                                ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <?php
                                }
                    if (@$flag9 && !@$flag10) {
                        @$flag10 = true;
                    ?>
                    <div class="pagebreak"></div>
                    <table cellpadding="0" cellspacing="0"  border="0"style="width: 957px">
                        <tr>
                            <td style="text-align: center; height: 55px; width: 937px;">
                                <span class="bold16">Section B</span> <br>Town-wise distribution (250 copies or more) in various States
							</td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" width="950">
                        <tr>
                            <td style="height: 864px; width: 475px;" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="475" class="rightTable">
                                    <tr>
                                        <td class="border_b " style="width: 11px; height: 32px;">&nbsp;</td>
                                        <td class="border_b" style="width: 899px; height: 32px;"></td>
                                        <td class="border_b border_L Average" style="height: 32px">Average Circulation</td>
                                        <?php if ($totalSunday > 0) { ?>
                                        <td class="border_b border_L Average" style="height: 32px">Sunday Circulation</td>
                                        <?php } ?>
                                        <td class=" border_b " style="height: 32px"></td>
                                    </tr>            
                                <?php
                                }
                                if (@$flag10 && !@$flag11 && $rowCount > 235) {
                                    $flag11 = true;
                                    ?>
                                </table>
                            </td>
                            <td style="height: 864px; width: 475px;" valign="top">
                                <?php
                                }
                                if (@$flag11 && !@$flag12) {
                                    @$flag12= true;
                                ?>
                                <table border="0" cellpadding="0" cellspacing="0" width="475" class="rightTable">
                                    <tr>
                                        <td class="border_b " style="width: 11px; height: 32px;">&nbsp;</td>
                                        <td class="border_b" style="width: 899px; height: 32px;">
                                        </td>
                                        <td class="border_b border_L Average" style="height: 32px">Average Circulation</td>
                                        <?php if ($totalSunday > 0) { ?>
                                        <td class="border_b border_L Average" style="height: 32px">Sunday Circulation</td>
                                        <?php } ?>
                                        <td class=" border_b " style="height: 32px"></td>
                                    </tr>
                                    <?php
                                }
                                if ($rowCount > 270 && !@$flag13) {
                                    $flag13 = true;
                                ?>
                                    <?php
                                }
                            }
                        }
                    }
                } // max rows 
                ?>

            </table>
        </td>
    </tr>
</table>
<style type="text/css">
    body, th, td {
        font-family: arial, sans-serif;
        margin: 5px;
        font-size: 13px;
    }
    .bold13 {
        font-size: 13px;
        font-weight: bold;
    }
    .bold16 {
        font-size: 16px;
        font-weight: bold;
    }
    .bold14underline {
        font-size: 14px;
        font-weight: bold;
        text-decoration: underline;
    }
    .underline {
        text-decoration: underline;
    }
    .normal11 {
        font-size: 11px;
    }
    .border {
        border: 1px solid #000;
        font-weight: bold;
    }
    td {
    }
    .border_L {
        border-left: 1px solid #000;
    }
    .border_R {
        border-right: 1px solid #000;
    }
    .border_T {
        border-top: 1px solid #000;
    }
    .border_b {
        border-bottom: 1px solid #000;
    }
    .Average {
        text-align: center;
        font-weight: bold;
    }

    table.myTable {
        border-collapse: collapse;
    }
    table.myTable th, table.myTable td {
        border: 1px solid black;
        padding: 2px;
    }


    table.rightTable {
		border: thin;
		border-color: black;
		border-style: solid;
    }
</style>