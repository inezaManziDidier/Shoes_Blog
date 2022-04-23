@include('partials.header')
<main>
  <!-- Search Box -->
  <div class="container">
    <div class="row mt-4 mb-4">
      <div class="col-xl-4">
        <a href="{{ route('employers.create-job') }}" class="btn post-btn mt-2">Post a job</a>
      </div>
      <div class="col-xl-8">
        <!-- form -->
        <form action="{{ route('jobs.search') }}" method="POST" id="search-form" class="search-box">
          @csrf
          <div class="input-form">
            <input name="by_keyword" type="text" placeholder="Job Tittle or keyword">
          </div>
          <div class="select-form">
            <div class="select-itms">
              <select name="by_company" id="select1">
                @foreach ($jobs as $job)
                  <option value="{{ $job->employer->company }}">{{ $job->employer->company }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="search-form">
            <a onclick="document.getElementById('search-form').submit();">Search job</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Search Box End -->

  <!-- Our Services Start -->
  <div class="our-services">
    <div class="container">
      <h2 class="text-center text-primary mb-4">Browse Top Categories </h2>
      <div class="row d-flex justify-contnet-center">
        @foreach ($categories as $category)
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <div class="single-services text-center mb-30">
              <div class="services-ion">
                <span class="flaticon-tour"></span>
              </div>
              <div class="services-cap">
                <h5><a href="{{ route('jobs.listing', ['category' => $category->name]) }}">{{ $category->name }}</a>
                </h5>
                <span>({{ count($category->jobs) }})</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- Our Services End -->

  {{-- <a href="#" class="border-btn2 border-btn4">Upload your cv</a> --}}

  <!-- Featured_job_start -->
  <section class="featured-job-area">
    <div class="container">
      <!-- Section Tittle -->
      <h2 class="text-center text-primary">Featured Jobs</h2>
      <div class="row">
        <div class="col-lg-12">
        </div>
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
                    <li><i class="fas fa-map-marker-alt"></i>{{ Str::substr($job->employer->location, 0, 20) }}</li>
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
</main>
@include('partials.footer')
