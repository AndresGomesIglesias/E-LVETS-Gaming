

<?php 
$this->loadmodel('Game');
    $returns = array(
        'results' => $this->Game->find(array('conditions' => array('online' => 1)))
    );
    $result = json_encode($returns, true);
    die($result);

