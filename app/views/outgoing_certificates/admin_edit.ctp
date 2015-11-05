<div class="outgoingCertificates form">

    <?php echo $this->AlaxosForm->create('OutgoingCertificate', array('enctype' => 'multipart/form-data')); ?>
    <?php echo $this->AlaxosForm->input('id'); ?>
    <div class="h2bg"><span class="h2-left"></span>
        <span class="h2-center">
            <h2><?php ___('admin edit outgoing certificate'); ?></h2>
        </span>
        <span class="h2-right"></span></div>

    <?php
    echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $outgoingCertificate['OutgoingCertificate']['id']));
    ?>

    <table border="1" cellpadding="5" cellspacing="0" class="edit">
        <tr>
		<td>
			<?php ___('Publication Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('publication_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
            <td>
                <?php ___('Regular Period Name') ?>
            </td>
            <td>*:</td>
            <td>
                <?php echo $this->AlaxosForm->input('regular_period_id', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Certificate Status Name') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('certificate_status_id', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Address') ?>
            </td>
            <td>*:</td>
            <td>
                <?php echo $this->AlaxosForm->input('address', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Published Printed') ?>
            </td>
            <td>*:</td>
            <td>
                <?php echo $this->AlaxosForm->input('published_printed', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Single Copy') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('single_copy', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Combo Copy') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('combo_copy', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Auditors') ?>
            </td>
            <td>*:</td>
            <td>
                <?php echo $this->AlaxosForm->input('auditors', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Total Qualifying Sales') ?>
            </td>
            <td>*:</td>
            <td>
                <?php echo $this->AlaxosForm->input('total_qualifying_sales', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Total Number Of Publishing Days') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('total_number_of_publishing_days', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Average Total Qualifying Sales') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('average_total_qualifying_sales', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <?php ___('Previous 1 Regular Period Name') ?>
                        </td>
                        <td>*:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('previous_1_regular_period_id', array('label' => false)); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php ___('Previous 1 Circulations') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('previous_1_circulations', array('label' => false)); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php ___('Previous 1 Issues') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('previous_1_issues', array('label' => false)); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php ___('Previous 1 Note') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('previous_1_note', array('label' => false)); ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <?php ___('Previous 2 Regular Period Name') ?>
                        </td>
                        <td>*:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('previous_2_regular_period_id', array('label' => false)); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php ___('Previous 2 Circulations') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('previous_2_circulations', array('label' => false)); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php ___('Previous 2 Issues') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('previous_2_issues', array('label' => false)); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php ___('Previous 2 Note') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('previous_2_note', array('label' => false)); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Ss Sa Single Copy Sales') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('ss_sa_single_copy_sales', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Ss Sa Combo Sales Copies') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('ss_sa_combo_sales_copies', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Ss Sa Single Copy Subscription') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('ss_sa_single_copy_subscription', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Ss Sa Joint Subscription Copies') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('ss_sa_joint_subscription_copies', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Ss Sa Institutional Subscription Copies') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('ss_sa_institutional_subscription_copies', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Ss Sa Institutional Sale Copies') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('ss_sa_institutional_sale_copies', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Total Ss Sa Average Monthly Qualifying Circulation 1') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('total_ss_sa_average_monthly_qualifying_circulation_1', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Date Issue') ?>
            </td>
            <td>*:</td>
            <td>
                <?php echo $this->AlaxosForm->input('date_issue', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Circulation Notes') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('circulation_notes', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Instn Airlines') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('instn_airlines', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Instn Body Corporates') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('instn_body_corporates', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Instn Edu Inst') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('instn_edu_inst', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Instn Hotels') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('instn_hotels', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Instn Libraries') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('instn_libraries', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Instn Others') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('instn_others', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Total Corporates Average Monthly Qualifying Circulation') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('total_corporates_average_monthly_qualifying_circulation', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table>

                    <tr>
                        <td></td>
                        <td></td>
                        <td class="ic-heading">
                            <?php ___('Single copy Sales') ?>
                        </td>       
                        <td class="ic-heading">
                            <?php ___('Combo Copy Sales') ?>
                        </td>       		
                        <td class="ic-heading">
                            <?php ___('INSTN Sales') ?><br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="ic-heading-left">
                            <?php ___('Details of NRR') ?>
                        </td>
                    </tr>
                    <tr class="single_nnr">
                        <td>
                            <?php ___('Single Nnr 10') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('single_nnr_10', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('combo_nnr_10', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr class="single_nnr">
                        <td>
                            <?php ___('Single Nnr 20') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('single_nnr_20', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('combo_nnr_20', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr class="single_nnr">
                        <td>
                            <?php ___('Single Nnr 100') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('single_nnr_100', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('combo_nnr_100', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr class="single_nnr">
                        <td>
                            <?php ___('Single Nnr Below Nnr Within Qualifying') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('single_nnr_below_nnr_within_qualifying', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('combo_nnr_below_nnr_within_qualifying', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="ic-heading-left">
                            <?php ___('Break up of copies sold with / without incentives') ?>
                        </td>
                    </tr>
                    <tr class="nss_incentive">
                        <td>
                            <?php ___('Nss Incentive Single Nil') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_single_nil', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_combo_nil', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_instn_nil', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                    </tr>

                    <tr class="nss_incentive">
                        <td>
                            <?php ___('Nss Incentive Single 50') ?>
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_single_50', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_combo_50', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_instn_50', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                    </tr>
                    <tr class="nss_incentive">
                        <td>
                            <?php ___('Nss Incentive Single 100') ?>
                        </td>
                        <td>:</td>

                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_single_100', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_combo_100', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                        <td>
                            <?php echo $this->AlaxosForm->input('nss_incentive_instn_100', array('label' => false, 'tabindex' => 1)); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table>

                    <tr>
                        <td colspan="7" class="ic-heading-left">
                            <?php ___('Non qualifying sales other than NRR') ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?php ___('Single copy Sales') ?></td> 
                        <td><?php ___('Combo Copy Sales') ?></td>
                        <td><?php ___('Subscription Sales') ?></td>
                        <td><?php ___('Institutional Sales') ?></td>
                        <td><?php ___('Free Copies') ?></td>
                    </tr>    


                    <tr class="row50">
                        <td>
                            <?php ___('NQC Single Non Qualifying Sales Other Than Nnr') ?>
                        </td>
                        <td>:</td>

                        <td>
                            <?php echo $this->AlaxosForm->input('single_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('combo_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('subscription_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('institutional_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
                        </td>


                        <td>
                            <?php //echo $this->AlaxosForm->input('free_copies_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
                        </td>


                    </tr>
                    <tr class="row15">
                        <td>
                            <?php ___('NQC Single Single Copy Sales') ?>
                        </td>
                        <td>:</td>

                        <td>
                            <?php echo $this->AlaxosForm->input('single_single_copy_sales', array('label' => false)); ?>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                    </tr>
                    <tr class="row20">
                        <td>
                            <?php ___('NQC Single Combo Sales Copies') ?>
                        </td>
                        <td>:</td>

                        <td>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('combo_combo_sales_copies', array('label' => false)); ?>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                    </tr>

                    <tr class="row25">
                        <td>
                            <?php ___('NQC Single Single Copy Subscription') ?>
                        </td>
                        <td>:</td>

                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('subscription_single_copy_subscription', array('label' => false)); ?>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                    </tr>

                    <tr class="row30">
                        <td>
                            <?php ___('NQC Single Joint Subscription Copies') ?>
                        </td>
                        <td>:</td>

                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('subscription_joint_subscription_copies', array('label' => false)); ?>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                    </tr>

                    <tr class="row35">
                        <td>
                            <?php ___('NQC Single Institutional Subscription Copies') ?>
                        </td>
                        <td>:</td>

                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('institutional_institutional_subscription_copies', array('label' => false)); ?>
                        </td>


                        <td>
                        </td>


                    </tr>

                    <tr class="row40">
                        <td>
                            <?php ___('NQC Single Institutional Sale Copies') ?>
                        </td>
                        <td>:</td>

                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('institutional_institutional_sale_copies', array('label' => false)); ?>
                        </td>


                        <td>
                        </td>


                    </tr>

                    <tr class="row45">
                        <td>
                            <?php ___('NQC Single Free Copies') ?>
                        </td>
                        <td>:</td>

                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                        </td>


                        <td>
                            <?php echo $this->AlaxosForm->input('free_copies_free_copies', array('label' => false)); ?>
                        </td>


                    </tr>

                </table>
            </td>
        </tr>	
        <tr>
            <td>
                <?php ___('Comments Title') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('comments_title', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Additional Notes1 Title') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('additional_notes1_title', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Additional Notes2 Title') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('additional_notes2_title', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php ___('Additional Notes3 Title') ?>
            </td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('additional_notes3_title', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
        </tr>
    </table>

</div>
