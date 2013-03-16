<?php
if(isset($_POST['data'])) {
    $data = strip_tags($_POST['data']);
    $dm = new Distmem();
    $dm->connect("localhost", 4327);
    $dm->use("show");
    $idx = $dm->get("index");
    if(is_null($idx)) {
        $idx = array();
    }
    $t = time();
    array_unshift($idx, $t);
    $dm->set("index", $idx);
    $dm->set($t, $data);
    echo json_encode(array("code"=>0, "data"=>$data));
}
?>
