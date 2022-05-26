<?php

if (sizeof($datas_by_page) > 0) {
?>
    <div class="row">
        <div>
            <?php
            foreach ($datas_by_page as $data) {
            ?>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                    <div class="tg-postbook">
                        <figure class="tg-featureimg">
                            <div class="tg-bookimg">
                                <div class="tg-frontcover"><img src="./public/images/<?= $data['img_b'] ?>" alt="image description"></div>
                                <div class="tg-backcover"><img src="./public/images/<?= $data['img_b'] ?>" alt="image description"></div>
                            </div>
                            <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                <i class="icon-heart"></i>
                                <span>Thêm vào yêu thích</span>
                            </a>
                        </figure>
                        <div class="tg-postbookcontent">
                            <ul class="tg-bookscategories">
                                <li><a href="<?= $URL ?>controller=cate&id_cate=<?= $data['id_cate'] ?>"><?= $data['name_cate'] ?></a></li>
                            </ul>
                            <div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
                            <div class="tg-booktitle" style="height:70px">
                                <h3><a href="<?= $URL ?>controller=product&id_b=<?= $data['id_b'] ?>"><?= $data['name_b'] ?></a></h3>
                            </div>
                            <span class="tg-bookwriter">NXB: <a href="javascript:void(0);"><?= $data['nxb_b'] ?></a></span>
                            <span class="tg-stars"><span></span></span>
                            <span class="tg-bookprice">
                                <ins><?= ((float)$data['price_b'] * 80 / 100) . "đ"; ?></ins>
                                <del><?= $data['price_b'] ?></del>
                            </span>
                            <a class="tg-btn tg-btnstyletwo" id_b=<?= $data['id_b'] ?> href="javascript:void(0);">
                                <i class="fa fa-shopping-basket"></i>
                                <em>Thêm giỏ hàng</em>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>
        </div>
        <nav aria-label="Page navigation example" style="text-align:center ;margin-top:50px">
            <ul class="pagination">
                <li this_page=<?= $this_page - 1 ?> class="page-item <?php
                                                                        if ($this_page == 1) {
                                                                            echo "disabled";
                                                                        }
                                                                        ?>">
                    <a  class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($i = 1; $i <= $total_page; $i++) {
                ?>
                    <li this_page=<?= $i ?> class="page-item <?php
                                                                if ($i == $this_page) {
                                                                    echo "active";
                                                                }
                                                                ?>"><a  class="page-link"><?= $i ?></a></li>

                <?php
                }
                ?>

                <li this_page=<?= $this_page + 1 ?> class="page-item <?php
                                                                        if ($this_page == $total_page) {
                                                                            echo  "disabled";
                                                                        }
                                                                        ?>">
                    <a class="page-link" aria-label="Next" >
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php
} else {
?>
    <div class="noBill" id="status" value="0">
       Không có sản phẩm nào 
    </div>
<?php
}
?>