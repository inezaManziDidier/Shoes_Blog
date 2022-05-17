
@extends('layouts.admin_dashboard')
@section('content')
          <!-- Content Row -->
          <div class="row">
            <div style="width:90%;margin:auto;background: #eee;" class="p-4 mt-4">
              <div style="width:100%;margin:auto;">
                <h3 class="lead text-center"><b>JOBS</b></h3><hr>
                <table class="table table-bordered table-hover text-center">
                  <thead>
                  	<th class="text-center">Employer</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Positions</th>
                    <th class="text-center">Deadline</th>
                    <th class="text-center">Applicants</th>
                  </thead>
                  <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                      <td class="text-center text-primary">{{$job->employer->company}}</td>
                      <td class="text-center">{{$job->title}}</td>
                      <td class="text-center">{{$job->positions}}</td>
                      <td class="text-center">{{$job->deadline}}</td>
                      <td class="text-center text-primary">{{count($job->applicants)}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <td></td>
                      <!-- <td></td> -->
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
