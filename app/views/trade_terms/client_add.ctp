<div class="tradeTerms form">

	<?php echo $this->AlaxosForm->create('TradeTerm', array('enctype' => 'multipart/form-data', 'action' => 'client_add', 'id' => 'TradeTermClientAddForm'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add trade term'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'hidePaginator' => true,
            'additional_buttons' => array(
                __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
            )));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
        <tr>
                <td colspan="3"><?php echo $this->Support->displayTTMessage($qualifyingCirculation); ;?></td>
	</tr>	
	<tr>
		<td>
			<?php ___('Subscription Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->hidden('subscription_type_id', array('label' => false)); echo $subscriptionTypes[$this->data['TradeTerm']['subscription_type_id']]; ?>
		</td>
	</tr>
        <tr class="display_none">
		<td>
			<?php ___('Qualifying Circulation Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Sale Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->hidden('sale_type_id', array('label' => false)); echo $saleTypes[$this->data['TradeTerm']['sale_type_id']]; ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Copies Sold') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('copies_sold', array('label' => false)); ?>
                        <?php
                            $publication_type_id = $this->Session->read('Auth.Membership.publication_type_id');
                            if ($this->Support->isNewspaper($publication_type_id)) {
                                echo $this->AlaxosForm->hidden('copies_sold_max', array('label' => false, 'value' => round($qualifyingCirculation['QualifyingCirculation']['total_ss_sa_average_monthly_qualifying_circulation_1'] * 10 / 100)));
                            } else {
                                echo $this->AlaxosForm->hidden('copies_sold_max', array('label' => false, 'value' => round($qualifyingCirculation['QualifyingCirculation']['total_ss_sa_average_monthly_qualifying_circulation_1'] * 5 / 100)));
                            }
                        ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Sold At Trade Term') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('sold_at_trade_term', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>