@extends('default.dashboardLayout')

@section('content')

<!-- Content Header (Page header) -->
<x-page-header pageTitle="Parameters" />
<!-- /.content-header -->

<div class="content">
      <div class="container">
        <div class="row">
        <div class="col-md-12">

        @if(session()->has('message'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session()->get('message') }}.
            </div>
        @endif

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="Website logo">
                </div>

                <h3 class="profile-username text-center">{{ $website->name }}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <span class="float-right">{{ $website->email }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>Created</b> <span class="float-right">{{ $website->created_at }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>Password</b> <span class="float-right">************</span>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-lg-11" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
                        <strong><i class="fas fa-book mr-2"></i>API KEY</strong>
                    @if(!$api_key)
                        <form action="{{ route('generate_api_key') }}" method="post" class="col-lg-11" style="display: flex; justify-content: center; ">
                            @csrf
                            <input type="text" class="ml-2 col-lg-11 form-control" placeholder="***************" name="api_key">
                            <input type="submit" class="btn btn-primary" value="generate">
                        </form>
                    @else
                        <div class="col-lg-11" style="display: flex; justify-content: center; ">
                            <div class="ml-2 col-lg-12 form-control">
                                {{ $api_key->value }}
                            </div>
                        </div> 
                    @endif
                </div><br>

                @if(!$api_key)
                    <p class="text-muted">
                    For first use, generate an API Key to use in our CDN.
                    </p>
                @else
                    <p class="text-muted">
                        You have already generated an API_KEY. <br>
                        <a href="#">Contact</a> the administrator to change your key. <br>

                        Copy this and paste in your website before "body" closing tab.
                        <pre>
                            <code id="snippet">
                                                                
                            </code>
                        </pre>
                    </p>
                @endif
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@endsection
