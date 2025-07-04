@extends('layout.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Woodman</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Waiting to Confirm!</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Waiting to Confirm!</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <livewire:dashboard.table.payment-table type="waiting" />
            </div>
        </div>
        <!-- container -->
    </div>
@endsection
