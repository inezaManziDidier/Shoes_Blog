@include('partials.header')
<!-- Featured_job_start -->
<section class="featured-job-area">
  <div class="container">
    <!-- Section Tittle -->
    <div class="mt-4" style="display: flex; justify-content: space-between;width:80%;margin:auto;">
      <h4 class="text-dark">Search results for keyword <span
          class="text-primary"><small>{{ $keyword }}</small></span></h4>
      <h4>{{ count($jobs) }} jobs found</h4>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-10">
        @foreach ($jobs as $job)
          <!-- single-job-content -->
          <div class="single-job-items mb-30">
            <div class="job-items">
              <div class="company-img">
                <a href="{{ route('jobs.show', $job->id) }}"><img
                    src="{{ asset('/img/icon/job-list1.png') }}" alt=""></a>
              </div>
              <div class="job-tittle">
                <a href="{{ route('jobs.show', $job->id) }}">
                  <h4>{{ $job->title }}</h4>
                </a>
                <ul>
                  <li>{{ $job->employer->company }}</li>
                  <li><i class="fas fa-map-marker-alt"></i>{{ Str::substr($job->employer->location, 0, 15) }}</li>
                  <li>positions: {{ $job->positions }}</li>
                </ul>
              </div>
            </div>
            <div class="items-link f-right">
              <a href="{{ route('jobs.show', $job->id) }}">{{ $job->requirement->contract_type }}</a>
              <span>{{ $job->created_at->diffForHumans() }}</span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- Featured_job_end -->
@include('partials.footer')
