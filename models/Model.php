<?php


abstract class Model extends Db
{
    private $query,
        $error = false,
        $results,
        $count = 0;

    #The name of the table in the database
    # The name of the table must always be plural
    protected $table = false;

    function __construct()
    {
        if($this->table === false){
            $this->table = strtolower(get_class($this)).'s';
        }

    }

    /**
     * @return mixed
     */
    function findAll(){
        return $this->action('SELECT *',$this->table)
            ->results();
    }
    /**
     * @return mixed
     */
    function first(){

        return current($this->results());
    }

    public function findById($id)
    {
        return ($this->action('SELECT *', $this->table, ['id', '=', $id])
            ->results()[0]);
    }
    public function find(array $condition){
        return $this->action('SELECT *', $this->table, $condition)
            ->results()[0];
    }



    /**
     * @param $action
     * @param $table
     * @param array $where
     * @return $this|bool
     */

    // [ORDER BY id DESC]
    private function action($action, $table, $where = []){

        if(gettype($where) == 'array' && count($where) === 3){

            $operators = ['=', '!=', '<', '>', '<=', '>='];

            $field    = $where[0];
            $operator = $where[1];
            $value    = $where[2];

            if(in_array($operator, $operators)){

                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? ";

                if(!$this->query($sql, [$value])->error()){

                    return $this;
                }
            }
        }else{

            $sql = "{$action} FROM {$table}";
            if(!$this->query($sql, [])->error()){

                return $this;
            }

        }
        return false;
    }



    /**
     * @param $action
     * @param $table
     * @param array $wheres
     * @return $this|bool
     */
    private function builderAction($action, $table, $wheres = []){

        if(count($wheres) === 7){
            $operators = ['=', '!=', '<', '>', '<=', '>=', 'AND', 'OR'];

            $field_first    = $wheres[0];
            $field_second    = $wheres[4];
            $operator_first = $wheres[1];
            $operator_second = $wheres[5];
            $value_first    = $wheres[2];
            $value_second    = $wheres[6];
            $logique  = strtoupper($wheres[3]);

            if(in_array($operator_first, $operators) && in_array($operator_second, $operators) && in_array($logique, $operators)){

                $sql = "{$action} FROM {$table} WHERE {$field_first} {$operator_first} ?  {$logique} {$field_second} {$operator_second} ? ORDER BY created_at DESC";

                if(!$this->query($sql, [$value_first, $value_second])->error()){

                    return $this;
                }
            }
        }
        return false;
    }

    /**
     * @param $action
     * @param $table
     * @param $wheres
     * @param $orderBy
     * @param $limit
     * @return $this
     */
    private function actionLimit($action, $table, $wheres, $orderBy, $limit){

        if(count($wheres) === 7){

            $order = (gettype($orderBy) == 'string' && strlen($orderBy) > 8) ? $orderBy : '';

            $operators = ['=', '!=', '<', '>', '<=', '>=', 'AND', 'OR'];

            $field_first    = $wheres[0];
            $field_second    = $wheres[4];
            $operator_first = $wheres[1];
            $operator_second = $wheres[5];
            $value_first    = $wheres[2];
            $value_second    = $wheres[6];
            $logique  = strtoupper($wheres[3]);

            if(in_array($operator_first, $operators) && in_array($operator_second, $operators) && in_array($logique, $operators)){

                $sql = "{$action} FROM {$table} WHERE {$field_first} {$operator_first} ?  {$logique} {$field_second} {$operator_second} ? {$order} LIMIT {$limit}";

                if(!$this->query($sql, [$value_first, $value_second])->error()){

                    return $this;
                }
            }
        }

    }

    /**
     * @param $action
     * @param $table
     * @param $where
     * @param $like
     * @return $this
     */
    private function actionLike($action, $table, $where, $like){

        $sql = "{$action} FROM {$table} WHERE {$where} LIKE '%{$like}%'";
        if(!$this->query($sql, [])->error()){

            return $this;
        }
    }

    /**
     * @param $wheres
     * @param $orderBy
     * @param $limit
     * @return mixed
     */
    function latest($wheres, $orderBy, $limit){

        return $this->actionLimit('SELECT * ', $this->table, $wheres, $orderBy, $limit.', 4')
                    ->results();


        /*$q = $this->getInstance()->prepare('SELECT * FROM '.$this->table.' WHERE '.$wheres.' '.$orderBy.' LIMIT '.$limit.', 4');

        $q->execute(array());

        return $q->fetchAll(PDO::FETCH_OBJ);*/

    }

    function search($where, $like){
        $like = trim($like);
        return $this->actionLike('SELECT *', $this->table, $where, $like)
                    ->results();
    }


    /**
     * @param $wheres
     * @return bool|Db
     */
    function builderGet($wheres){
        return $this->builderAction('SELECT *', $this->table, $wheres)->results();
    }

    /**
     * @param array $fields
     * @return bool
     */
    function insert($fields = []){

        $keys   = array_keys($fields);
        $values = '';
        $x      = 1;

        foreach ($fields as $field){

            $values .=  '?';

            if($x < count($fields)){

                $values .= ', ';
            }
            $x++;
        }

        $sql  = "INSERT INTO {$this->table}(`".implode('`,`', $keys)."`) VALUES({$values})";
        //return $fields; die(1);
        if(!$this->query($sql, $fields)->error()){

            return true;
        }

        return false;
    }

    /**
     * @param $where
     * @return bool|Db
     */
    function get($where){

        return $this->action('SELECT *', $this->table, $where)
            ;
    }

    /**
     * @return mixed
     */
    function results(){

        return $this->results;
    }

    /**
     * @return int
     */
    function count(){

        return $this->count;
    }

    /**
     * @return bool
     */
    function error()
    {
        return $this->error;
    }

    /**
     * @param $name
     * @param $args
     */
    public function __call($name, $args){

        echo $name," doesn't exist in this class";
    }



    /**
     * @param $sql
     * @param array $params
     * @return $this
     */
    function query($sql, $params = [])
    {
        $this->error = false;
        if($this->query = $this->getInstance()->prepare($sql))
        {
            $x = 1;
            if(count($params))
            {
                foreach ($params as $param)
                {
                    $this->query->bindValue($x, $param);
                    $x++;
                }
            }
        }
        if($this->query->execute()){
            $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
            $this->count   = $this->query->rowCount();
        }else
        {
            $this->error = true;
        }
        return $this;
    }

}