CREATE DATABASE rest_api_demo;

USE rest_api_demo;


CREATE TABLE users (
  user_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  user_email varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  user_status int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<?php
class Database
{
    protected $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
    	
            if ( mysqli_connect_errno()) {
                throw new Exception("No se pudo conectar a la base de datos");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }			
    }

    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    private function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );

            if($stmt === false) {
                throw New Exception("No se puede hacer la declaracion: " . $query);
            }

            if( $params ) {
                $stmt->bind_param($params[0], $params[1]);
            }

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }
}