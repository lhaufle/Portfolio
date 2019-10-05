<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
include '../Data/Data.php'; //include the database connection
include '../Data/Document.php';

$app = new \Slim\App;

/**
 * Listens for a post requests, watches for key word, date, or number, and inserts
 * json into the mysql database
 */
$app->post('/addDocument', function (Request $request, Response $response, array $args) {

    //check the value being passed
    $word = $request->getParam("word");
    $date = $request->getParam("date");
    $number = $request->getParam("number");

    try {
        $db = new Data();
        $db = $db->connect();

        //verify the intended datatype is passed via json
        if(isset($word)) {
            $sql = "INSERT INTO `document`(json) VALUES ($word)";
        }else if(isset($date)){
            $sql = "INSERT INTO `document`(json) VALUES ($date)";
        }else if(isset($number)){
            $sql = "INSERT INTO `document`(json) VALUES ($number)";
        }else{
            //respond to the request if the wrong key was passed
            return $response->withJson('{"error":"must be work, date, or number"}');
        }

        //submit query
        if(mysqli_query($db, $sql)){
            //respond to request with a success message
            return $response->withJson('{"Success":"Row Added"}', 200);
        } else{
            //responds to request notifying that no new values were added to the database
            return $response->withJson('{"Query":"Row not added"}', 400);
        }

    } catch(mysqli_sql_exception $e){
        //respond with error message if connection not successful
        return $response->withJson($e->getMessage(), 400);
    }
});

/**
 * Listens for a get request, queries the documents table, changes the
 * value into a json object, and responds to the request with that object
 */
$app->get('/getDocument',
    function (Request $request, Response $response, array $args) {
        //attempt to connect
        try {
            $db = new Data();
            $db = $db->connect();
            //query all documents
            $sql = "select * from document";
            // to hold value of returned results
            $documents = array();

            //verify results have been returned
            if ($results = $db->query($sql)) {
                //return results of the query into json
                $answer = json_encode(($results->fetch_assoc()), JSON_UNESCAPED_SLASHES);
                //respond will json value
                return $response->withJson($answer, 200);
            }
        } catch (mysqli_sql_exception $e) {
            //display error message
            return $response->withJson($e->getMessage(), 400);
        }
    });

/**
 * Uses a put request to update the value based on the key. Three arguments are passed: one for the
 * id of the row to be updated, the key, and the value to be passed into the JSON_SET function.
 * Route will respond based on success of and number of rows updated.
 */
$app->put('/updateDocument', function (Request $request, Response $response, array $args) {
    //get arguments that have been passed
    $id = $request->getParam('id');
    $value = $request->getParam('value');
    $key = $request->getParam('key');

    //attempt to connect and query
    try{
        $db = new Data();
        $db = $db->connect();
        $sql = "update document set json = JSON_SET(json, '$.$key', '$value') where id = $id";

        //verify query produced results
        if($result = mysqli_query($db, $sql)) {
            $numRows = mysqli_num_rows($result);
            if ($numRows > 0) {
                //respond if row updated
                return $response->withJson('{"Success":"row updated"}', 200);
            } else {
                //respond if row was not updated
                return $response->withJson('{"Fail":" no rows updated",}', 200);
            }
        }else{
            return $response->withJson('{"Fail":" query failed",}', 200);
        }
    }catch(mysqli_sql_exception $e){
        //respond if there was an error
        return $response->withJson($e->getMessage(), 400);
    }

});

/**
 * listens for a delete request and takes a number as an argument, which will
 * be uses as the id to delete the selected row. Route response send message on success of query, for failure.
 */
$app->delete('/deleteDocument', function (Request $request, Response $response, array $args) {
    $id = $request->getParam('id');

    //attempt to query and delete record
    try{
        $db = new Data();
        $db = $db->connect();

        $sql = "DELETE FROM `document` WHERE id = $id";

        if(mysqli_query($db, $sql)){
            //respond if deleted
            $response->withJson('{"Success":"Record Deleted"}', 200);
        }
    }catch(mysqli_sql_exception $e){
        //respond if there was an error
        return $response->withJson($e->getMessage(), 400);
    }
});

$app->get('/downloadDocument/{id}', function (Request $request, Response $response, array $args) {

    //get passed value
    $id = $args['id'];
    echo $id;
    //create a document object
    $doc = new Document($id);
    //update exported date
    $doc->updateExport();

    //data for headers
    $headers = array("Created {$doc->getUpdated()}", "Last Updated {$doc->getUpdated()}");
    //second level of headers for cvs
    $lvlHeaders = array("Key "," Value");

    //get data to go below headers
    $jsonValues = json_decode($doc->getJson(), true);
    //turn array to string to insert below the header
    $strValue = implode(" ", $jsonValues);
    echo $strValue;

    //create file handler
    $fh = fopen('export.csv', "w");

    //create first line of headers
    fputcsv($fh, $headers);
    //add second level of headers
    fputcsv($fh, $lvlHeaders);

    //add the data to the document
        fputcsv($fh, $strValue);


    fclose($fh);


});

$app->run();