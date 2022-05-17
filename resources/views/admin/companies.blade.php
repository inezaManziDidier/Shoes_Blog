
@extends('layouts.admin_dashboard')
@section('content')
          <!-- Content Row -->
          <div class="row">
            <div style="width:90%;margin:auto;background: #eee;" class="p-4 mt-4">
              <div style="width:100%;margin:auto;">
                <h3 class="lead text-center"><b>COMPANIES</b></h3><hr>
                <table class="table table-bordered table-hover text-center">
                  <thead>
                  	<th class="text-center">Name</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Jobs</th>
                  </thead>
                  <tbody>
                    @foreach ($companies as $company)
                    <tr>
                      <td class="text-center text-primary">{{$company->company}}</td>
                      <td class="text-center">{{$company->location}}</td>
                      <td class="text-center">{{$company->email}}</td>
                      <td class="text-center text-primary">{{count($company->jobs)}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
@endsection
