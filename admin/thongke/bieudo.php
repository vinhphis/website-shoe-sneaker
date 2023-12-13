<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    <div id="myChart" style="width:100%; max-width:600px; height:500px;">
    </div>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Số lượng sản phẩm'],
                <?php
                $tongdm=count($listtk);
                $i=1;
                foreach ($listtk as $thongke) {
                    extract($thongke);
                    # code...
                    if($i==$tongdm){
                        $dauphay="";
                    }else{
                        $dauphay=",";
                    }
                    echo " ['".$thongke['tendm']."', ".$thongke['countsp']."]".$dauphay;
                    $i+=1;
                }
                ?>
               
            ]);

            var options = {
                title: 'Thống kê sản phẩm theo danh mục'
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>

</body>

</html>