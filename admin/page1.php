<h1>แสดงภาพรวมของระบบ</h1>
<div class="card" width="100">
    <div class="card-body">
        <div class="row">
            <div class="card col-sm-12 col-md-6 col-lg-3" >
                <div class="card-body">
                    <h5 class="card-title">ผู้เข้าชม</h5>
                    <h3 class="text-danger">50 คน</h3>
                </div>
            </div>
            <div class="card col-sm-12 col-md-6 col-lg-3" >
                <div class="card-body">
                    <h5 class="card-title">จำนวนสมาชิกทั้งหมด</h5>
                    <h3 class="text-success">60 สมาชิก</h3>
                </div>
            </div>
            <div class="card col-sm-12 col-md-6 col-lg-3" >
                <div class="card-body">
                    <h5 class="card-title">จำนวนกระทู้ในระบบ</h5>
                    <h3 class="text-primary">20 กระทู้</h3>
                </div>
            </div>
            <div class="card col-sm-12 col-md-6 col-lg-3" >
                <div class="card-body">
                    <h5 class="card-title">จำนวนผู้ประกาศโพส</h5>
                    <h3 class="text-warning">20 ประกาศ</h3>
                </div>
            </div>
            <hr>

            <!------------------------------------------------------------------------------------------------------------------------------------->
            <canvas class="col-12" id="myChart" width="400" height="200"></canvas>

        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>