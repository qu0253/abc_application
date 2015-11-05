<?php
$membership = $print;
$representatives = $print['Representative'];
$holdingCompany = $print['HoldingCompany'][0];
$RniDetails = $print['RniDetail'];
$printing_centers = $print['PrintingCenter'];
$membershipPayment = $print['MembershipPayment'][0];
$Publication = $print['Publication'];
$Membership = $print['Membership'];
$Language = $print['Language'];
$PublicationType = $print['PublicationType'];
$FrequencyType = $print['FrequencyType'];
$Proposer1Representative = $print['Proposer1Representative'];
$Proposer2Representative = $print['Proposer2Representative'];
$PrimaryRepresentative = Set::extract('/Representative[representative_type_id=1]', $print);
$PrimaryRepresentative = $PrimaryRepresentative[0]['Representative'];

$BillingRepresentative = Set::extract('/Representative[representative_type_id=2]', $print);
$BillingRepresentative = $BillingRepresentative[0]['Representative'];

$MumbaiRepresentative = Set::extract('/Representative[representative_type_id=3]', $print);
$MumbaiRepresentative = $MumbaiRepresentative[0]['Representative'];
?>
<link rel="stylesheet" type="text/css" href="/css/print_form.css" />

<?php foreach( $printing_centers as $k => $printingCenterDetails) { ?>
<table border="0" cellpadding="0" cellspacing="0" width="950">
	<tr>
		<td>
			<table border="0" cellpadding="2" cellspacing="0" width="950">
				<tr>
					<td width="650"><span class="normal11">MEMBERSHIP APPLICATION FORM </span><br />
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
		<td width="475" valign="top"><span class="bold13">Place: </span><?php echo $membership['Edition']['city_name']; ?></td>
		<td width="475" valign="top"><span class="bold13">Date: </span><?php echo date('d-m-Y'); ?></td>
	</tr>
</table>

<br />

<table border="0" cellpadding="2" cellspacing="0" width="950">
	<tr>
		<td colspan="2">I/We, the undersigned, hereby apply to the Council of Management of Audit Bureau of Circulations for enrolment to membership of the Bureau. <br /><br /></td>
	</tr>
	<tr>
		<td colspan="2">I/We undertake to abide by the Memorandum and Articles of Association of the Company, and to observe the rules and regulations governing the working of the Bureau as laid down by the Council from time to time. <br /><br /></td>
	</tr>
	<tr>
		<td colspan="2">We also undertake to submit circulation figures every six months which are compiled as per the provisions of Bureau's Guide to ABC Audit and audited by an empanelled firm of auditor. <br /><br /></td>
	</tr>
	<tr>
		<td colspan="2">(The Audit Bureau of Circulations is a company limited by Guarantee and not having a share capital. The only possible financial liability attached to members, other than their entrance fee and annual subscription is one of not exceeding Rupees fifteen per member in the event of winding up of the Company.) <br /><br /></td>
	</tr>
	<tr>
		<td colspan="2">I/We further agree that in the event of any differences of disputes arising between me/we and the Bureau and / or its Council of Management at any time from the date of this application, whether during the period of my /our membership of the Bureau or after its cessation, these shall be subject to the jurisdiction of Courts in Mumbai only. <br /><br /></td>
	</tr>
	<tr>
		<td colspan="2">An amount of Rs. <?php echo $membershipPayment['amount']; ?> towards Application fee is remitted along with the Application Form. <br /><br />
		<!--Chque / DD / NEFT <?php //echo $membershipPayment['chque_dd_no'] . ' dated ' . $membershipPayment['date_of_chque_dd_no']; ?> for <?php //echo $membershipPayment['amount']; ?> is enclosed. --></td>
	</tr>
	<tr>
		<td height="60" colspan="2"><span class="bold13">Name of Publication: </span><?php echo $Publication['publication_name']; ?></td>
	</tr>
	<tr>
		<td height="80"><span class="bold13">Signature: </span></td>
		<td><span class="bold13">Rubber Stamp / Seal: </span></td>
	</tr>
	<tr>
		<td width="475"><span class="bold13">Name: </span><?php echo $PrimaryRepresentative['Prefix']['prefix_name'] . ' ' . $PrimaryRepresentative['representative_name']; ?></td>
		<td width="475"><span class="bold13">Designation: </span><?php echo $PrimaryRepresentative['designation']; ?></td>
	</tr>
	<tr>
		<td height="60" colspan="2"><b>For & on behalf of </b><?php echo $holdingCompany['holding_company_name']; ?></td>
	</tr>
	<tr>
		<td colspan="2"><b>Address: </b><?php echo $holdingCompany['Address']['address_line_1'] . ' ' . $holdingCompany['Address']['address_line_2'] . ', ' . $holdingCompany['Address']['City']['city_name'] . ', ' . $holdingCompany['Address']['District']['district_name'] . ', ' . $holdingCompany['Address']['State']['state_name'] . ' - ' . $holdingCompany['Address']['pin'] ; ?></td>
	</tr>
</table>

<br /><br />

<table border="0" cellpadding="0" cellspacing="0" width="950" style="border: 1px solid black">
	<tr>
		<td width="200" style="border: 1px solid black;"><span class="bold13">Proposed by</td>
		<td width="200" style="border: 1px solid black;">&nbsp;</td>
		<td width="200" style="border: 1px solid black;"><span class="bold13">Seconded by</td>
		<td width="200" style="border: 1px solid black;">&nbsp;</td>
	</tr>
	<tr>
		<td width="200" style="border: 1px solid black;">Name of the representative <br />[should be a member of ABC]</td>
		<td width="200" style="border: 1px solid black;" valign="top"><?php echo $Proposer1Representative['Prefix']['prefix_name'] . ' ' . $Proposer1Representative['representative_name']; ?></td>
		<td width="200" style="border: 1px solid black;">Name of the representative <br />[should be a member of ABC]</td>
		<td width="200" style="border: 1px solid black;" valign="top"><?php echo $Proposer2Representative['Prefix']['prefix_name'] . ' ' . $Proposer2Representative['representative_name']; ?></td>
	</tr>
	<tr>
		<td width="200" style="border: 1px solid black;">Company's Name: <br />[in case of publisher member, please mention the name of the publication represented]</td>
		<td width="200" style="border: 1px solid black;" valign="top"><?php echo ($Proposer1Representative['Membership']['name']) ? $Proposer1Representative['Membership']['name'] : $Proposer1Representative['Membership']['Publication']['publication_name'] . ' ' . $Proposer1Representative['Membership']['Edition']['city_name']; ?></td>
		<td width="200" style="border: 1px solid black;">Company's Name: <br />[in case of publisher member, please mention the name of the publication represented]</td>
		<td width="200" style="border: 1px solid black;" valign="top"><?php echo ($Proposer2Representative['Membership']['name']) ? $Proposer2Representative['Membership']['name'] : $Proposer2Representative['Membership']['Publication']['publication_name'] . ' ' . $Proposer2Representative['Membership']['Edition']['city_name']; ?></td>
	</tr>
	<tr>
		<td height="60" width="200" style="border: 1px solid black;">Signature</td>
		<td width="200" style="border: 1px solid black;">&nbsp;</td>
		<td width="200" style="border: 1px solid black;">Signature</td>
		<td width="200" style="border: 1px solid black;">&nbsp;</td>
	</tr>
	<tr>
		<td height="60" width="200" style="border: 1px solid black;">Rubber Stamp / Seal</td>
		<td width="200" style="border: 1px solid black;">&nbsp;</td>
		<td width="200" style="border: 1px solid black;">Rubber Stamp / Seal</td>
		<td width="200" style="border: 1px solid black;">&nbsp;</td>
	</tr>
</table>

<table border="0" cellpadding="2" cellspacing="0" width="950">
	<tr>
		<td align="center"><b>(To be proposed and seconded by any two members of the Bureau.) <b /></td>
	</tr>
</table>

<p class="pagebreak"></p>

<table border="0" cellpadding="0" cellspacing="0" width="950">
	<tr>
		<td>
			<table border="0" cellpadding="2" cellspacing="0" width="950">
				<tr>
					<td width="650" valign="top">
					<span class="bold16">Audit Bureau of Circulations</span><br /> Wakefield House, Sprott Road, Ballard Estate, Mumbai - 1
					</td>
					<td align="center" valign="middle" width="100">
						<img src="http://www.auditbureau.org/abclogo1.gif">
					</td>
					<td align="middle" valign="top" width="200">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br /><br />

<table border="0" cellpadding="2" cellspacing="0" width="950">
	<tr>
		<td align="center"><b>PERMANENT INFORMATION FORM <b /></td>
	</tr>
</table>

<br /><br />

<table border="0" cellpadding="5" cellspacing="5" width="950">
	<tr>
		<td width="200">Publication:</td>
		<td width="275"><?php echo $Publication['publication_name']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200">Date of first issue:</td>
		<td width="200"><?php echo DateTool :: sql_to_date($printingCenterDetails['date_of_first_issue']); ?></td>
	</tr>
	<tr>
		<td width="200">Proprietors:</td>
		<td width="275"><?php echo $holdingCompany['holding_company_name']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200"></td>
		<td width="200"></td>
	</tr>
	<tr>
		<td width="200">Printed and Published from:</td>
		<td width="275"><?php echo $printingCenterDetails['PrintedAt']['city_name']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200"></td>
		<td width="200"></td>
	</tr>
	<tr>
		<td width="200" valign="top">Address (Postal, E-mail and Telephone No.):</td>
		<td width="275"><?php echo $printingCenterDetails['Address']['address_line_1'] . ' ' . $printingCenterDetails['Address']['address_line_2'] . ', ' . $printingCenterDetails['Address']['City']['city_name'] . ', ' . $printingCenterDetails['Address']['District']['district_name'] . ', ' . $printingCenterDetails['Address']['State']['state_name'] . ' - ' . $printingCenterDetails['Address']['pin'] ; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200"></td>
		<td width="200"></td>
	</tr>
	<tr>
		<td width="200">Nature of Publication:</td>
		<td width="275"><?php echo $PublicationType['publication_type_name']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200"></td>
		<td width="200"></td>
	</tr>
	<tr>
		<td width="200">Frequency of issue: </td>
		<td width="275"><?php echo $FrequencyType['frequency_type_name']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200">Claimed Circulation:</td>
		<td width="200"> <?php echo $printingCenterDetails['claimed_circulation']; ?></td>
	</tr>
	<tr>
		<td width="200">Price:</td>
		<td width="275"><?php echo $Membership['cover_price']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200">Language:</td>
		<td width="200"><?php echo $Language['language_name']; ?></td>
	</tr>
</table>
<table border="0" cellpadding="5" cellspacing="5" width="950">
	<tr>
		<td width="200">RNI Registration No.:</td>
		<td width="675"><?php echo !empty($Membership['applied_for_rni_no']) ? 'We have applied RNI. [Application will be treated as Incomplete till submission of RNI details] ' : $RniDetails['0']['rni_number'] . ' [please attach a copy of RNI Certificate] '; ?></td>
	</tr>
	<tr>
		<td width="200">Name of all other publications printed and owned by the proprietors</td>
		<td width="675"><?php echo $Membership['other_publications']; ?></td>
	</tr>
	<tr>
		<td width="200">Branch Office(s) at</td>
		<td width="675"><?php echo $Membership['branch_offices']; ?></td>
	</tr>
	<tr>
		<td width="200">Does the Publisher-applicant belong to any other professional organisation(s) e.g. INS and or ILNA etc? if so, the name(s) of such organization(s) may please be stated</td>
		<td width="675"><?php echo $Membership['belong_to_other_prof_org']; ?></td>
	</tr>
</table>
<table border="0" cellpadding="5" cellspacing="5" width="950">
	<tr>
		<td width="200" valign="top">Name of Representative on the Bureau</td>
		<td width="235"><?php pr($PrimaryRepresentative);echo $PrimaryRepresentative['Prefix']['prefix_name'] . ' ' . $PrimaryRepresentative['representative_name'];?></td>
		<td width="200" valign="top">Designation, Address, Email &Tel. No.</td>
		<td width="315"><?php echo $PrimaryRepresentative['designation'] . '<br />' . $PrimaryRepresentative['Address']['address_line_1'] . ' ' . $PrimaryRepresentative['Address']['address_line_2'] . ', ' . $PrimaryRepresentative['Address']['City']['city_name'] . ', ' . $PrimaryRepresentative['Address']['District']['district_name'] . ', ' . $PrimaryRepresentative['Address']['State']['state_name'] . ' - ' . $PrimaryRepresentative['Address']['pin'] . '<br />' . $PrimaryRepresentative['Address']['email'] . '<br />' . $PrimaryRepresentative['Address']['std_code'] . '-' . $PrimaryRepresentative['Address']['phone_number_1']; ?></td>
	</tr>
	<tr>
		<td width="200" valign="top">Name of Mumbai Representative <br/>(If any)</td>
		<td width="235"><?php echo $MumbaiRepresentative['Prefix']['prefix_name'] . ' ' . $MumbaiRepresentative['representative_name'];?></td>
		<td width="200" valign="top">Designation, Address, Email &Tel. No.</td>
		<td width="315"><?php echo $MumbaiRepresentative['designation'] . '<br />' . $MumbaiRepresentative['Address']['address_line_1'] . ' ' . $MumbaiRepresentative['Address']['address_line_2'] . ', ' . $MumbaiRepresentative['Address']['City']['city_name'] . ', ' . $MumbaiRepresentative['Address']['District']['district_name'] . ', ' . $MumbaiRepresentative['Address']['State']['state_name'] . ' - ' . $MumbaiRepresentative['Address']['pin'] . '<br />' . $MumbaiRepresentative['Address']['email'] . '<br />' . $MumbaiRepresentative['Address']['std_code'] . '-' . $MumbaiRepresentative['Address']['phone_number_1']; ?></td>
	</tr>
</table>

<p class="pagebreak"></p>

<table border="0" cellpadding="2" cellspacing="0" width="950">
	<tr>
		<td align="center"><b>MECHANICAL DETAILS <b /></td>
	</tr>
</table>

<br /><br />

<table border="0" cellpadding="5" cellspacing="5" width="950">
	<tr>
		<td width="200">Size of the page</td>
		<td width="200"><?php echo $printingCenterDetails['size_of_page']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200">Number of Pages</td>
		<td width="200"><?php echo $printingCenterDetails['number_of_pages']; ?></td>
		<td width="75">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Width of Column</td>
		<td width="200"><?php echo $printingCenterDetails['width_of_column']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200">Length of Column</td>
		<td width="200"><?php echo $printingCenterDetails['number_of_columns_per_page']; ?></td>
		<td width="75">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Number of Columns per page </td>
		<td width="200"><?php echo $printingCenterDetails['number_of_columns_per_page']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200">Type of paper used </td>
		<td width="200"><?php echo $printingCenterDetails['type_of_paper_used']; ?></td>
		<td width="75">&nbsp;</td>
	</tr>
	<tr>
		<td width="200"><?php ___('Type Of Printing Machine') ?></td>
		<td width="200"><?php echo $printingCenterDetails['type_of_printing_machine']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200"><?php ___('Number Of Printing Machines') ?></td>
		<td width="200"><?php echo $printingCenterDetails['number_of_printing_machines']; ?></td>
		<td width="75">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Printing Capacity </td>
		<td width="200"><?php echo $printingCenterDetails['printing_capacity']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200">Number of Rotary Printing Units </td>
		<td width="200"><?php echo $printingCenterDetails['printing_units']; ?></td>
		<td width="75">&nbsp;</td>
	</tr>
	<tr>
		<td width="200">Capacity per Rotary Printing Unit </td>
		<td width="200"><?php echo $printingCenterDetails['capacity_per_printing_units']; ?></td>
		<td width="75">&nbsp;</td>
		<td width="200">&nbsp;</td>
		<td width="200">&nbsp;</td>
		<td width="75">&nbsp;</td>
	</tr>
</table>

<br /><br />

<table border="0" cellpadding="2" cellspacing="0" width="950">
	<tr>
		<td height="80"><span class="bold13">Signature: </span></td>
		<td><span class="bold13">Rubber Stamp / Seal: </span></td>
	</tr>
	<tr>
		<td height="80"><span class="bold13">Date: </span></td>
		<td><span class="bold13">For & on behalf of:  </span></td>
	</tr>
	<tr>
		<td width="475"><span class="bold13">Name: </span><?php echo $PrimaryRepresentative['Prefix']['prefix_name'] . ' ' . $PrimaryRepresentative['representative_name']; ?></td>
		<td width="475"><span class="bold13">Designation: </span><?php echo $PrimaryRepresentative['designation']; ?></td>
	</tr>
	<tr>
		<td height="60" colspan="2"><b>For & on behalf of </b><?php echo $holdingCompany['holding_company_name']; ?></td>
	</tr>
	<tr>
		<td colspan="2">(Please attach your current Advertising rate Card and a Specimen Copy of the Publication)</td>
	</tr>
</table>
<p class="pagebreak"></p>
<?php } ?>
