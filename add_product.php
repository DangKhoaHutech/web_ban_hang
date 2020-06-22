<?php

require_once("product.class.php");
require_once("category.class.php");

if (isset($_POST["btnsubmit"])) {
    // lay gia tri tu form collection
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtcateID"]; 
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_FILES["txtpic"];
    // khoi tao doi tuong product
    $newProduct = new product($productName, $cateID, $price, $quantity, $description, $picture);
    // luu xuong csdl
    $result = $newProduct->save();

    if (!$result) {

        // truy van loi
        header("Location: add_product.php?loi");
    } else {
        header("Location: add_product.php?inserted");
    }
}
?>
<?php include_once("header.php") ?>
<?php
if (isset($_GET["inserted"])) {
    echo "<h2>Thêm sản phẩm thành công !</h2>";
}
if (isset($_GET["loi"])) {
    echo "<h2>Err</h2>";
}

?>
<!--form sản phẩm-->
<form method="post" enctype="multipart/form-data">
    <!--Ten san pham-->
    <div class="row" class="form-group"><br>
        <div class="lbltitle">
            <label>Tên sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtName" class="form-control"
                value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>" />
        </div>
    </div>
    <!--mo ta san pham-->
    <div class="row" class="form-group"><br>
        <div class="lbltitle">
            <label>Mô tả sản phẩm</label>
        </div>
        <div class="lblinput">
            <textarea name="txtdesc" class="form-control" cols="21" rows="10"
                value="<?php echo isset($_POST[" txtdesc"]) ? $_POST["txtdesc"] : ""; ?>">
             </textarea>
        </div>
    </div>
    <!--Sl san pham-->
    <div class="row" class="form-group"><br>
        <div class="lbltitle">
            <label>Số lượng sản phẩm</label>
        </div>
        <div class="lblinput">

            <input type="text" src="myfile" class="form-control" alt="Submit" width="48" height="48" name="txtquantity"
                value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : ""; ?>" />
        </div>
    </div>
    <!--gia san pham-->
    <div class="row" class="form-group"><br>
        <div class="lbltitle">
            <label>Giá sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtprice" class="form-control"
                value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : ""; ?>" />
        </div>
    </div>
    <!-- loai san pham-->
    <div class="row" class="form-group"><br>
        <div class="lbltitle">
            <label for="cateID">Loại sản phẩm</label>
        </div>
        <div class="lblinput">
           
        <select name="txtcateID" class="form-control" id="txtcateID">
                <option value="">--chọn loại sản phẩm--</option>
                <?php
                $cates = Category :: list_category();
                foreach ($cates as $item){
                    echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
                }
                ?>
            </select>
        </div>
        <!--hinh anh-->
        <div class="row" class="form-group"><br>
            <div class="lbltitle">
                <label>Hình ảnh sản phẩm</label>
            </div>
            <div class="lblinput">
                <input type="file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.JPG" class="form-control"/>
            </div>
        </div><br>
        <!--nut gui form-->
        <div class="row">
            <div class="submit">
                <input type="submit" class="btn btn-success" name="btnsubmit" value="Thêm sản phẩm" />
            </div>
        </div>
</form>
<?php include_once("footer.php"); ?>