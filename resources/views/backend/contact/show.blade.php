@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new user')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>
                Contact form
                <small>Contact me please</small>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li> <a href="{{route('contact.show')}}">Contact</a></li>
                <li class="active">Add new</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @if(session('message'))
                <div class="alert alert-info">
                    {{session('message')}}
                </div>
            @endif

            <div class="row">
                {!! Form::model(
                [
                'method'=>'POST',
                'route' =>'contact.show',
                'files' => TRUE,
                'id' => 'contact-form'
                ]) 
                !!}

            @include('backend.contact.form')

                {!! Form::close() !!}

            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection




