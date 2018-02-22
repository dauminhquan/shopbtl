<?php

namespace Model;


class Model {

    public $table;
    protected $conn;
    private $SELECT;
    private $WHERE;
    private $JOIN;
    private $GROUPBY;
    private $ORDERBY;
    private $ORWHERE;
    private $IN;
    private $NOTIN;
    private $LIKE;
    private $BETWIN;
    private $INSERT;
    PRIVATE $UPDATE;
    PRIVATE $DELETE;
    PRIVATE $all_column;
    public $me;
    public function __construct()
    {
        $this->SELECT =[];
        $this->WHERE =[];
        $this->JOIN =[];
        $this->GROUPBY =[];
        $this->ORDERBY =[];
        $this->ORWHERE =[];
        $this->IN =[];
        $this->INSERT = [];
        $this->all_column = [];
        $this->me = false;
        if(!isset($this->table))
        {
            $class_name = explode('\\',get_class($this));
            $this->table = strtolower(array_pop($class_name));

        }
        $this->conn = new \MySQLi("localhost", "root", "", "shopbtl") or die(mysqli_error());
        
        mysqli_set_charset($this->conn,"utf8");

        $all_cl= $this->conn->query("SHOW COLUMNS FROM $this->table");
        while($row = mysqli_fetch_array($all_cl)){
            array_push($this->all_column,$row['Field']);
        }
    }
    static public function testConnect(){
        testConnect();
    }
    private function connect()
    {
        $this->conn = new \MySQLi("localhost", "root", "", "shopbtl") or die(mysqli_error());
        mysqli_set_charset($this->conn,"utf8");
    }
     public function where(array $arr)
    {

        if(sizeof($arr) < 2)
        {
            die('Lỗi tại where');
        }
        if(sizeof($arr) == 2)
        {

            if(gettype($arr[1]) == "string")
            {
                $arr[1] = "\"$arr[1]\"";
            }
            array_push($this->WHERE,[$arr[0],'=',$arr[1]]);
        }
        if(sizeof($arr) == 3)
        {
            if(gettype($arr[2]) == "string")
            {
                $arr[2] = "\"$arr[2]\"";
            }
            array_push($this->WHERE,$arr);
        }
        return $this;
    }

    public function insert(array $arr)
    {
        $arr_key = array_keys($arr);
        $str_key = '';
        $str_value = '';
        foreach ($arr_key as $index => $key)
        {
            if($index < count($arr_key) - 1)
            {
                $str_key.=$key.',';
                if(gettype($arr[$key]) == "string")
                {
                    $str_value .= '"'.$arr[$key].'",';
                }
                else{
                    $str_value .= $arr[$key].',';
                }

            }
            else
            {
                $str_key.=$key;
                if(gettype($arr[$key]) == "string")
                {
                    $str_value .= '"'.$arr[$key].'"';
                }
                else{
                    $str_value .= $arr[$key];
                }
            }
        }


        $str_key = '('.$str_key.')';
        $str_value = '('.$str_value.')';
        $sql = "INSERT INTO $this->table$str_key VALUES $str_value";

        return $this->conn->query($sql);
    }
    public function getSql()
    {
        $sql = 'SELECT ';
        if(sizeof($this->SELECT) > 0)
        {
            foreach ($this->SELECT as $index => $value)
            {
                if($index < sizeof($this->SELECT) -1)
                {
                    $sql.="$value,";
                }
                else
                {
                    $sql.="$value ";
                }
            }

        }
        else
        {
            $sql.='* ';
        }
        $sql.="FROM $this->table ";
        if(sizeof($this->WHERE) > 0)
        {
            $sql.="WHERE ";
            foreach ($this->WHERE as $index=> $value)
            {
                if($index == 0)
                {
                    $sql.= "$value[0] $value[1] $value[2] ";
                }
                else
                {
                    $sql.= "AND $value[0] $value[1] $value[2] ";
                }

            }

        }

        return $sql;
    }
    public function get()
    {
        $this->connect();
        $result = $this->conn->query($this->getSql());
        
        $arr = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                array_push($arr, (object) $row);
            }
        } else {
            echo "0 results";
        }
        $this->conn->close();
        
        return $arr;
    }
    public function query($sql)
    {
        $this->connect();

        $result = $this->conn->query($sql);


        $arr = [];


        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                array_push($arr, (object) $row);
            }
        } else {
            return 0;
        }
        $this->conn->close();
        
        return $arr;
    }
    public function findId($id)
    {

        if(gettype ($id) == "integer")
        {
            if($id < 1)
            {
                die("id san phẩm sai");
            }
            $data = $this->query("select * from $this->table where id = $id");
            if($data != 0)
            {
                $this->me = (object)$data[0];
            }
            return $data!= 0 ? $data[0] : false;
        }
        die("id san phẩm sai");
    }
    public function update(array $arr,$id)
    {
        $this->connect();
        //lay toan bo kay
        $all_key = array_keys($arr);
        if(!$this->check_key($all_key))
        {
            die('Lỗi khác key: '.$this->check_key());
        }
        $sql = '';
        $i = 1;
        foreach ($arr as $key=>$value)
        {
            if($i< count($arr))
            {
                if(gettype($value) == "string")
                {
                    $sql.= $key.'="'.$value.'",';
                }
                else{
                    $sql.= $key.'='.$value.',';
                }

            }
            else{
                if(gettype($value) == "string")
                {
                    $sql.= $key.'="'.$value.'"';
                }
                else{
                    $sql.= $key.'='.$value;
                }

            }
            $i++;
        }

        $sc = $this->conn->query("UPDATE $this->table SET $sql WHERE id = $id");

        $this->conn->close();
        return $sc;

    }
    private function check_key($arr_key)
    {
        foreach ($arr_key as $item)
        {
            foreach ($this->all_column as $cl)
            {
                if($item != $cl)
                {
                    return $item;
                }
            }
        }
        return true;
    }
    public function delete()
    {
        $this->connect();

        $id = (int)$this->me->id;

        $rs = $this->conn->query("DELETE FROM $this->table WHERE id =$id ");

        ;
        $this->conn->close();
        return  $rs;
    }
}