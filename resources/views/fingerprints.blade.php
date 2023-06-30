@extends('default.dashboardLayout')

@section('content')

<!-- Content Header (Page header) -->
<x-page-header pageTitle="Fingerprints" />
<!-- /.content-header -->

<div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="card-tools">
                  <a href="#" title="Export CSV" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>UserAgent</th>
                    <th>Browser</th>
                    <th>Languages (in use)</th>
                    <th>Device configuration</th>
                    <th>Usage period</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($fingerprints as $fingerprint)
                  <tr>
                    <td>{{ $fingerprint->useragent }}</td>
                    <td>{{ $fingerprint->browsername }}</td>
                    <td>{{ $fingerprint->languages }} <strong>({{ $fingerprint->selected_language }})</strong></td>
                    <td>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th style="width:50%">Cookies:</th>
                              <td>@if($fingerprint->cookies == 1) active @else not active @endif</td>
                            </tr>
                            <tr>
                              <th>Connection type</th>
                              <td>{{ $fingerprint->connection_type }}</td>
                            </tr>
                            <tr>
                              <th>CPU (RAM)</th>
                              <td>{{ $fingerprint->processorcores }} ({{ $fingerprint->ram_memory }}GB)</td>
                            </tr>
                            <tr>
                              <th>Screen</th>
                              <td>{{ $fingerprint->screenW }}X{{ $fingerprint->screenH }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </td>
                    <td>{{ $fingerprint->created_at }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              {{ $fingerprints->links('pagination.custom') }}
            </div>
        </div>
    </div>
  </div>
</div>
@endsection