<?php if (isset($certificateGroups) && is_array($certificateGroups) && count($certificateGroups) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($certificateGroups, 'Certificate Groups List');
    exit;
}
?><div class="certificateGroups index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('certificate groups');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => false, 'print' => false, 'add' => true, 'container_class' => 'toolbar_container_list',
            'additional_buttons' => array(
            __('Dashboard', true) => $this->Html->link('<span class="toolbar-button" title="' . __('Dashboard', true) . '">' . __('Dashboard', true) . '</span>', '/client', array('title' => __('Dashboard', true), 'escape' => false)),
            )));
	?>

	<?php
	echo $this->AlaxosForm->create('CertificateGroup', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;" class="display_none"></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Certificate Group Id', true), 'CertificateGroup.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Certificate Group Name', true), 'CertificateGroup.certificate_group_name');?></th>
                <th></th>
		<th><?php echo $this->Paginator->sort(__('Language Name', true), 'Language.language_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Frequency Type Name', true), 'FrequencyType.frequency_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Publication Name', true), 'Publication.publication_name');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td class="display_none"></td>
			<td class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('certificate_group_name');
			?>
		</td>
                <td></td>
		<td>
                    <span class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('language_id');
			?>
                    </span>
		</td>
		<td>
                    <span class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('frequency_type_id');
			?>
                    </span>
		</td>
		<td>
                    <span class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('publication_id');
			?>
                    </span>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('CertificateGroup', array('id' => 'chooseActionForm', 'url' => array('controller' => 'certificateGroups', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($certificateGroups as $certificateGroup):
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
		<td class="display_none">
		<?php
		echo $this->AlaxosForm->checkBox('CertificateGroup.' . $i . '.id', array('value' => $certificateGroup['CertificateGroup']['id']));
		?>
		</td>
		<td class="display_none">
			<?php echo $certificateGroup['CertificateGroup']['id']; ?>
		</td>
		<td>
                        <?php echo "<b>{$certificateGroup['CertificateGroup']['certificate_group_name']}</b><br/>"; ?>
                        <?php         
                                    $arrCities = Set::extract('/Membership/City/city_name', $certificateGroup);
                                    $arrDistrict = Set::extract('/Membership/District/district_name', $certificateGroup);
                                    $arrStates = Set::extract('/Membership/State/state_name', $certificateGroup);
                                    foreach($arrCities as $k => $city) {
                                        echo "$city ({$arrDistrict[$k]}, $arrStates[$k])<br/>";
                                    }
                                    ?>
		</td>
		<td>
			<?php 
                        $certificate_group_id = $this->Session->read('Auth.Membership.certificate_group_id');
                        if ($certificate_group_id == $certificateGroup['CertificateGroup']['id']) {
                            echo $this->Html->link(__('<b>Leave Group</b>', true), array('action' => 'join', 'leave' => 1), array('class' => 'to_detail', 'escape' => false, 'title' => 'Leave Group'));
                        } else {
                            echo $this->Html->link(__('Join Group', true), array('action' => 'join', $certificateGroup['CertificateGroup']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'Join Group'));
                        }
                        ?>
		</td>
		<td>
			<?php echo $certificateGroup['Language']['language_name']; //$this->Html->link($certificateGroup['Language']['language_name'], array('controller' => 'languages', 'action' => 'view', $certificateGroup['Language']['id'])); ?>
		</td>
		<td>
			<?php echo $certificateGroup['FrequencyType']['frequency_type_name']; //$this->Html->link($certificateGroup['FrequencyType']['frequency_type_name'], array('controller' => 'frequency_types', 'action' => 'view', $certificateGroup['FrequencyType']['id'])); ?>
		</td>
		<td>
			<?php echo $certificateGroup['Publication']['publication_name']; //$this->Html->link($certificateGroup['Publication']['publication_name'], array('controller' => 'publications', 'action' => 'view', $certificateGroup['Publication']['id'])); ?>
		</td>
		<td class="actions">

			<?php //echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $certificateGroup['CertificateGroup']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $certificateGroup['CertificateGroup']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php //echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $certificateGroup['CertificateGroup']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $certificateGroup['CertificateGroup']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $certificateGroup['CertificateGroup']['id'])); ?>-->

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
	echo $this->AlaxosForm->create('CertificateGroup', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
