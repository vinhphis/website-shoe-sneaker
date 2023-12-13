<div class="cartegory-left">
    <form action="?act=sanpham" method="post">
        <div class="cartegory-left-danhmuc">
            <ul>
                <?php
                if (isset($load_dm_sp)) {
                    foreach ($load_dm_sp as  $dm) {
                        extract($dm);
                        $linkdm = "?act=sanpham&iddm=" . $iddm;
                        $linksp = "?act=ctsp&idsp=" . $idsp;
                ?>
                        <li><a href="<?= $linkdm ?>"><?= $name_dm ?></a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="cartegory-left-danhmuc">
        </div>
        <hr width="80%" align="center">
        <div class="cartegory-left-danhmuc" style="color: orange;">
            <div class=""> <input type="checkbox" name="stars[]" id="" value="1"> <span> <i class="fa-solid fa-star"></i></span></div>
            <div class=""> <input type="checkbox" name="stars[]" id="" value="2"> <span> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span></div>
            <div class=""> <input type="checkbox" name="stars[]" id="" value="3"> <span> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></div>
            <div class=""> <input type="checkbox" name="stars[]" id="" value="4"> <span> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></div>
            <div class=""> <input type="checkbox" name="stars[]" id="" value="5"> <span> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></div>
        </div>
        <hr width="80%" align="center">
        <div class="cartegory-left-danhmuc">
            <?php
            if (isset($load_max_min_price_sale)) {
                extract($load_max_min_price_sale);
            }

            ?>
            <div class="wrapper">
                <div class="slider">
                    <div class="progress"></div>
                </div>
                <div class="range-input">
                    <input type="range" class="range-min" min="0" max="<?= $maxp ?>" value="0" step="50000">
                    <input type="range" class="range-max" min="0" max="<?= $maxp ?>" value="<?= $maxp ?>" step="50000">
                </div>
                <div class="price-input">
                    <div class="field">
                        <span>Min</span>
                        <input type="number" class="input-min" value="0" name="price_min">
                    </div>
                    <div class="field">
                        <span>Max</span>
                        <input type="number" class="input-max" value="<?= $maxp ?>" name="price_max">
                    </div>
                </div>

            </div>
        </div>
        <input type="submit" value="Lọc sản phẩm" name="filter">
    </form>
</div>
<script>
    const rangeInput = document.querySelectorAll(".range-input input"),
        priceInput = document.querySelectorAll(".price-input input"),
        range = document.querySelector(".slider .progress");
    let priceGap = 1000;

    priceInput.forEach(input => {
        input.addEventListener("input", e => {
            let minPrice = parseInt(priceInput[0].value),
                maxPrice = parseInt(priceInput[1].value);

            if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
                if (e.target.className === "input-min") {
                    rangeInput[0].value = minPrice;
                    range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                } else {
                    rangeInput[1].value = maxPrice;
                    range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                }
            }
        });
    });

    rangeInput.forEach(input => {
        input.addEventListener("input", e => {
            let minVal = parseInt(rangeInput[0].value),
                maxVal = parseInt(rangeInput[1].value);

            if ((maxVal - minVal) < priceGap) {
                if (e.target.className === "range-min") {
                    rangeInput[0].value = maxVal - priceGap
                } else {
                    rangeInput[1].value = minVal + priceGap;
                }
            } else {
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        });
    });
</script>