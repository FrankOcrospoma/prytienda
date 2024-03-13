@component('admin::layouts.app')

<?php
    // Obtener el conteo de registros de cada tabla
    $totalProducts = \App\Models\Producto::count();
    $totalCategories = \App\Models\Categoria::count();
    $totalBrands = \App\Models\Marca::count();
    $totalUnits = \App\Models\Unidad::count();

    // Datos para los gráficos
    $productData = [
        'Total Products' => $totalProducts,
        'Total Categories' => $totalCategories,
        'Total Brands' => $totalBrands,
        'Total Units' => $totalUnits
    ];
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Dashboard</h4>
                </div>

                <div class="card-body">
                    <h3 class="mb-4">Welcome to Your Store Admin Panel</h3>
                    <p class="lead">You are logged in as an admin.</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-light mb-4">
                                <div class="card-header">
                                    <h5>Quick Actions</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><a href="/admin/producto">Manage Products</a></li>
                                        <li><a href="/admin/categoria">Manage Categories</a></li>
                                        <li><a href="/admin/marca">View Brands</a></li>
                                        <li><a href="/admin/unidad">Manage Units</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light mb-4">
                                <div class="card-header">
                                    <h5>Statistics</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Agregar gráficos aquí -->
                                    <canvas id="chart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agregar Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Configuración del gráfico
    var ctx = document.getElementById('chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(<?php echo json_encode($productData); ?>),
            datasets: [{
                label: 'Data',
                data: Object.values(<?php echo json_encode($productData); ?>),
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
