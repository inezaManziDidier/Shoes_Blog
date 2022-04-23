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
                <a href="#"><img src="{{ asset('/img/icon/job-list1.png') }}" alt=""></a>
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
                <li>System Software Development</li>
                <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                <li>Research and code , libraries, APIs and frameworks</li>
                <li>Strong knowledge on software development life cycle</li>
                <li>Strong problem solving and debugging skills</li>
              </ul>
            </div>
            <div class="post-details2  mb-50">
              <!-- Small Section Tittle -->
              <div class="small-section-tittle">
                <h4>Education + Experience</h4>
              </div>
              <ul>
                <li>{{ $job->requirement->education_level }} level of education</li>
                <li>{{ $job->requirement->experience }} or more years of experience</li>
                <li>Ecommerce website design experience</li>
                <li>Familiarity with mobile and web apps preferred</li>
                <li>Experience using Invision a plus</li>
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
              <li>Salary : <span>$7,800 yearly</span></li>
              <li>Application deadline : <span>{{ $job->deadline }}</span></li>
            </ul>
            <div class="apply-btn2">
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
