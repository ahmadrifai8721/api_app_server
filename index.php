<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


include_once "./Connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // handle GET request
    $Connect = new Connection();
    return $Connect->getData();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_REQUEST['_METHOD'] === 'PUT') {
        // handle PUT request
        $Connect = new Connection();
        // $body = file_get_contents('php://input');
        // parse_str($body, $data);
        // $_REQUEST = array_merge($_REQUEST, $data);
        // print_r($_REQUEST);
        // die;

        return $Connect->updateData(
            $_REQUEST['id'],
            $_REQUEST['npm'],
            $_REQUEST['nama'],
            $_REQUEST['alamat'],
        );
    } elseif ($_REQUEST['_METHOD'] === 'DELETE') {
        // handle DELETE request
    } else {
        // handle POST request
        $Connect = new Connection();
        return $Connect->insertDataSiswa(
            $_REQUEST['npm'],
            $_REQUEST['nama'],
            $_REQUEST['alamat'],
        );
    }
}
