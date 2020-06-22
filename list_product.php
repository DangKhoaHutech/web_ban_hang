<?php
        require_once("product.class.php");
        require_once("category.class.php");



?>
<?php
include_once("header.php");

if(!isset ($_GET["cateid"])){
    $prods = Product::list_product();
}
else{
    $cateid=$_GET ["cateid"];
    $prods = Product::list_product_by_cateid($cateid);
}
$cates= Category :: list_category();

/*$prods =Product::list_product();*/
?>
<div class="container text-center">
<div class ="col-sm-3">
    <h3>Danh mục</h3>
    <ul class ="list-group">
    <?php
        foreach ($cates as $item){
            echo "<li class ='list-group-item'>
            <a href=/lab3_webbanhang/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
        }
    ?>
    </ul>
</div>
<div class="col-sm-9">
        <h3>Sản phẩm cửa hàng</h3>
        <div class="row">
            <?php
                foreach ($prods as $item){
                ?>
            <div class="col-sm-4">
                 <a href="/lab3_webbanhang/product_detail.php?id=<?php echo $item["ProductID"]; ?>">
                            <img src="<?php echo "/lab3_webbanhang/".$item["Picture"];?>"class="img-responsive" stype="width:100%" alt="Image">
                 </a>
                <p class="text-danger"><?php echo $item ["ProductName"]?></p>
                <p class="text-info"><?php echo $item["Price"]?> đ</p>
                <p>
                    <button type="button" class="btn btn-primary" onclick="location.href='lab3_webbanhang/shopping_cart.php?id=<?php echo $item["ProductID"];?>'">
                    Mua hàng</button>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include_once("footer.php")?>