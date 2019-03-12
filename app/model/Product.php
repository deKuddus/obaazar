<?php
require_once __DIR__.'/../../vendor/autoload.php';


class Product extends Database
{
    public function dateFormat($date)
    {
        return date('F j, Y ,g:i a', strtotime($date));
    }


    public function validation($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        //$data = mysql_real_escape_string($this->link,$data);
        return $data;

    }

    public function storeProductInfo($data)
    {

        $product_title = $this->validation($data['product_titles']);
        $product_category = $this->validation($data['product_category']);
        $product_brand = $this->validation($data['product_brand']);
        $product_features = $this->validation($data['product_features']);
        $product_details = $this->validation($data['product_details']);
        $product_slug = $this->validation($data['product_slug']);
        $product_price = $this->validation($data['product_price']);
        $product_sub_category = $this->validation($data['product_sub_category']);

        $t_len = strlen($product_title);
        $s_len = strlen($product_slug);

        $product_added_date = date("Y-m-d");

        $permitted = array('jpg', 'jpeg', 'png', 'gif');

        $file_Name = $_FILES['product_image']['name'];
        $file_Size = $_FILES['product_image']['size'];
        $file_Temp = $_FILES['product_image']['tmp_name'];
        $div = explode('.', $file_Name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "product_images/" . $unique_image;


        if ($product_title == ""  OR  $product_features == "" OR $product_details == "" OR $file_Name =="" OR $product_price == "" ){
            Message::showMessage("Error !! All informatin must be provided");
        }elseif(50 < $t_len){
            Message::showMessage("Error!! Title Length must be less than 50 characters");
        }elseif($s_len > 30){
            Message::showMessage("Error!! Slug Length must be less than 30 characters");
        }elseif(!in_array($file_ext, $permitted)) {
            Message::showMessage("Error!! you can upload only :-" . implode(',', $permitted));
        }elseif($file_Size1 > 20000000) {
            Message::showMessage("Error!! Image should less than 2MB");
        }else {

            $query = "SELECT product_slug from products where product_slug ='$product_slug'";
            $result = $this->select($query);
            if($result){
                Message::showMessage("Error! Slug name already exist, try different");
            }
            else{
            if(move_uploaded_file($file_Temp, $upload_image)){            

                $query = "INSERT INTO products(product_title,product_slug,product_price,product_features,product_brand,product_category,product_sub_category, product_details, product_added_date, product_image)
                VALUES('$product_title', '$product_slug', '$product_price','$product_features','$product_brand','$product_category','$product_sub_category','$product_details','$product_added_date','$upload_image')";
                $result = $this->insert($query);
                if($result){

                    Message::showMessage("success!! product Information is added");
                }else{
                    Message::showMessage("failed!! To add production information");
                }
          }
      }
        }

    }


    public function showActiveProducts()
    {
        $sqlSelectQuery = "SELECT * from products where status = 1 order by product_id desc";
        $result = $this->select($sqlSelectQuery);
        return $result;
    }

    public function showDeactiveProducts(){
        $sqlSelectQuery = "SELECT * from products where status = 0 order by product_id desc";
        $result = $this->select($sqlSelectQuery);
        return $result;
    }

        public function deleteProductById($id)
        {
            $sqlSelectQuery = "SELECT * from products where product_id = '$id'";
            $result = $this->select($sqlSelectQuery);
            if($result){
                foreach ($result as $value) {
                 $image = $value['product_image'];   
                }
             if($image && unlink($image)){
             $sqlQuery = "DELETE from products WHERE product_id='$id'";
             $result = $this->delete($sqlQuery);
             if($result){
                Message::showMessage("Success! Product Deleted");
             }else{

                Message::showMessage("Error! Failed to delete");
             }

           }
        }
    }

        public function changeStatusDeativeById($id)
        {
            $sqlQuery = "UPDATE products SET status = 0 WHERE product_id ='$id'";;
            $result = $this->update($sqlQuery);
            if($result){
                Message::showMessage("ok");
            }else{
                Message::showMessage("no");
            }
        }


        public function changeStatusActiveById($id)
        {
            $sqlQuery = "UPDATE products SET status = 1 WHERE product_id = '$id'";
            $result = $this->update($sqlQuery);
            if($result){
                Message::showMessage("ok");
            }else{
                Message::showMessage("no");
            }
        }


        public function getProductForEdit($id)
        {
            $sqlSelectQuery = "SELECT * from products where  product_id= '$id'";
            $result = $this->select($sqlSelectQuery);
            return $result;

        }

        public function getBrandForEditProduct()
        {
            $query = "select *  from brands order by brand_id desc";
            $result = $this->select($query);
            return $result;
        }

        public function getCategoryForEditProduct()
        {
            $query = "select *  from categories order by category_id desc";
            $result = $this->select($query);
            return $result;
        }


        public function updateProductInfo($data){

            $product_title = $this->validation($data['product_titles']);
            $product_category = $this->validation($data['product_category']);
            $product_brand = $this->validation($data['product_brand']);
            $product_features = $this->validation($data['product_features']);
            $product_details = $this->validation($data['product_details']);
            $product_slug = $this->validation($data['product_slug']);
            $product_price = $this->validation($data['product_price']);
            $product_id = $this->validation($data['product_id']);

            $product_added_date = date("Y-m-d");

            $permitted = array('jpg', 'jpeg', 'png', 'gif');

            $file_Name = $_FILES['product_image']['name'];
            $file_Size = $_FILES['product_image']['size'];
            $file_Temp = $_FILES['product_image']['tmp_name'];
            $div = explode('.', $file_Name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $upload_image = "product_images/" . $unique_image;

            if ($product_title == ""  OR  $product_features == "" OR $product_details == "" OR $file_Name =="" OR $product_price == "" ){
                Message::showMessage("Error !! All informatin must be provided");
            }
            if(strlen($product_title) >50){
                Message::showMessage("Error!! Title Length must be less than 50 characters");
            }
            if(strlen($product_slug) >30){
                Message::showMessage("Error!! Slug Length must be less than 30 characters");
            }

            if($file_Name != ""){
                 if(!in_array($file_ext, $permitted)) {
                    Message::showMessage("Error!! you can upload only :-" . implode(',', $permitted));
                }elseif($file_Size1 > 20000000) {
                    Message::showMessage("Error!! Image should less than 2MB");
                }else{
                    if(move_uploaded_file($file_Temp, $upload_image)){
                        $query = "UPDATE products SET 
                        product_title='$product_title',
                        product_slug='$product_slug',
                        product_price='$product_price',
                        product_features='$product_features',
                        product_brand='$product_brand',
                        product_category='$product_category', 
                        product_details ='$product_details', 
                        product_added_date='$product_added_date', 
                        product_image ='$upload_image'
                        where product_id = '$product_id'";
                        $result = $this->update($query);
                        if($result){
                             echo "<script>window.location='product_list_active.php';</script>";
                        }else{
                            Message::showMessage("failed!! To add production information");
                        }
                     }
                }
            }else{
                 $query = "UPDATE products SET 
                        product_title='$product_title',
                        product_slug='$product_slug',
                        product_price='$product_price',
                        product_features='$product_features',
                        product_brand='$product_brand',
                        product_category='$product_category', 
                        product_details ='$product_details', 
                        product_added_date='$product_added_date'
                        where product_id = '$product_id'";
                        $result = $this->update($query);
                        if($result){
                            echo "<script>window.location='product_list_active.php';</script>";
                        }else{
                            Message::showMessage("failed!! To add production information");
                        }
            }
        }


        public function getProductsFromNutsForUser()
        {
            $query = "SELECT * FROM products";
            $result = $this->select($query);
            return $result;
        }

        public function getProductByAjax($data){
            if(isset($data['action'])){
                 $query = " SELECT * FROM products WHERE status = 1  ";

                 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
                 {
                  $query .= "
                   AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' ";
                 }
                  
                 if(isset($_POST["brand"]) && !empty($_POST["brand"]))
                 {
                  $brand_filter = implode("','", $_POST["brand"]);
                  $query .= "AND product_brand IN('".$brand_filter."') ";
                 }

                 if(isset($_POST["category"]) && !empty($_POST["category"]))
                 {
                  $category_filter = implode("','", $_POST["category"]);
                  $query .= "AND product_category IN('".$category_filter."') ";
                 }

                 $query.= "order by product_id desc limit 25";

                 $result = $this->select($query);
                 $output = '';
                 if($result){
                    foreach ($result as $value) {
                        $output.='


                        <div class="col-md-4 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="admin/'.$value["product_image"].'" height="160px" weight="130px" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="view_single.php?product_id='.$value["product_id"].'" class="link-product-add-cart">Quick View</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">New</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        '.$value["product_title"].'
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">'.$value["product_price"].'টাকা</span>
                                        <!-- <del>$280.00</del> -->
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                       
                                       <input type="submit" class="btn btn-primary" value="Add TO Cart" onclick="product_add_tocart('.$value["product_id"].');">
                                       
                                    </div>

                                </div>
                            </div>
                        </div>

   
                        ';
                    }
                 }else
                 {
                  $output = '<h3>No Data Found</h3>';
                 }
                 echo $output;
            }
        }

        public function showProductByBrand($product_brand)
        {
            $query = "SELECT * FROM products WHERE product_brand = '$product_brand'";
            $result = $this->select($query);
            return $result;
        }

        public function getProductBySubCategory($sub_cat_name)
        {
            $query = "SELECT * FROM products WHERE product_sub_category = '$sub_cat_name' order by product_id desc";
            $result = $this->select($query);
            return $result;
        }

        public function getProductNameAndId()
        {
            $query = "SELECT product_id, product_title FROM products order by product_id desc";
            return $result = $this->select($query);
        }

        public function storeProductOptionalImage($data)
        {
            $product_id = $this->validation($data['product_id']);

            $permitted = array('jpg', 'jpeg', 'png', 'gif');

            $file_Name1 = $_FILES['prod_optional_img1']['name'];
            $file_Size1 = $_FILES['prod_optional_img1']['size'];
            $file_Temp1 = $_FILES['prod_optional_img1']['tmp_name'];
            $div1 = explode('.', $file_Name1);
            $file_ext1 = strtolower(end($div1));
            $unique_image1 = substr(md5(time()), 0, 10) . '.' . $file_ext1;
            $upload_image1 = "product_images/" . $unique_image1;

            $file_Name2 = $_FILES['prod_optional_img2']['name'];
            $file_Size2 = $_FILES['prod_optional_img2']['size'];
            $file_Temp2 = $_FILES['prod_optional_img2']['tmp_name'];
            $div2 = explode('.', $file_Name2);
            $file_ext2 = strtolower(end($div2));
            $unique_image2 = substr(md5(time()), 0, 20) . '.' . $file_ext2;
            $upload_image2 = "product_images/" . $unique_image2;

            if($file_Name1 == "" OR $file_Name2 ==""){
                Message::showMessage("Error! Image must be inputed");
            }elseif(!in_array($file_ext1, $permitted) OR !in_array($file_ext2, $permitted)) {
                Message::showMessage("Error!! you can upload only :-" . implode(',', $permitted));
            }elseif($file_Size1 > 20000000 OR $file_Size2 > 20000000) {
                Message::showMessage("Error!! Image should less than 2MB");
            }else{
                if(move_uploaded_file($file_Temp1, $upload_image1) && move_uploaded_file($file_Temp2, $upload_image2)){
                    $query = "INSERT INTO products_aother_image(product_id,prod_another_image1,prod_another_image2)VALUES('$product_id','$upload_image1','$upload_image2')";
                    $result = $this->insert($query);
                    if($result){
                        Message::showMessage("Success! Image added");
                    }
                }
            }
        }


        public function showProductOptionalImages()
        {
            $query = "SELECT * FROM products_aother_image order by product_id desc";
            return $this->select($query);
        }

        public function deleteProductOptionalImageById($deleteID)
        {
            $query = "SELECT * FROM products_aother_image where product_id = '$deleteID'";
            $result = $this->select($query);
            if($result){
                foreach ($result as $value) {
                    $img1 = $value['prod_another_image1'];
                    $img2 = $value['prod_another_image2'];
                }

                if(unlink($img1) && unlink($img2)){
                    $query = "DELETE FROM products_aother_image where product_id = '$deleteID'";
                    $result = $this->delete($query);
                    if($result){
                        Message::showMessage("Success! Image deleted");
                    }
                }
            }
        }

        public function editProductOptionalImageById($editId)
        {
            $query = "SELECT * FROM products_aother_image where product_id = '$editId'";
            return $this->select($query);
        }

        public function updateProductOptionalImage($data)
        {
            $prev_prod_id = $this->validation($data['prev_prod_id']);
            $product_id = $this->validation($data['product_id']);

            $permitted = array('jpg', 'jpeg', 'png', 'gif');

            $file_Name1 = $_FILES['prod_optional_img1']['name'];
            $file_Size1 = $_FILES['prod_optional_img1']['size'];
            $file_Temp1 = $_FILES['prod_optional_img1']['tmp_name'];
            $div1 = explode('.', $file_Name1);
            $file_ext1 = strtolower(end($div1));
            $unique_image1 = substr(md5(time()), 0, 10) . '.' . $file_ext1;
            $upload_image1 = "product_images/" . $unique_image1;

            $file_Name2 = $_FILES['prod_optional_img2']['name'];
            $file_Size2 = $_FILES['prod_optional_img2']['size'];
            $file_Temp2 = $_FILES['prod_optional_img2']['tmp_name'];
            $div2 = explode('.', $file_Name2);
            $file_ext2 = strtolower(end($div2));
            $unique_image2 = substr(md5(time()), 0, 20) . '.' . $file_ext2;
            $upload_image2 = "product_images/" . $unique_image2;

         
            if($file_Size1 > 20000000 OR $file_Size2 > 20000000) {
                Message::showMessage("Error!! Image should less than 2MB");
            }else{
                $query = "SELECT * FROM products_aother_image where product_id = '$prev_prod_id'";
                $result =  $this->select($query);
                foreach ($result as $value) {
                    $img1 = $value['prod_another_image1'];
                    $img2 = $value['prod_another_image2'];
                }
                if($file_Name1 != "" && $file_Name2 == ""){
                    if(unlink($img1) && move_uploaded_file($file_Temp1, $upload_image1)){
                        $query = "UPDATE products_aother_image SET product_id='$product_id',prod_another_image1 = '$upload_image1'";
                        $result = $this->update($query);
                        if($result){
                            //echo "<script>window.location='product_optional_image_list.php';</script>";
                            header("Location: product_optional_image_list.php");
                        }
                    }

                }elseif($file_Name2 != "" && $file_Name1 ==""){
                    if(unlink($img2) && move_uploaded_file($file_Temp2, $upload_image2)){
                        $query = "UPDATE products_aother_image SET product_id='$product_id',prod_another_image2 = '$upload_image2'";
                        $result = $this->update($query);
                       if($result){
                            //header("Location: product_optional_image_list.php");
                        }
                    }

                }elseif($file_Name2 != "" && $file_Name1 !=""){
                    if(unlink($img2) && unlink($img1) && move_uploaded_file($file_Temp2, $upload_image2) && move_uploaded_file($file_Temp1, $upload_image1)){
                        $query = "UPDATE products_aother_image SET product_id='$product_id',prod_another_image1 = '$upload_image1',prod_another_image2 = '$upload_image2'";
                        $result = $this->update($query);
                       if($result){
                            header("Location: product_optional_image_list.php");
                        }
                    }
                }else{
                    header("Location: product_optional_image_list.php");
                }
            }
        }

        public function getSinleProductByID($product_id)
        {
            $sqlQuery = "SELECT products.*, products_aother_image.* from products left join products_aother_image on products.product_id = products_aother_image.product_id  where products.product_id = '$product_id' limit 1";
            $productSingleInfo = $this->select($sqlQuery);
            return $productSingleInfo;
        }

        public function getProductByCategory($category)
        {
            $query = "SELECT * FROM products where product_category = '$category' order by rand() limit 20";
            return $result = $this->select($query);
        }

        public function getProductByCategoryFromFooter($category)
        {
            $query = "SELECT * FROM products where product_category = '$category' order by product_id desc";
            return $result = $this->select($query);
        }

        public  function getProductRandom()
        {
            $query = "SELECT * FROM products order by rand() limit 20";
            return $this->select($query);
        }

        

}