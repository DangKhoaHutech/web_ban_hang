<?php include_once('header.php');?>
<?php
require_once("product.class.php");
require_once("category.class.php");

$cates = Category::list_category();
// khởi động session
session_start();
// hien thi loi
error_reporting(E_ALL);
ini_set('display_errors','1');
// them san pham vao gio hang
if(isset($_GET["id"])){
    $pro_id=$_GET["id"];
    // bien nhan san pham da ton tai trong gio hang hay chua
    // was_found = true --> san pham da co trong gio hang, tang so luong len 1
    // was_found = false --> san pham chua co torng gio hang, them san pham vao gio hang, mac sl la 1
    $was_found = false;
    $i=0;
    // kiem tra session duoc khoi tao hay chua
    if(!isset ($_SESSION["cart_items"]) || count ($_SESSION["cart_items"])<1){
        $_SESSION["cart_items"] = array (0=> array ("pro_id"=>$pro_id,"quantity"=>1));
    }
    else{
        // gio hang da duoc khoi tao
        // duyet tat ca cac san pham trong gio hang
        // neu da ton tai san pham thi so luong =1
        // neu chua ton tai thi them moi vao gio hang voi sl =1
        foreach($_SESSION["cart_items"] as $item){
            $i++;
            while(list($key,$value)= each($item)){
                    if($key=="pro_id" && $value==$pro_id){
                        // san pham da ton tai gio hang, tang so luong len 1
                        array_splice($_SESSION["cart_items"],$i-1,1,array(array("pro_id"=>$pro_id,"quantity"=>$item["quantity"]+1)));
                        $was_found= true;
                    }
            }
        }
        if($was_found== false){
            array_push($_SESSION["cart_items"],array("pro_id"=>$pro_id,"quantity"=>1));
        }
    }
    header("location: shopping_cart.php");
    
}
?>
<div class="container text-center">
    <div class="col-sm-3">
        <h3>Danh mục</h3>
            <ul class="list-group">
            <?php
            foreach ($cates as $ item){
                echo "<li class ='list-group-item'>
                <a href=/lab3/list_product.php?cateid=".$item["CategoryName"]."</a></li>";

            }?>
            </ul>
    </div>
    <div class="col-sm-9">
    <h3>Thông tin giỏ hàng</h3><br>
    <table class ="table table-condensed">
    <thead>
    </thead>
    </table>
    </div>
</div>