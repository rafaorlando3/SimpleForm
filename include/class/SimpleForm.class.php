<?php

/**
 * Classe SimpleForm - CRUD de tarefas.
 *@autor - Rafael Orlando Mendes
 *@email - rafaorlando3@gmail.com 
 */

include_once 'connection.php';

class SimpleForm {

    
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $mensagem;
    private $anexo;
    private $ip;
    private $data;
    private $tabela = "simpleform";

    function __construct() {
        global $link;
        $this->connection = $link;

    }

    public function __get($key) 
    {
        return $this->$key;
    }

    public function __set($key, $value) 
    {
        $this->$key = $value;
    }

    /**
     * Insere um novo cadastro.
     */
    public function inserir() 
    {

        $sql = "INSERT INTO $this->tabela (nome,email,telefone,mensagem,anexo,ip,data)".
               "VALUES ('$this->nome', '$this->email', '$this->telefone', '$this->mensagem',
               '$this->anexo','$this->ip','$this->data')";
        $retorno = mysqli_query($this->connection, $sql);
        return $retorno;
    }
    
    /**
     * Lista os cadastros realizados do sistema.
     *@param $complemento - O parametro espera uma String com SQL. É opcional podendo ser utilizado para filtrar a listagem.
     */
    public function listar($complemento = "") 
    {
        $sql = "SELECT * FROM $this->tabela ".$complemento;

        $lista = mysqli_query($this->connection, $sql);
        $retorno = NULL;

        while ($reg = mysqli_fetch_array($lista)) {

            $obj = new SimpleForm();
            $obj->id = $reg["id"];
            $obj->nome = $reg["nome"];
            $obj->email = $reg["email"];
            $obj->telefone = $reg["telefone"];
            $obj->mensagem = $reg["mensagem"];
            $obj->anexo = $reg["anexo"];
            $obj->ip = $reg["ip"];
            $obj->data = $reg["data"];
            $retorno[] = $obj;
        }
        
        return $retorno;
    }

    public function getIP() 
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }
    
}
