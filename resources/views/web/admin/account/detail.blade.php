@extends('layout.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <livewire:dashboard.card.user-detail-card :user="$user" />
            <!-- end row -->

            <livewire:dashboard.form.user-detail-form :user="$user" />
            <!-- end page title -->

        </div>
        <!-- container -->
    </div>
@endsection
