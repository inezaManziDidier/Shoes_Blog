@include('partials.header')
<div style="width:90%;margin:auto;background: #fef;" class="p-4 mt-4">
  <div style="width:90%;margin:auto;">
    <h4 class="text-center">{{$employer->company}} - POSTED JOBS <span class="badge badge-pill badge-info">{{count($jobs)}}</span></h4>
    <hr>
    
        @if (!empty($jobs))
          <div class="row">
            <div class="col-md-4">
              <img src="{{ asset('img/' . $employer->logo) }}" alt="company logo" style="width: 90%; height: 90%;">
            </div>
            <div class="col-md-8">
              <table class="table table-bordered table-hover text-center">
                  <thead>
                    <th class="text-center">Title</th>
                    <th class="text-center">Positions</th>
                    <th class="text-center">Application Deadline</th>
                    <th class="text-center">Applicants</th>
                  </thead>
                  <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                      <td class="text-center">{{$job->title}}</td>
                      <td class="text-center">{{$job->positions}}</td>
                      <td class="text-center">{{$job->deadline}}</td>
                      <td class="text-center text-primary"><a href="{{route('employer.jobs.applicants',$job->id)}}" class="text-primary"><u>{{count($job->applicants)}}</u></a></td>
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
          <hr>
        @else
          <p class="jumbotron text-center">
            No jobs found for {{$employer->company}}.
          </p>
        @endif
      </div>
    </div>
@include('partials.footer')
