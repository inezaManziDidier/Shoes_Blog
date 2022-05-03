@include('partials.header')
<main>

  <!-- job post company Start -->
  <div class="job-post-company pt-120 pb-120">
    <div class="container">
      <div class="row justify-content-between">
        <!-- Left Content -->
        <div class="col-xl-7 col-lg-8">
          <!-- job single -->
          <div class="single-job-items mb-50">
            <div class="job-items">
              <div class="company-img company-img-details">
                <a href="#"><img src="{{ asset('/img/' . $job->employer->logo) }}" alt="company logo"
                    style="width: 100px; height: 100px;"></a>
              </div>
              <div class="job-tittle">
                <a href="#">
                  <h4>{{ $job->title }}</h4>
                </a>
                <ul>
                  <li>{{ $job->employer->company }}</li>
                  <li><i class="fas fa-map-marker-alt"></i>{{ Str::substr($job->employer->location, 0, 20) }}</li>
                  <li>Positions: {{ $job->positions }}</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- job single End -->

          <div class="job-post-details">
            <div class="post-details1 mb-50">
              <!-- Small Section Tittle -->
              <div class="small-section-tittle">
                <h4>Job Description</h4>
              </div>
              <p>{{ $job->description }}</p>
            </div>
            <div class="post-details2  mb-50">
              <!-- Small Section Tittle -->
              <div class="small-section-tittle">
                <h4>Required Knowledge, Skills, and Abilities</h4>
              </div>
              <ul>
                @foreach ($job->requirement->skills as $skill)
                  <li>{{ $skill }}</li>
                @endforeach
              </ul>
            </div>
            <div class="post-details2  mb-50">
              <!-- Small Section Tittle -->
              <div class="small-section-tittle">
                <h4>Education + Experience</h4>
              </div>
              <ul>
                <li>{{ $job->requirement->education_level }} level of education.</li>
                <li>{{ $job->requirement->experience }} of experience (or more).</li>
              </ul>
            </div>
          </div>

        </div>
        <!-- Right Content -->
        <div class="col-xl-4 col-lg-4">
          <div class="post-details3  mb-50">
            <!-- Small Section Tittle -->
            <div class="small-section-tittle">
              <h4>Job Overview</h4>
            </div>
            <ul>
              <li>Posted date : <span>{{ $job->created_at->toDateString() }}</span></li>
              <li>Location : <span>{{ Str::substr($job->employer->location, 0, 20) }}</span></li>
              <li>Positions : <span>{{ $job->positions }}</span></li>
              <li>Job nature : <span>{{ $job->requirement->contract_type }}</span></li>
              {{-- <li>Salary : <span>$7,800 yearly</span></li> --}}
              <li>Application deadline : <span>{{ $job->deadline }}</span></li>
            </ul>
            <div class="apply-btn2" @if (auth()->guard('employer')->check()) style="display: none;" @endif>
              <a href="{{ route('jobs.application-form', $job->id) }}" class="btn">Apply Now</a>
            </div>
          </div>
          <div class="post-details4  mb-50">
            <!-- Small Section Tittle -->
            <div class="small-section-tittle">
              <h4>Company Information</h4>
            </div>
            <span>{{ $job->employer->name }}</span>
            <p>{{ $job->employer->description }}</p>
            <ul>
              <li>Name: <span>{{ $job->employer->company }}</span></li>
              <li>Web : <span> demo.example.com</span></li>
              <li>Email: <span>{{ $job->employer->email }}</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- job post company End -->

</main>
@include('partials.footer')
