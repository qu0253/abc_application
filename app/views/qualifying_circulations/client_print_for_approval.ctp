<?php
echo $this->element('qc_form/white_form');
?>
<div class="pagebreak"></div>
<table border="0" cellpadding="0" cellspacing="0" width="950">
	<tr>
		<td>
			<table border="0" cellpadding="2" cellspacing="0" width="950">
				<tr>
					<td width="650"><span class="normal11">INCOMING CERTIFICATE FOR RETURN TO THE BUREAU</span><br />
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
		<td width="475" valign="top"><span class="bold13">For period: </span><?php echo $qualifyingCirculation['RegularPeriod']['regular_period_name']; ?></td>
		<td width="475" valign="top"><span class="bold13"><?php echo __('Rni Number', true) . ':'?> </span><?php echo $printingCenter['Membership']['RniDetail'][0]['rni_number']; ?></td>
	</tr>
	<tr>
		<td width="475" valign="top"><span class="bold13">Publication: </span><?php echo $printingCenter['Membership']['Publication']['publication_name']; ?></td>
	</tr>
	<tr>
		<td width="475" valign="top"><span class="bold13">Proprietor(s): </span><?php echo $holdingCompany['HoldingCompany']['holding_company_name']; ?></td>
	</tr>
	<tr>
		<td width="475" valign="top"><span class="bold13">Address: </span><?php echo $holdingCompany['Address']['address_line_1'] . ' ' . $holdingCompany['Address']['address_line_2'] . ', ' . $holdingCompany['City']['city_name'] . ' - ' . $holdingCompany['Address']['pin'] ; ?></td>
	</tr>
	<tr>
		<td width="475" valign="top"><span class="bold13">Language: </span><?php echo $printingCenter['Membership']['Language']['language_name']; ?></td>
		<td width="475" valign="top"><span class="bold13">Frequency of issue: </span><?php echo $printingCenter['Membership']['FrequencyType']['frequency_type_name']; ?></td>
	</tr>

	<tr>
		<td width="475" valign="top"><span class="bold13">Published from: </span><?php echo $printingCenter['Membership']['Edition']['city_name']; ?></td>
		<td width="475" valign="top"><span class="bold13">Printed at: </span><?php echo $printingCenter['PrintedAt']['city_name']; ?></td>
	</tr>

	<tr>
		<td width="475" valign="top"><span class="bold13">Name of Approved Auditor(s): </span><?php echo $printingCenterAuditorBranch['AuditorBranch']['AuditorFirm']['auditor_firm_name'] . ', Branch: ' . $printingCenterAuditorBranch['AuditorBranch']['auditor_branch_name']; ?></td>
		<td width="475" valign="top"><span class="bold13"></span></td>
	</tr>

	<tr>
		<td width="475" valign="top"><span class="bold13">Address: </span><?php echo $printingCenterAuditorBranch['AuditorBranch']['Address']['address_line_1'] . ' ' . $printingCenterAuditorBranch['AuditorBranch']['Address']['address_line_2'] . ', ' . $printingCenterAuditorBranch['AuditorBranch']['Address']['City']['city_name'] . ', ' . $printingCenterAuditorBranch['AuditorBranch']['Address']['District']['district_name'] . ', ' . $printingCenterAuditorBranch['AuditorBranch']['Address']['State']['state_name'] . ' - ' . $printingCenterAuditorBranch['AuditorBranch']['Address']['pin'] ; ?></td>
		<td width="475" valign="top"><span class="bold13"></span></td>
	</tr>
</table>

<br />
<?php //echo $this->element('qc_form/white_form', array('qualifyingQirculations' => $qualifyingCirculation)); ?>
<link rel="stylesheet" type="text/css" href="/css/admin/demo.css" />
<?php echo $this->element('qc_form/qualifying_circulations', array('qualifyingQirculations' => $qualifyingCirculation)); ?>
<?php 
    if ($qualifyingCirculation['CoverPrice']) {
        echo $this->element('qc_form/cover_prices', array('coverPrices' => $qualifyingCirculation));
    }
?>
<?php echo $this->element('qc_form/non_qualifying_circulations', array('nonQualifyingCirculation' => $qualifyingCirculation)); ?>
<?php echo $this->element('qc_form/nrr_calculations', array('qualifyingQirculations' => $qualifyingCirculation)); ?>
<div class="pagebreak"></div>
<?php echo $this->element('qc_form/waste_rates', array('qualifyingQirculations' => $qualifyingCirculation)); ?>





<table border="0" cellpadding="2" cellspacing="0" width="950">

	<tr>
		<td height="60"><span class="bold16">PUBLISHERS CERTIFICATE</span></td>
	</tr>

	<tr>
		<td>The above qualifying and non-qualifying sales shown in the audited Incoming Certificate have been compiled taking into account all ABC audit guidelines and notifications issued by the Bureau from time to time.</td>
	</tr>

	<tr>
		<td>We also confirm that all readers and trade schemes in operation during the audit period for which copies have been included for certification have been fully disclosed to the auditors and copies of which are attached to the Incoming Certificate.</td>
	</tr>

	<tr>
		<td>There were no other reader and trade schemes in operation during the audit period.</td>
	</tr>

	<tr>
		<td height="80">Signature and stamp of the Publisher/ Authorised Signatory</td>
	</tr>
</table>








<table border="0" cellpadding="2" cellspacing="0" width="950">

	<tr>
		<td height="60"><span class="bold16">AUDITORS CERTIFICATE</span></td>
	</tr>

	<tr>
		<td>We have examined the books and records in respect of <?php echo $printingCenter['Membership']['Publication']['publication_name']; ?> edition - printed at - <?php echo $printingCenter['PrintedAt']['city_name']; ?> and have carried out the ABC audit for the audit period <?php echo $qualifyingCirculation['RegularPeriod']['regular_period_name']; ?> as per provisions contained in the Guide to ABC audit and notifications issued from time to time.</td>
	</tr>

	<tr>
		<td>The comments / suggestions / observations if any, regarding books and records and press and market visit has been enumerated in the respective check lists.</td>
	</tr>

	<tr>
		<td>Additional observations if any have been mentioned in a separate report (attached).</td>
	</tr>
	
	<tr>
		<td height="80">Stamp and signature of the Auditor</td>
	</tr>
</table>


<?php echo $this->element('qc_form/statement_a_newsprints', array('qualifyingQirculations' => $qualifyingCirculation)); ?>
<?php echo $this->element('qc_form/statement_b_newsprints', array('qualifyingQirculations' => $qualifyingCirculation)); ?>

<?php echo $this->element('qc_form/distribution_centers', array('qualifyingQirculations' => $qualifyingCirculation)); ?>
<?php echo $this->element('qc_form/printing_presses', array('qualifyingQirculations' => $qualifyingCirculation)); ?>
<?php echo $this->element('qc_form/duplicate_copies', array('qualifyingQirculations' => $qualifyingCirculation)); ?>
</table>