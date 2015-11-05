<?php

if ($this->Session->check('Auth.Role') && $this->here != '/') {
    echo $this->element($this->Session->read('Auth.Role.name') . $element);
    ?>
    <?php

} else {
    ?>
<script type="text/javascript">
    window.location = '/users/login/'
</script>
    <?php
}
?> 