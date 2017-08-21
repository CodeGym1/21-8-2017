<?php
    require 'database.php';
    $category_id=$_GET['category_id'];
    if(!isset($category_id)){
        $category_id=1;
    }
    $query = "select * from categories
              where categoryID=$category_id";
    $category = $db->query($query);
    $category = $category->fetch();
    $category_name= $category['categoryName'];
    $query = 'select * from categories
              order by categoryID';
    $categories=$db->query($query);
    $query = "Select * from products
              Where categoryID=$category_id
              ORDER  by productID";

    $products = $db->query($query);

?>
<html>
<head>
    <title>My guiter Shop</title>
    <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="page">

        <div id="main">
            <h1>Product List</h1>
        </div>
        <div id="sidebar">
            <h2>Danh mục sản phẩm</h2>
            <ul class="nav">
                <?php foreach ($categories as $category):?>
                <li>
                    <a href="?category_id= <?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']?>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div id="content">
            <h2><?php echo $category_name?></h2>
            <table>
                <tr >
                    <th>loại</th>
                    <th>Tên</th>
                    <th class="right">Giá</th>
                </tr>
                <?php foreach ($products as $product):?>
                    <tr>
                        <td><?php echo $product['productCode'];?></td>
                        <td><?php echo $product['productName'];?></td>
                        <td class="right"><?php echo $product['listPrice'];?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>


</body>
</html>
