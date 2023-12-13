<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">



            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Đơn Hàng Đã Bán</div>
                                    <?php extract($load_luotban_admin);
                                    echo '  <div class="h5 mb-0 font-weight-bold text-gray-800">' . $luotban . '</div>';
                                    ?>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Doanh Thu</div>
                                    <?php extract($loadall_tongtien);
                                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800"> ' . number_format($sum_price) . ' </div>' ?>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Lượt Xem
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <?php extract($load_luotxem);
                                            echo '  <div class="h5 mb-0 font-weight-bold text-gray-800">' . number_format($lx) . '</div>';
                                            ?>
                                        </div>
                                        <!-- <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" 
                                                role="progressbar" 
                                                style="width: 60%"  
                                                aria-valuenow="50" 
                                                aria-valuemin="0" 
                                                aria-valuemax="100"></div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-eye fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Khách Hàng</div>
                                    <?php extract($loadall_th_kh);
                                    echo '  <div class="h5 mb-0 font-weight-bold text-gray-800">' . $tk . '</div>';
                                    ?>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Sản Phẩm Đã Bán</h6>

                        </div>
                        <!-- Card Body -->


                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myChartBar" style="max-width:650px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // Chuyển đổi dữ liệu thống kê thành mảng và trả về dưới dạng JSON
                $data = [];
                foreach ($thongke_sanpham as $thongke) {
                    $data[] = [
                        'tensp' => $thongke['name_product'],
                        'luotban' => $thongke['luotban'],

                    ];
                }
                $thongkeData_sp = json_encode($data);
                ?>
                <script>
                    const TdT = <?php echo $thongkeData_sp; ?>;

                    // Tạo các mảng dữ liệu từ dữ liệu thống kê
                    const xV = TdT.map(data => data.tensp);
                    const yV = TdT.map(data => data.luotban);
                    const barC = ["red", "green", "blue", "orange", "brown", "yellow","pink"];

                    new Chart("myChartBar", {
                        type: "bar",
                        data: {
                            datasets: [{
                                backgroundColor: barC,
                                data: yV
                            }],
                            labels: xV,
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                            }
                        }
                    });
                </script>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4" style="height: 410px;">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Mục</h6>
                        </div>
                        <!-- Card Body -->

                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2" style="height: 500px; width: 500px; margin-left: -70px;">
                                <canvas id="myChartPie"></canvas>
                            </div>
                            <?php
                            // Chuyển đổi dữ liệu thống kê thành mảng và trả về dưới dạng JSON
                            $data = [];
                            foreach ($thongke_danhmuc as $thongke) {
                                $data[] = [
                                    'tendm' => $thongke['name_dm'],
                                    'countsp' => $thongke['soluong'],
                                ];
                            }
                            $thongkeData = json_encode($data);
                            ?>
                            <script>
                                const thongkeData = <?php echo $thongkeData; ?>;

                                // Tạo các mảng dữ liệu từ dữ liệu thống kê
                                const xValues = thongkeData.map(data => data.tendm);
                                const yValues = thongkeData.map(data => data.countsp);
                                const barColor = [
                                    "#b91d47",
                                    "#00aba9",
                                    "#2b5797",
                                    "#e8c3b9",
                                    "#1e7145"
                                ];

                                new Chart("myChartPie", {
                                    type: "pie",
                                    data: {
                                        datasets: [{
                                            backgroundColor: barColor,
                                            data: yValues
                                        }],
                                        labels: xValues
                                    },
                                    options: {
                                        title: {
                                            display: true,
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>