@component('admin::layouts.app')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Home</h4>
                </div>

                <div class="card-body">
                    <div class="jumbotron">
                        <h1 class="display-4">Welcome to Your Store Admin Panel</h1>
                        <p class="lead">You are logged in as an admin.</p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card bg-light mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Quick Actions</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><a href="/admin/producto" class="text-decoration-none">Manage Products</a></li>
                                        <li><a href="/admin/categoria" class="text-decoration-none">Manage Categories</a></li>
                                        <li><a href="/admin/marca" class="text-decoration-none">Manage Brands</a></li>
                                        <li><a href="/admin/unidad" class="text-decoration-none">Manage Units</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Statistics</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="chart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Products', 'Categories', 'Brands', 'Units'],
            datasets: [{
                label: 'Total',
                data: [{{ $totalProducts }}, {{ $totalCategories }}, {{ $totalBrands }}, {{ $totalUnits }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
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
</script>

@endcomponent
