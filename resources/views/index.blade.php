@extends('layout.main')

@section('content')

	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top"">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="#header"><img src="images/LOGOH.png" alt="alternative" style="width: auto; height:55px"></a> 
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">TRACKER</a>
                    </li>
                @auth
                @role('admin')
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/products">DASHBOARD</a>
                </li>
                @endrole
                                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket" style="margin-right: 8px"></i>Log out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>          
                @endauth
            </ul>
                @guest
                 <span class="nav-item">
                    <a class="btn-outline-sm" href="/login">LOG IN</a>
                </span>
                @endguest
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="text-container">
                            <h1 style="font-weight: bold;">WarrantyTracker</h1>
                            <p class="p-large">Pahami garansi dengan cepat, WarrantyTracker, akses informasi garansi dalam hitungan detik</p>
                            <a class="btn-solid-lg page-scroll" href="#features">MULAI</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6 col-xl-7">
                        <div class="image-container">
                            <div class="img-wrapper">
                                <img class="img-fluid" src="images/header-software-app.png" alt="alternative">
                            </div> <!-- end of img-wrapper -->
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310"><defs><style>.cls-1{fill:#5f4dee;}</style></defs><title>header-frame</title><path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"/></svg>
    <!-- end of header -->

    <section id="features" class="features-area pt-250 pb-265" style="padding-top: 150px; margin-bottom: 150px">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                    <div class="section-title text-center mb-70">
                        <h2  style="font-weight: bold;">WarrantyTracker</h2>
                        @guest
                        <p>Silakan Login/Register untuk memeriksa garansi produk Anda.</p>
                        @endguest
                        @auth
                        <p>Masukan kode produk anda dibawah ini</p>          
                        @endauth
                    </div>
                </div>
            </div>
                <div class="row" style="padding-top: 50px">
                        @auth
                        <div class="col-12">
                            <input type="search" id="query" class="form-control mb-3" placeholder="Masukkan kode product" aria-label="Search" />
                        </div>
                        <div class="card-body" id="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="results">
                                </tbody>
                            </table>
                        </div>                       
                        @endauth
                 </div>
             </section>

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="p-small">Copyright © 2020 <a href="https://inovatik.com">Template by Inovatik</a>
                        </p>
                    </div> <!-- end of col -->
                </div> <!-- enf of row -->
            </div> <!-- end of container -->
        </div> <!-- end of copyright --> 
        
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var resultsContainer = $('#results');
        var delayTimer;
    
        $('#query').on('input', function() {
            clearTimeout(delayTimer); // Menghapus penundaan sebelumnya (jika ada)
    
            delayTimer = setTimeout(function() {
                var query = $('#query').val();
    
                $.ajax({
                    url: "{{ route('product.search') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        var results = '';
    
                        resultsContainer.empty();
    
                        if (query !== '') {
                            $.each(response, function(index, product) {
                                results += '<tr>';
                                results += '<td>' + product.product_name + '</td>';
                                results += '<td>' + product.product_code + '</td>';
                                results += '<td>' + product.description + '</td>';
                                results += '<td>' + product.warranty_start_date + '</td>';
                                results += '<td>' + product.warranty_end_date + '</td>';
                                results += '<td>' + product.warranty_status + '</td>';
                                results += '</tr>';
                            });
                        }
    
                        resultsContainer.html(results);
                    }
                });
            }, 700); // delay
        });
    });
    </script>
@endsection