<?php
$actv = "products";
include( "include/nav.php");
?>

        <div id="layoutSidenav">
<?php
include( "include/sidebar.php");
?>
            <div id="layoutSidenav_content" >
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">products</li>
                        </ol>
<?php
if (!isset($_GET['action'])) {
    include("design/products/all_products.php");
}elseif($_GET['action']==='add'){
    include("design/products/add_products.php");
}elseif($_GET['action']==='edit'){
    include("design/products/edit_products.php");
}
?>
                    </div>
                </main>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
