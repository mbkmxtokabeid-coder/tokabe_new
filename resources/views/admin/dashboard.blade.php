@extends('admin.template')
@section('content')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                                <h5>Home</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Analytics Dashboard</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Buat disini Click Count -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Click Counts</h3>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <div style="width: 100%; overflow-x: auto;">
                                                <canvas id="clickOrderChart" style="height: 400px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <a href="#detailed-table">
                                                    <div class="btn btn-primary">
                                                        <span>Lihat Selengkapnya</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-body">
                                            <h6 class="m-b-20">Total DOOH / Videotron</h6>
                                            <h2 class="text-start"><span>{{ $totalDOOH }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-body">
                                            <h6 class="m-b-20">Total OOH / Billboard / Baliho</h6>
                                            <h2 class="text-start"><span>{{ $totalOOH }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- Table -->
                                    <div class="card" id="detailed-table">
                                        <div class="card-body">
                                            <div class="dt-responsive table-responsive">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Service Name</th>
                                                            <th>Click Count</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($service as $item)
                                                            <tr>
                                                                <td>
                                                                    @php
                                                                        $judul = $item->judul;
                                                                        $judulText = is_array($judul) ? ($judul[app()->getLocale()] ?? $judul['id'] ?? $judul['en'] ?? '') : $judul;
                                                                    @endphp
                                                                    {{ $judulText }}
                                                                </td>
                                                                <td>{{ $item->click_count }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
        document.addEventListener("DOMContentLoaded", function() {
            const labels = @json($fixedLabels).map(label =>
                label.length > 30 ? label.substring(0, 27) + "..." : label
            );

            const clickData = @json($click_count);
            const orderData = @json($order_click);

            const ctx = document.getElementById('clickOrderChart').getContext('2d');
            const clickOrderChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Product Clicks',
                            data: clickData,
                            backgroundColor: 'rgba(54, 162, 235, 0.8)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            barThickness: 30
                        },
                        {
                            label: 'Order Clicks',
                            data: orderData,
                            backgroundColor: 'rgba(255, 99, 132, 0.8)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            barThickness: 30
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            top: 20,
                            bottom: 30
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: {
                                    size: 14
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.dataset.label || '';
                                    const value = context.parsed.y;
                                    return `${label}: ${value.toLocaleString()}`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Click Count',
                                font: {
                                    size: 14
                                }
                            },
                            ticks: {
                                maxRotation: 20,
                                minRotation: 20,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Total Clicks',
                                font: {
                                    size: 14
                                }
                            },
                            ticks: {
                                callback: function(value) {
                                    return value >= 1000 ? (value / 1000) + 'k' : value;
                                },
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
