<?php

class TicketmasterComponent extends object {

    var $sitename = 'TOKHEIM';
    var $linkdomain = '';
    //how many hours to honor token
    var $hours = 24;
    /*
     *  Startup - Link the component to the controller.
     */

    function startup(&$controller) {
        $this->linkdomain = $_SERVER['HTTP_HOST'];
        $this->controller = & $controller;
    }

    function getExpirationDate() {
        $date = strftime('%c');
        $date = strtotime($date);
        $date+=($this->hours * 60 * 60);
        $expired = date('Y-m-d H:i:s', $date);
        return $expired;
    }

    function createMessage($token) {
        
        $ms = '<body>Hello,
<br/><br/>We have received a Reset password request for your email id. Click on the link below to set a new password for your account.
<br/><br/>
<a href="http://' . $this->linkdomain . '/users/useticket/' . $token . '">Reset Password</a>
<br/>(If clicking the above link does not work, please copy the below URL and paste it in a new browser)
<br/><br/>
http://' . $this->linkdomain . '/users/useticket/' . $token . '
<br/>';
        $ms.='</body></html>';

        $ms = wordwrap($ms, 70);

        return $ms;
    }

    function purgeTickets() {
        $this->controller->Ticket->deleteAll('Ticket.expires <= now() LIMIT 1');
    }

    /*
     * actually for logical reason well be indiscrimnate and clean ALL tockets for this email
     */

    function voidTicket($hash) {
        $this->controller->Ticket->deleteAll(array('hash' => $hash));
    }

    function checkTicket($hash) {
        $this->purgeTickets();
        $ret = false;
        $tick = $this->controller->Ticket->find('first', array('conditions' => array('hash' => $hash)));
        if (empty($tick)) {
            //no more ticket			
        } else {
            $ret = $tick;
        }
        return $ret;
    }

}

?>