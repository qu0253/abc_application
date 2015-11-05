<?php

class DynamicPagesController extends AppController {
    
    
    var $name = 'DynamicPages';
    var $uses = null;
    //var $helpers = array('Cksource');
    public function client_showpage($dp = null) {
        if(!empty($this->params['named']['pagename'])) {
            $this->params['pagename'] = $this->params['named']['pagename'];
        }        
        $this->showpage($dp);   
        $this->render('showpage');    
//        $this->$dp();
    }
    public function showpage($dp = null) {        
        $title = 'index';
        $extension = 'html';
        if(!empty($dp) && empty($this->params['pagename'])) {
            $this->params['pagename'] = $dp;
        }
        $arr = $this->getNamedParamsAsArr();
        $mem_id = $this->Session->read('Auth.Membership.id');
        if(!empty($mem_id)) {
            App::import('Model', 'Membership');
            $Membership = new Membership();   
            $this->set('membership', $Membership->read(null, $mem_id, 1));
        }
        // when Post action is done it redirects with no Printing Center Id
        $fromSessionPrintingCenterId = $this->Session->read('PrintingCenter.id');
        if (!empty($arr['printing_center_id'])) {
            $this->Session->write('PrintingCenter.id', $arr['printing_center_id']);
        } else if (!empty($fromSessionPrintingCenterId)) {
            if (!is_array($arr)) {
                $arr = array();
            }
            $arr['printing_center_id'] = $fromSessionPrintingCenterId;
        }
        App::import('Model', 'PrintingCenterAuditorBranch');
        $objPrintingCenterAuditorBranch = new PrintingCenterAuditorBranch();
        $options = array(
                        'conditions' => array(
                            'PrintingCenterAuditorBranch.printing_center_id' => $arr['printing_center_id'],
                            'PrintingCenterAuditorBranch.regular_period_id' => $this->_setRegularPeriods(),
                        ),
                        'recursive' => 2,
                        'contain' => array('AuditorBranch', 'AuditorBranch.AuditorFirm'),
                        );
        $printingCenterAuditorBranches = $objPrintingCenterAuditorBranch->find('all', $options);
        $this->set('city_name', array_pop(Set::extract("/PrintingCenter[id={$arr['printing_center_id']}]/PrintedAt/city_name", $this->Session->read('Auth'))));
        $this->set('printing_Center_auditor_branches', $printingCenterAuditorBranches);
        if (isset($this->params['pagename']) && !empty($this->params['pagename'])) {
            $arr_file_details = explode('.', $this->params['pagename']);
            $title = $arr_file_details[0];
            $extension = array_pop($arr_file_details);
        }        
        $allowed_extensions = array('zip', 'pdf');
        if (in_array($extension, $allowed_extensions)) {            
            $download = true;
            if($extension == 'pdf') {
                $download = false;
            }
            $this->download($title, $extension, $download);
        } else {
            $this->set('element', $title);
        }
        $tempTitle = str_replace('auth-', 'auth_', $title);
        $this->$tempTitle();
//        $fetched_values = $this->DynamicPage->getPageDetails($title);
//
//        foreach ($fetched_values as $k => $v) {
//            $this->set($k, $v);
//        }
//        $this->layout = $fetched_values['layout'];
//        $this->set('data', $fetched_values['body']);
//        $this->set('element', $fetched_values['element']);        
        
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
        }
    }
    function yellow_form() {

    }
    function __call($name, $arguments) {
    }
    function display_session_message() {
        $this->layout = 'ajax';
    }
    
    function index() {
    }
    function auth_admin() {
        $this->layout = 'admin';
    }

    public function ajaxGetContent($pageVal = "")
    {
        if ($pageVal != "") {
            $this->layout = null;
            $this->autoRender = false;
            
            $view = new View($this, false);
            $params = array();
            $content = $view->element($pageVal, $params);
            
            echo $content;
        }
    }

}

?>
