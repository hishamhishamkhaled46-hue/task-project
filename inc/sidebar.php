              <div class="col-lg-3 order-2 order-lg-1">
                <h5 class="text-uppercase mb-4">Categories</h5>
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                    <?php
                      $select = "SELECT * FROM category ";
                      $result = $conn -> query($select);
                      while ($row = $result -> fetch_assoc()) {
                    ?>
                  <li class="mb-2"><a class="reset-anchor" href="shop.php?catid=<?=$row['id']?>"><?=$row['name'] ?></a></li>
                    <?php } ?>
                </ul>
                <h5 class="text-uppercase mb-4">brand</h5>
                    <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                    <?php
                      $select_beand = "SELECT * FROM brand ";
                      $result_beand = $conn -> query($select_beand);
                      while ($row_beand = $result_beand -> fetch_assoc()) {
                    ?>
                  <li class="mb-2"><a class="reset-anchor" href="shop.php?braid=<?=$row_beand['id']?>"><?=$row_beand['name'] ?></a> (<?php
                  $brand_id = $row_beand['id'];
                  $select_b = "SELECT * FROM products WHERE brand = '$brand_id'";
                  $result_b = $conn -> query($select_b);
                  echo $result_b -> num_rows ;
                  
                  
                  ?>)</li>
                    <?php } ?>
                </ul>
              </div>