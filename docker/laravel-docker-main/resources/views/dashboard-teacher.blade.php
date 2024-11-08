    @extends('layouts.dashboard-layout')

    @section('content')
    <body>
        <div class="wrapper">
            <aside id="sidebar" class="js-sidebar">
                <!-- Content For Sidebar -->
                <div class="h-100">
                    <div class="sidebar-logo">
                        <center><a href="{{route('dashboard-teacher')}}" class="no-effects"><img id="logo" src="{{ secure_asset('DepEd_logo.ico') }}"></a>
                        <p><a href="{{route('dashboard-teacher')}}">DepEd Teacher Portal</a></p></center>
                    </div>
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="{{route('dashboard-teacher')}}" class="sidebar-link">
                                <i class="fa-solid fa-list pe-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#student" data-bs-toggle="collapse"
                                aria-expanded="false"><i class="fa-solid fa-graduation-cap"></i>
                                Manage Students
                            </a>
                            <ul id="student" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="{{route('register-student')}}" class="sidebar-link">Register Student</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('view-student')}}" class="sidebar-link">View Students</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#section" data-bs-toggle="collapse"
                                aria-expanded="false"><i class="fa-solid fa-chalkboard-user"></i>
                                Manage Section
                            </a>
                            <ul id="section" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="{{route('create-section')}}" class="sidebar-link">Create Section</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('view-section')}}" class="sidebar-link">View Sections</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('manage-grades')}}" class="sidebar-link">
                                <i class="fa-solid fa-medal"></i> Manage Grades
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="main">
                <nav class="navbar navbar-expand px-3">
                    <button style="color:white;" class="btn" id="sidebar-toggle" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="flex-fill pe-md-0" id="user-link">
                                    <h6 style="color:white!important;"><b>{{ ucfirst(auth()->user()->fname) }}</b></h6>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end mt-3">
                                    <p><a href="{{route('edit-teacher')}}" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a></p>
                                    <p><a href="{{route('logout')}}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="content px-3 py-2">
                    <div class="container-fluid" id="dashboard">
                        <div class="row pt-3 gx-3 gy-3"> <!-- Row 1 -->
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header text-center"><b>Passed and Failed</b></div>
                                    <div class="card-body">
                                        <canvas id="topGradesPieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header text-center"><b>GPA of Students</b></div>
                                    <div class="card-body">
                                        <canvas id="pieChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-3 gy-3"> <!-- Row 2 -->
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header text-center"><b>Average GPA of Sections</b></div>
                                    <div class="card-body">
                                        <canvas id="pieChart3"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header text-center"><b>Students Per Section</b></div>
                                    <div class="card-body">
                                        <canvas id="pieChart4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row text-muted">
                            <div class="col-6 text-start">
                                <p class="mb-0">
                                    <a href="#" class="">
                                        <strong>DepEd Teacher Portal</strong>
                                    </a>
                                </p>
                            </div>
                            <div class="col-6 text-end">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="https://www.deped.gov.ph/" style="color:white;">DepEd Philippines</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ secure_asset('js/dashboard.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <script>
        $(document).ready(async () => {
            fetch("/dashboard-pass-and-failed", {
                method: "GET"
            }).then((res) => {
                return res.text();
            }).then((res) => {
                const dashboardPassAndFailedRes = JSON.parse(res);

                pieChartData1 = {
                    "labels": ["Passed", "Failed"],
                    "data": [dashboardPassAndFailedRes.passed, dashboardPassAndFailedRes.failed],
                    "colors": ["rgb(49,138,252)", "rgb(30,121,83)"]
                };

                var myPieChart1 = new Chart(document.getElementById('topGradesPieChart'), {
                    type: 'pie',
                    data: {
                        labels: pieChartData1.labels,
                        datasets: [{
                            data: pieChartData1.data,
                            backgroundColor: pieChartData1.colors,
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: true,
                            caretPadding: 10,
                        },
                        legend: {
                            display: true
                        },
                        cutoutPercentage: 10,
                    },
                });
            });

            $(document).ready(() => {
                fetch("/dashboard-grades-difference", {
                    method: "GET"
                }).then((res) => {
                    return res.text();
                }).then((res) => {
                    const dashboardGradesDifference = JSON.parse(res);

                    pieChartData2 = {
                        "labels": ["90-100", "85-89", "80-84", "75-79"],
                        "data": [dashboardGradesDifference.class_a, dashboardGradesDifference.class_b, dashboardGradesDifference.class_c, dashboardGradesDifference.class_d],
                        "colors": ["rgb(49,138,252)", "rgb(30,121,83)", "rgb(255,206,86)", "rgb(75,192,192)", "rgb(153,102,255)", "rgb(255,159,64)"]
                    };

                    var myPieChart2 = new Chart(document.getElementById('pieChart2'), {
                        type: 'pie',
                        data: {
                            labels: pieChartData2.labels,
                            datasets: [{
                                data: pieChartData2.data,
                                backgroundColor: pieChartData2.colors,
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: true,
                                caretPadding: 10,
                            },
                            legend: {
                                display: true
                            },
                            cutoutPercentage: 10,
                        },
                    });
                }).catch((error) => {
                    console.error("Error fetching data:", error);
                });
            });

            fetch('/dashboard-grades-average')
                .then(response => response.json())
                .then(data => {
                    const sectionCount = data.labels.length;
                    const colors = Array.from({ length: sectionCount }, (_, i) => `hsl(${(i * 360) / sectionCount}, 70%, 60%)`);

                    pieChartData3 = {
                        labels: data.labels,
                        data: data.datasets[0].data,
                        colors: colors
                    };

                    var myPieChart3 = new Chart(document.getElementById('pieChart3'), {
                        type: 'pie',
                        data: {
                            labels: pieChartData3.labels,
                            datasets: [{
                                data: pieChartData3.data,
                                backgroundColor: pieChartData3.colors,
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: true,
                                caretPadding: 10,
                            },
                            legend: {
                                display: true
                            },
                            cutoutPercentage: 10,
                        },
                    });
                })
                .catch(error => console.error('Error fetching chart data:', error));

            fetch('/dashboard-section-passing')
                .then(response => response.json())
                .then(data => {
                    pieChartData4 = {
                        labels: data.labels,
                        data: data.datasets[0].data,
                        colors: ["rgb(49,138,252)", "rgb(30,121,83)", "rgb(255,206,86)", "rgb(75,192,192)", "rgb(153,102,255)", "rgb(255,159,64)"]
                    };

                    var myPieChart4 = new Chart(document.getElementById('pieChart4'), {
                        type: 'pie',
                        data: {
                            labels: pieChartData4.labels,
                            datasets: [{
                                data: pieChartData4.data,
                                backgroundColor: pieChartData4.colors,
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: true,
                                caretPadding: 10,
                                callbacks: {
                                    label: function(tooltipItem, chart) {
                                        const label = chart.labels[tooltipItem.index];
                                        const value = chart.datasets[0].data[tooltipItem.index];
                                        return `${label}: ${value}% Passing Rate`;
                                    }
                                }
                            },
                            legend: {
                                display: true
                            },
                            cutoutPercentage: 10,
                        },
                    });
                })
                .catch(error => console.error('Error fetching passing rate data:', error));

            fetch("/dashboard-section-count")
                .then(response => response.json())
                .then(data => {
                    console.log("Data received from backend:", data);

                    if (!data.labels || !data.data) {
                        console.error("Unexpected data format:", data);
                        return;
                    }

                    const colors = data.data.map(() => {
                        return `hsl(${Math.floor(Math.random() * 360)}, 70%, 70%)`;
                    });

                    new Chart(document.getElementById('sectionCount'), {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Student Count by Section',
                                data: data.data,
                                backgroundColor: colors,
                                borderColor: colors.map(color => color.replace('70%', '50%')),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1,
                                        precision: 0
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
    </body>
    <?php
    if(isset($_GET['accountUpdated'])){
        echo '<script>window.onload = function() { accountUpdated(); }</script>';
    }
    ?>
    @endsection
