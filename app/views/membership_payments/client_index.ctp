<?php if (isset($membershipPayments) && is_array($membershipPayments) && count($membershipPayments) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($membershipPayments, 'Membership Payments List');
    exit;
}
?><div class="membershipPayments index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('membership payments');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('common_toolbar');
	?>

	<?php
	echo $this->AlaxosForm->create('MembershipPayment', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Membership Payment Id', true), 'MembershipPayment.id');?></th>
<!--		<th><?php echo $this->Paginator->sort(__('Membership Name', true), 'Membership.name');?></th>-->
		<th><?php echo $this->Paginator->sort(__('Date Of Chque Dd No', true), 'MembershipPayment.date_of_chque_dd_no');?></th>
		<th><?php echo $this->Paginator->sort(__('Chque Dd No', true), 'MembershipPayment.chque_dd_no');?></th>
		<th><?php echo $this->Paginator->sort(__('Bank Name', true), 'MembershipPayment.bank_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Branch Name', true), 'MembershipPayment.branch_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Comments If Any', true), 'MembershipPayment.comments_if_any');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
<!--		<td>
			<?php
				echo $this->AlaxosForm->filter_field('membership_id');
			?>
		</td>-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_of_chque_dd_no');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('chque_dd_no');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('bank_name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('branch_name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('comments_if_any');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('MembershipPayment', array('id' => 'chooseActionForm', 'url' => array('controller' => 'membershipPayments', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($membershipPayments as $membershipPayment):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
		<?php
//		echo $this->AlaxosForm->checkBox('MembershipPayment.' . $i . '.id', array('value' => $membershipPayment['MembershipPayment']['id']));
		?>
		</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['id']; ?>
		</td>
<!--		<td>
			<?php echo $membershipPayment['Membership']['name']; //$this->Html->link($membershipPayment['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $membershipPayment['Membership']['id'])); ?>
		</td>-->
		<td>
			<?php echo DateTool :: sql_to_date($membershipPayment['MembershipPayment']['date_of_chque_dd_no']); ?>
		</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['chque_dd_no']; ?>
		</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['bank_name']; ?>
		</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['branch_name']; ?>
		</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['comments_if_any']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $membershipPayment['MembershipPayment']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
                        <?php
                        $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
                        if ($this->Support->isEditable($mem_status_id)) {
                            ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $membershipPayment['MembershipPayment']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $membershipPayment['MembershipPayment']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $membershipPayment['MembershipPayment']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $membershipPayment['MembershipPayment']['id'])); ?>-->
                            <?php
                        }
                        ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
         	
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 |
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?>	 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<?php
if($i > 0 && 1 && 0)
{
	echo '<div class="choose_action">';
	echo ___d('alaxos', 'action to perform on the selected items', true);
	echo '&nbsp;';
	echo $this->AlaxosForm->input_actions_list();
	echo '&nbsp;';
	echo $this->AlaxosForm->end(array('label' =>___d('alaxos', 'go', true), 'div' => false));
	echo '</div>';
}
?>
</div>
	<div class="select_rec_per_page">
            <?php

	$passedArgs = $this->passedArgs;
	unset($passedArgs['limit']);
	echo $this->AlaxosForm->create('MembershipPayment', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
	echo 'Select Records Per page: ';
	$options = Configure::read('select_rec_per_page');
	$paginingParams = ($paginator->params) ? $paginator->params : array();
	$pagining = !empty($paginingParams) ? array_pop($paginingParams['paging']) : array();
	$value = (empty($pagining) && empty($pagining['options']) && empty($pagining['options']['limit'])) ? $pagining['defaults']['limit'] : $pagining['options']['limit'];
	echo $this->AlaxosForm->select('limit', $options, $value, array(
            'value'=>$value, 
            'default'=>20, 
            'empty' => FALSE, 
            'onChange'=>'update_limit(this); return false;', 
            'name'=>'limit'
            )
        );
	echo $this->AlaxosForm->end();
	?>
        </div>
