@extends('admin.main')
@section('content')

<div style="display:flex">
    <div >
    <div style="padding-right: 100px;padding:20px;">
        <h3 style="color:brown;text-align:center">TỔNG ĐƠN HÀNG THEO THÁNG CỦA NĂM {{ $year }}</h3><br>
        <canvas id="ordersChart" width="400" height="200"></canvas>
    </div>
    <div style="padding-right: 100px; width:550px;padding:20px;">
        <h3 style="color:brown; text-align:center">TỔNG SỐ LƯỢNG KHÁCH NẶN GỐM NĂM {{ $year }}</h3><br>
        <canvas id="customersChart" width="400" height="200"></canvas>
    </div>
</div>
    <div>
        <div style="padding: 10px; margin-left:100px">
        <div style="padding: 10px; background-color:whitesmoke; border:1px solid gray; border-radius: 10px;">
            <h3 style="color:brown;text-align:center">TỔNG DOANH THU NĂM {{ $year }}</h3>
            <h2 style="color:green; text-align:center;">{{ number_format($totalRevenue, 0, ',', '.') }} VNĐ</h2>
            <h3 style="font-style: italic; text-align:center;font-weight:400">Tổng số lượng sản phẩm: {{ $totalProducts }}</h3>
        </div>    
        <div style="padding-right: 100px; padding:20px;">
        <h3 style="color:brown;text-align:center;">TOP 10 SẢN PHẨM BÁN CHẠY NHẤT</h3>
        <canvas id="topProductsChart" width="400" height="200"></canvas>
    </div>
</div>
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Biểu đồ tổng đơn hàng theo tháng
        var ctx = document.getElementById('ordersChart').getContext('2d');
        var labels = @json($monthlyOrders->pluck('month')->toArray());
        var data = @json($monthlyOrders->pluck('total_orders')->toArray());

        var ordersChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Tổng đơn hàng',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Biểu đồ top sản phẩm bán chạy nhất
        var ctx2 = document.getElementById('topProductsChart').getContext('2d');
        var topLabels = @json($topProducts->pluck('name')->toArray());
        var topData = @json($topProducts->pluck('total_sold')->toArray());

        var topProductsChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: topLabels,
                datasets: [{
                    label: 'Sản phẩm bán chạy',
                    data: topData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw;
                                return label + ': ' + value + ' sản phẩm';
                            }
                        }
                    }
                }
            }
        });

        // Biểu đồ tổng số lượng khách hàng theo tháng
        var ctx3 = document.getElementById('customersChart').getContext('2d');
        var customerLabels = @json($monthlyCustomers->pluck('month')->toArray());
        var customerData = @json($monthlyCustomers->pluck('total_quantity')->toArray());

        var customersChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: customerLabels,
                datasets: [{
                    label: 'Tổng số lượng khách hàng',
                    data: customerData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
