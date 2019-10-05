<?php
/**
 * Class Document
 * Takes only the id as an argument, which will be used in a query to initialize all
 * instance variables
 */

class Document{

    //instance variables
    private $id;
    private $json;
    private $created;
    private $updated;
    private $exported;
    private $dbc;

    function __construct($id){
        //connect to the database
        try{
            $dbc = mysqli_connect('localhost', 'lhaufle', 'batman123', 'fileserver');
            $this->dbc = $dbc;
            $this->id = $id;
            $sql = "SELECT * from document where id = $id";
            $result = mysqli_query($dbc, $sql);
            //loop through array and initialize instance variables
            while($row = mysqli_fetch_array($result)){
                $this->json = $row["json"];
                $this->created = $row['created'];
                $this->updated = $row['updated'];
                $this->exported = $row['exported'];
            }
        }catch(mysqli_sql_exception $ex){
            java_throw_exceptions("Query Failed");
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @return mixed
     */
    public function getExported()
    {
        return $this->exported;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * The updateExport function is use to submit an update query to update the exported field.
     * it also runs a new query to update the instance variable
     */
    public function updateExport(){
        try{
            //create query to update database with current date
            $sql = "UPDATE `document` SET `exported`= NOW() WHERE id = $this->id";

            //update export in mysql
            mysqli_query($this->dbc, $sql);

            //new query to update the value of exported
            $sqlUpdate = "SELECT * from document where id = $this->id";

            //run the query
            $result = mysqli_query($this->dbc, $sqlUpdate);

            //get value of the new date and set instance variable
            while($row = mysqli_fetch_array($result)){
                $this->exported = $row['exported'];
            }
        } catch(mysqli_sql_exception $ex){
            echo $ex->getMessage();
        }


    }

}