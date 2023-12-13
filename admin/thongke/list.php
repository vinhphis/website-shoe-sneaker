
<div class="">
    <H1>THỐNG KÊ</H1>
</div>
<div class="mb-12">

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>MÃ DANH MỤC</th>
                <th>TÊN DANH MỤC</th>
                <th>SỐ LƯỢNG SẢN PHẨM </th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>

            <?php
            foreach ($listtk as $tk) {
                extract($tk);             
                echo '
                    <tr>
                    <td>'.$madm.'</td>
                    <td>'.$tendm.'</td>
                    <td> '.$countsp.' </td>
                    <td> '.$minprice.' </td>
                    <td> '.$maxprice.' </td>
                    <td> '.$avgprice.' </td>
                    </tr>
        ';
            }
            ?>
        </table>
    </div>

    <div class="row2">
       <a href="index.php?act=bieudo"><input type="submit" value="Xem biểu đồ"></a>
    </div>

    <style>
    

    .row2 input {
        width: 100px;
        height: 35px;
        margin-top: 10px;
        background-color: black;
        color: white;
        border: 1px solid gray;
    }

    .row2 input:hover {
        background-color: white;
        color: black;
    }
</style>