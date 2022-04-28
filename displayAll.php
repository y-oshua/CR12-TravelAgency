<?php
require_once 'actions/db_connect.php';


// Function for delivering a JSON response
function response($status, $status_message, $data)
{

    // $response array
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;

    //Generating JSON from the $response array
    $json_response = json_encode($response);

    // Outputting JSON to the client
    echo $json_response;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = 'SELECT * from places';
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connect);
    if (count($row) == 0) {
        response(200, 'Data not found', $row);
    } else {
        response(200, 'Data found', $row);
    }
} else {
    response(400, 'Invalid request', null);
}
?>
