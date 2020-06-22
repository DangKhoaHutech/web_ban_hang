<?php //IDEA
require_once ("db.class.php");

class Category
{
    public $cateID;
    public $categoryName;
    public $description;

    public function __construct($cate_name, $desc)
    {
        # code...
        $this -> categoryName= $cate_name;
        $this -> description= $desc;
    }
    // laayy ds chuyen muc loai sp
    public static function list_category()
    {
        # code...
        $db = new Db();
        $sql= "SELECT * FROM category";
        $result = $db -> select_to_array($sql);
        return $result;
    }
}