<?php

    require_once dirname(__DIR__, 3) . "/config/initialize.php";

    if (!Guard::authenticated()) die("No access permitted");

    $id = isset($_POST["id"]) && !empty($_POST["id"]) ? $_POST["id"] : null;

    if (is_null($id)) die("empty");

    $timeRegistration = TimeRegistration::find($id);

    if (!isset($timeRegistration)) die("not found");

    try {
        $timeRegistration->isDeleted();
        echo "success";
    } catch (Exception $e) {
        echo "ErrorMessage: " .$e->getMessage();
    }