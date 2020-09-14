@extends('_layouts.base')

@section('judulawal') 
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(../img/bg-img/fekon.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Sijadwal</h2>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('menupengumuman') 
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pengumuman</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-12 col-xl-8">
<div class="post-details-content bg-white mb-30 p-30 box-shadow">
    <?php
      $split1    = explode('-',  $berita->dari);
      $tgl_indo1 = $split1[2] . ' ' . $bulan[ (int)$split1[1] ] . ' ' . $split1[0];  
    ?>    
    <div class="blog-content">
        <div class="post-meta">
            <a href="#"><b>{{$tgl_indo1}}</b></a>
            <a href=""><b>By Akademik - FEB</b></a>
        </div>
        <h4 class=""><b>Pengumuman</b></h4>
        <!-- Post Meta -->

        <p style="text-align: justify; color:#000; white-space: pre-wrap; ">
            {!! $berita->isi !!} 
        </p>

    </div>
</div>
</div>
@endsection




@section('content2') 
<div class="col-12 col-md-6 col-lg-5 col-xl-4">
    <div class="sidebar-area bg-white mb-30 box-shadow">
        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget p-30" style="padding: 30px 30px 0px 30px !important;">
            <!-- Social Followers Info -->
            <div class="social-followers-info">
                <!-- Facebook -->
                <a href="https://www.facebook.com/bemfebulm" class="facebook-fans"><i class="fa fa-facebook"></i> FEB - UNLAM </a>
                <!-- Twitter -->
                <a href="https://twitter.com/febunlam?lang=en" class="twitter-followers"><i class="fa fa-twitter"></i> FEB - UNLAM</a>
                <a href="https://www.instagram.com/febulm/" class="instagram-followers"><i class="fa fa-instagram"></i> FEB - UNLAM</a>
            </div>
        </div>

        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget">
            <center><a href="#" class="add-img"><img src="img/core-img/logoulm.png" alt="" style="width: 260px; margin-top: 20px;margin-bottom: 20px;"></a></center>
        </div>

    </div>
</div>
@endsection
