<?php
function getStatusColor($status) {
    switch ($status) {
        case 'Beérkezett' :
            return 'blue' ;
        case 'Hibafeltárás' :
            return 'red' ;
        case 'Alkatrész beszerzés alatt' :
            return 'orange' ;
        case 'Javítás' :
            return 'purple' ;
        case 'Kész' :
            return 'green' ;
        default:
            return 'white' ;    
    }
}
?>