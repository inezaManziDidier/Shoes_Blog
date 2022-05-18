
@extends('layouts.admin_dashboard')
@section('content')
          <!-- Content Row -->
          <div class="row">
            <!--Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        CURRENT MONTH APPLICATIONS
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{empty($current_applications) ? 0 : count($current_applications)}}
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="{{ route('reports.index.pdf', ['month' => 'current']) }}" class="btn btn-sm btn-primary">Export to pdf</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        APPLICATIONS OF <b style="text-uppercase">{{$previous_month}} {{$year}}</b>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{empty($current1_applications) ? 0 : count($current1_applications)}}
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="{{ route('reports.index.pdf', ['month' => 'current-1']) }}" class="btn btn-sm btn-primary">Export to pdf</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card Example -->
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div
                        class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        APPLICATIONS OF <b style="text-uppercase">{{$previous_month2}} {{$year}}</b>
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div
                            class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            {{empty($current2_applications) ? 0 : count($current2_applications)}}
                          </div>
                        </div>
                        <div class="col">
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="{{ route('reports.index.pdf', ['month' => 'current-2']) }}" class="btn btn-sm btn-primary">Export to pdf</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
