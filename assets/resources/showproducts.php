<?php
function getProducts()
{

  include('./includes/connect.php');
    
  // Số sản phẩm hiển thị trên mỗi trang
  $itemsPerPage = 12;
  
  // Xác định trang hiện tại từ tham số URL
  $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  
  // Tính toán offset để truy vấn cơ sở dữ liệu
  $offset = ($currentPage - 1) * $itemsPerPage;
  
  $select_query = "SELECT * FROM `products` ORDER BY rand() LIMIT $offset, $itemsPerPage";
  $result_query = mysqli_query($con, $select_query);
  while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keyword = $row['product_keyword'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $date = $row['date'];
    $status = $row['status'];
    $category_id = $row['category_id'];
    echo '<div class="col-md-3 mb-2">
                  <div class="card" style="width: 18rem;">
                  <img src="/Mysite/ecom/assets/img/' . $product_image1 . '" class="card-img-top custom-card-img" alt="' . $product_keyword . '">
                  <div class="card-body">
                      <h5 class="card-title">' . $product_title . '</h5>
                      <p class="card-text"> ' . $product_description . ' </p>
                      <p class="card-text"> ' . $product_price . ' </p>
                      <p class="card-text"> ' . $date . ' </p>
                    </div>
                    <div class="card-footer">
                      <a href="#" class="btn btn-primary">Chi tiet</a>
                      <a href="#" class="btn btn-primary">Mua hang</a>
                    </div>
                  </div>
                </div>';
  }
  function countTotalProducts()
{
  include('./includes/connect.php');
    
  $count_query = "SELECT COUNT(*) AS total FROM `products`";
  $result = mysqli_query($con, $count_query);
  $row = mysqli_fetch_assoc($result);
  return $row['total'];
}

}
?>

