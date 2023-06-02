@extends('layout')
@section('content')
    <div class="row ">
        <div class="col-md-3 col-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Total Pemesanan</h5>
                                    <h2 class="mb-3 font-18">{{ $totalPemesanan }}</h2>
                                </div>
                            </div>
                            <div class="col-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Total Pemebelian</h5>
                                    <h2 class="mb-3 font-18">{{ $totalPembelian }}</h2>
                                </div>
                            </div>
                            <div class="col-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Total Montir</h5>
                                    <h2 class="mb-3 font-18">{{ $totalMontir }}</h2>
                                </div>
                            </div>
                            <div class="col-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Total Barang</h5>
                                    <h2 class="mb-3 font-18">{{ $totalBarang }}</h2>
                                </div>
                            </div>
                            <div class="col-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/4.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    <h4>Grafik Penjualan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <div id="chart1"></div>
                            <div class="row mb-0">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="list-inline text-center">
                                        <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                                class="col-green"></i>
                                            <h5 class="m-b-0">$675</h5>
                                            <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="list-inline text-center">
                                        <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle"
                                                class="col-orange"></i>
                                            <h5 class="m-b-0">$1,587</h5>
                                            <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="list-inline text-center">
                                        <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                                class="col-green"></i>
                                            <h5 class="mb-0 m-b-0">$45,965</h5>
                                            <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row mt-5">
                                <div class="col-7 col-xl-7 mb-3">Total customers</div>
                                <div class="col-5 col-xl-5 mb-3">
                                    <span class="text-big">8,257</span>
                                    <sup class="col-green">+09%</sup>
                                </div>
                                <div class="col-7 col-xl-7 mb-3">Total Income</div>
                                <div class="col-5 col-xl-5 mb-3">
                                    <span class="text-big">$9,857</span>
                                    <sup class="text-danger">-18%</sup>
                                </div>
                                <div class="col-7 col-xl-7 mb-3">Project completed</div>
                                <div class="col-5 col-xl-5 mb-3">
                                    <span class="text-big">28</span>
                                    <sup class="col-green">+16%</sup>
                                </div>
                                <div class="col-7 col-xl-7 mb-3">Total expense</div>
                                <div class="col-5 col-xl-5 mb-3">
                                    <span class="text-big">$6,287</span>
                                    <sup class="col-green">+09%</sup>
                                </div>
                                <div class="col-7 col-xl-7 mb-3">New Customers</div>
                                <div class="col-5 col-xl-5 mb-3">
                                    <span class="text-big">684</span>
                                    <sup class="col-green">+22%</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        function chart1() {
            var options = {
                chart: {
                    height: 230,
                    type: "line",
                    shadow: {
                        enabled: true,
                        color: "#000",
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 1
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ["#786BED", "#999b9c"],
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    curve: "smooth"
                },
                series: [{
                        name: "High - 2019",
                        data: [5, 15, 14, 36, 32, 32]
                    },
                    {
                        name: "Low - 2019",
                        data: [7, 11, 30, 18, 25, 13]
                    }
                ],
                grid: {
                    borderColor: "#e7e7e7",
                    row: {
                        colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                        opacity: 0.0
                    }
                },
                markers: {
                    size: 6
                },
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],

                    labels: {
                        style: {
                            colors: "#9aa0ac"
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: "Income"
                    },
                    labels: {
                        style: {
                            color: "#9aa0ac"
                        }
                    },
                    min: 5,
                    max: 40
                },
                legend: {
                    position: "top",
                    horizontalAlign: "right",
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart1"), options);
            chart.render();
        }

        chart1(); // Panggil fungsi untuk menggambar grafik
    </script>
@endpush
