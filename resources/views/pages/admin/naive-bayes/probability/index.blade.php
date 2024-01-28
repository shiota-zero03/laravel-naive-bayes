@extends('theme.layout')
@section('title', 'Probabilitas')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="border py-3 px-md-5 px-2 mb-4">
            <h5 class="m-0">Menu / Naive Bayes / Probabilitas</h5>
        </div>
    </div>
    <div class="col-12 order-1 order-lg-2 mb-4 mb-lg-0">
        <a href="{{route('admin.probability.store')}}" class="btn btn-primary d-flex align-items-center justify-content-center w-100"><i class="bx bx-calculator me-3"></i>Hitung Probabilitas</a>
        <br>
        <div class="card py-2 px-3">
            <div style="min-height: 50vh" class="text-center px-md-5">
                <div class="row g-4 mt-2">
                    <div class="col-12 mb-3">
                        <div class="text-center text-uppercase">
                            <h4><strong>Probabilitas Label Kelas</strong></h4>
                        </div>
                        @include('pages.admin.naive-bayes.probability.label-kelas')
                    </div>
                    <div class="col-12">
                        <div class="text-center text-uppercase">
                            <h4 class="mb-0"><strong>Probabilitas Atribut Diskrit</strong></h4>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 mb-3">
                        
                        @include('pages.admin.naive-bayes.probability.jenis-kelamin')
                        @include('pages.admin.naive-bayes.probability.jurusan')
                        @include('pages.admin.naive-bayes.probability.question')
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#naive-bayes').addClass('open')
        $('#probability').addClass('active')
    </script>
@endsection