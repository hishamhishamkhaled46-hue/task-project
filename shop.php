<?php
// session_start();
include("inc/sit_header.php");


$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$start = ($page - 1) * $limit;


$count_query = "SELECT COUNT(id) AS total FROM products";
if (isset($_GET['catid'])) {
    $cat_id = $_GET['catid'];
    $count_query = "SELECT COUNT(id) AS total FROM products WHERE cat = '$cat_id'";
} elseif (isset($_GET['braid'])) {
    $bra_id = $_GET['braid'];
    $count_query = "SELECT COUNT(id) AS total FROM products WHERE brand = '$bra_id'";
}
$count_result = $conn->query($count_query);
$total_products = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_products / $limit);

?>

<div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
    </div>

<div class="container">
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Shop</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
  Filtering
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="?mos=most">Most Popular</a></li>
    <li><a class="dropdown-item" href="?low=lowst">Lowest Price</a></li>
    <!-- <li><a class="dropdown-item" href="?of=offers">Offers</a></li> -->
  </ul>
</div>
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <?php include("inc/sidebar.php"); ?>

                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <p class="text-small text-muted mb-0">Showing <?php echo $start + 1; ?>–<?php echo min($start + $limit, $total_products); ?> of <?php echo $total_products; ?> results</p>
                        </div>
                        <div class="col-lg-6">
                            </div>
                    </div>

                    <div class="row">
                        <?php
                       
                        if ( isset($_GET['mos'])) {
                            // $cat_id = $_GET['catid'];
                            $select = "SELECT * FROM products ORDER BY views DESC";
                        } elseif ( isset($_GET['low'])) {
                            // $bra_id = $_GET['braid']
                            $select = "SELECT * FROM products ORDER BY price ASC ";
                        } else {
                            $select = "SELECT * FROM `products` LIMIT $start, $limit";
                        }

                        $result = $conn->query($select);

                        
                        while ($row = $result->fetch_assoc()): 
                            $images_array = explode(',', $row['image']);
                        ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="product text-center">
                                    <div class="position-relative mb-3">
                                        <div class="badge text-white badge-info">New</div>
                                        <a class="d-block" href="detail.php?id=<?=$row['id']?>">
                                            <img class="img-fluid w-100" src="admin/image/<?=$images_array[0]?>" alt="..." style="width:150px;height:250px; object-fit: cover;">
                                        </a>
                                        <div class="product-overlay">
                                            <ul class="mb-0 list-inline">
                                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="ADD_CART.php?proid=<?=$row['id']?>">Add to cart</a></li>
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="detail.php?id=<?=$row['id']?>"><i class="fas fa-expand"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6> <a class="reset-anchor" href="detail.php?id=<?=$row['id']?>"><?=$row['name']?></a></h6>
                                    <p class="small text-muted"><?=$row['price']?> EGP</p>
                                </div>
                            </div>
                        <?php endwhile;  ?>
                    </div>

                    <nav aria-label="Page navigation example" class="mt-4">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?><?php echo isset($cat_id) ? '&catid='.$cat_id : ''; ?><?php echo isset($bra_id) ? '&braid='.$bra_id : ''; ?>">&laquo;</a>
                            </li>

                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php if($page == $i) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?><?php echo isset($cat_id) ? '&catid='.$cat_id : ''; ?><?php echo isset($bra_id) ? '&braid='.$bra_id : ''; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?><?php echo isset($cat_id) ? '&catid='.$cat_id : ''; ?><?php echo isset($bra_id) ? '&braid='.$bra_id : ''; ?>">&raquo;</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>