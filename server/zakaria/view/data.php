<?php
    function getDBData(){
        //log the call
        $fetchedData = myDbCode.fetchData();
        return $fetchedData;
    }
    echo getDBData();
?>