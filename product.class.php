<?php // IDEA
require_once("db.class.php");

class Product
{
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;


    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture)
    {
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }
    public function save()
    {
        // xu ly upload hinh anh
        $file_temp = $this->picture['tmp_name'];
        $user_file = $this->picture['name']; // ten va hinh anh mo rong
        $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        $filepath = "uploads/".$timestamp.$user_file;

        if (move_uploaded_file($file_temp, $filepath) == false) {
            return false;
        }
        // luu san pham
        $db = new Db();
        // them product vao csdl
        $sql = "INSERT INTO PRODUCT (productName, CateID, Quantity, Price, Description, Picture) VALUES
                ('$this->productName','$this->cateID','$this->quantity','$this->price','$this->description','$filepath')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public function list_product()
    {
        # code...
        $db = new Db();
        $sql = "SELECT * FROM product";
        $result = $db->select_to_array($sql);
        return $result;
    }
    // lay ds san pham theo
    public static function list_product_by_cateid($cateid){
        $db= new Db();
        $sql = "SELECT * FROM product WHERE CateID ='$cateid'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function list_product_relate($cateid,$id){
        $db= new Db();
        $sql= "SELECT * FROM product WHERE CateID='$cateid' AND productID!='$id'";
        $result = $db ->select_to_array($sql);
        return $result;
    }
    public static function get_product ($id){
        $db = new Db();
        $sql= "SELECT * FROM product WHERE productID='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
