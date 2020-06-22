<?php // IDEA
    class Db
    {
        // bien ket noi csdl
        protected static $connection;
        // ham khoi tao ket noi
        public function connect()
        {
            // ket noi den csdl trong truong hop ket noi chua duc khoi tao
            if(!isset(self::$connection))
            {
                // lay thong tin ket noi duoc toi csdl
                $config= parse_ini_file("config.ini");
                self:: $connection = new mysqli("localhost", $config["username"],
                $config["password"],$config["databasename"]);
            }
            // xu ly ghi file khong ket noi duoc toi csdl
            if(self:: $connection==false)
            {
                // xu ly ghi file tai day
                return false;
            }
            return self :: $connection;
        }
        // ham thuc hien xu ky cau lenh truy van
        public function query_execute($queryString)
        {
            // khoi tao ket noi
            $connection =$this->connect();
                // cau hinh tieng viet
            $connection ->query("SET NAMES utf8");

            // thuc hien execute truy van
            $result= $connection -> query($queryString);
            //$connection->close();
            return $result;
        }
        // ham tra ve mot mang danh sach ket qua
        public function select_to_array($queryString){
            $rows=array();
            $result=$this ->query_execute($queryString);
            if($result==false) return false;
            {
                while ($item = $result->fetch_assoc()) {
                    $rows[]= $item;
                }
                return $rows;
            }
        }
    }
?>