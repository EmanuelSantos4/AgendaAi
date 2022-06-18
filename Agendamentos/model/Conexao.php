<?php

class Conexao
{

    /**
     * @var string $usuario
     */
    private $usuario = "root";

    /**
     * @var string $senhaBd
     */
    private $senhaBd = "";

    /**
     * @var PDO
     */
    private PDO $conexao;

    /**
     * @var string $table
     */
    private $table;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=bd_agendamentos;charset=utf8', $this->usuario, $this->senhaBd);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Problema na conexão com o banco de dados." . $e->getMessage() . "\n");
        }
    }

    /**
     * @param string $query
     * @param array $par
     * @return PDOStatement
     */
    public function excQuery($query, $par = [])
    {
        try {
            $sql = $this->conexao->prepare($query);
            $sql->execute($par);
            return $sql;
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage() . "\n");
        }
    }

    /**
     * @param array $values
     * @return integer
     */
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . ' VALUES (' . implode(',', $binds) . ')';
//        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $this->excQuery($query, array_values($values));

        return $this->conexao->lastInsertId();
    }

    /**
     * @param string $where
     * @param string $fields
     * @param string $limit
     * @param string $order
     * @return PDOStatement
     */
    public function select($where = null, $fields = "*", $limit = null, $order = null)
    {
        //se tiver algo nas variáveis, elas recebem tal valor, senão, recebem vazio
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->excQuery($query);
    }

    /**
     * @param string $where
     * @param array $values
     * @return boolean
     */
    public function update($where, $values)
    {
        try {
            $fields = array_keys($values);

            $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

            $this->excQuery($query, array_values($values));
            return true;
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    /**
     * @param string $where
     * @return boolean
     */
    public function delete($where)
    {
        try {
            $query = 'DELETE FROM ' . $this->table . ' WHERE' . $where;

            $this->excQuery($query);
            return true;
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    /**
     * @param string $username
     */
    public function getUserName($username)
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        $query = $this->conexao->prepare('SELECT tb_adm_nome as name FROM tb_adm JOIN tb_login ON tb_adm.tb_adm_id = tb_login.tb_adm_id WHERE tb_adm_nome = ?
                  UNION
                  SELECT tb_empregador_nome as name FROM tb_empregador JOIN tb_login ON tb_empregador.tb_empregador_id = tb_login.tb_empregador_id WHERE tb_empregador_nome = ?
                  UNION 
                  SELECT tb_pds_nome as name FROM tb_pds JOIN tb_login ON tb_pds.tb_pds_id = tb_login.tb_pds_id WHERE tb_pds_nome = ?');
        $query->execute([$username, $username, $username]);

        $result = $query->fetch();

        $_SESSION['user'] = $result['name'];
    }

    /**
     * @param string $email
     * @return string
     */
    public static function getUserType($email)
    {
        try {
//            $user_type = (new Conexao('tb_login'))->select('tb_login_email = ' . $email);
//            $user_type->fetch();
//            $string = (object) $user_type;
            return (new Conexao('tb_login'))->select('tb_login_email = ' . $email)->fetchObject()->userType;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param string $email
     * @return array
     */
    public function getUserCon($email)
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        $userType = self::getUserType($email);
        switch ($userType) {
            case "pds":
                $queryUC = (new Conexao('tb_pds JOIN tb_login'))->select('tb_pds.tb_pds_id = tb_login.tb_pds_id', 'tb_login_email as email, tb_pds_nome as nome, tb_pds_apelido as apelido, pds_foto as foto, tb_pds_dataNasc as bday, tb_pds_servicoPtd as serPtd');
                $result = $queryUC->fetch();
                return [
                    'email' => $email,
                    'name' => $result['name'],
                    'apelido' => $result['apelido'],
                    'foto' => $result['foto'],
                    'bday' => $result['bday'],
                    'serPtd' => $result['serPtd']
                ];
            case "emp":
                $queryUC = (new Conexao('tb_empregador JOIN tb_login'))->select('tb_empregador.tb_empregador_id = tb_login.tb_empregador_id', 'tb_login_email as email, tb_empregador_nome as nome, tb_empregador_apelido as apelido, emp_foto as foto, tb_empregador_dataNasc as bday');
                $result = $queryUC->fetch();
                return [
                    'email' => $email,
                    'name' => $result['name'],
                    'apelido' => $result['apelido'],
                    'foto' => $result['foto'],
                    'bday' => $result['bday']
                ];
        }
    }

    /**
     * @param string $email
     * @return array
     */
    public function getUserCtt($email)
    {
        $userType = self::getUserType($email);
        switch ($userType) {
            case "pds":
                $queryUC = (new Conexao('tb_pds_endereco JOIN tb_pds'))->select('tb_pds_endereco.tb_pds_tb_pds_id = tb_pds.tb_pds_id', 'tb_pds_endereco_logradouro as logradouro, tb_pds_endereco_numero as numero, tb_pds_endereco_bairro as bairro, tb_pds_endereco_cidade as cidade, tb_pds_endereco_cep as cep, tb_pds_endereco_uf as uf');
                $result = $queryUC->fetch();
                return [
                    'logradouro' => $email,
                    'numero' => $result['numero'],
                    'bairro' => $result['bairro'],
                    'cidade' => $result['cidade'],
                    'cep' => $result['cep'],
                    'uf' => $result['uf']
                ];
            case "emp":
                $queryUC = (new Conexao('tb_empregador_endereco JOIN tb_empregador'))->select('tb_empregador_endereco.tb_pds_tb_pds_id = tb_pds.tb_pds_id', 'tb_pds_endereco_logradouro as logradouro, tb_pds_endereco_numero as numero, tb_pds_endereco_bairro as bairro, tb_pds_endereco_cidade as cidade, tb_pds_endereco_cep as cep, tb_pds_endereco_uf as uf');
                $result = $queryUC->fetch();
                return [
                    'logradouro' => $email,
                    'numero' => $result['numero'],
                    'bairro' => $result['bairro'],
                    'cidade' => $result['cidade'],
                    'cep' => $result['cep'],
                    'uf' => $result['uf']
                ];
        }
    }

    /**
     * @param string $curPass
     * @param string $newPass
     * @return bool
     */
    public function uptPass($curPass, $newPass)
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        $con = new Conexao('tb_login');

        try {
            if ($con->select('tb_login_password = ' . $curPass) == $curPass) {
                $con->update('tb_login_password', (array)$newPass);
            }
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}