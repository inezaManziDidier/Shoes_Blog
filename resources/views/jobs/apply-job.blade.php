@include('partials.header')

<div style="width:70%;margin:auto;background: #eee;" class="p-4 mt-4">
  <div style="width:85%;margin:auto;">
    <h3 class="text-center">Fill application form</h3>
    <hr>
    @if (session()->has('message'))
      <div class="alert alert-success text-center">
        {{ session('message') }}
      </div>
    @endif
    <form action="{{ route('jobs.apply', $job->id) }}" method="POST" accept-charset="utf-8"
      enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Job<b></small><br>
        <input type="text" class="form-control" id="job" name="job"
          value="{{ $job->title }}">
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          @error('firstname')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          <input type="text" class="form-control" id="firstname" name="firstname"
            placeholder="First name" value="{{ old('firstname') }}" required>
        </div>
        @error('lastname')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="form-group col-md-6">
          <input type="text" class="form-control" id="lastname" name="lastname"
            placeholder="Last name" value="{{ old('lastname') }}" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          @error('email')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          <input type="email" class="form-control" id="email" name="email"
            placeholder="Email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group col-md-6">
          @error('phone')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          <input type="number" class="form-control" id="phone" name="phone"
            placeholder="Phone" value="{{ old('phone') }}" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          @error('nationality')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          <small style="margin-left: 4px;"><b>Nationality<b></small>
          <input type="text" class="form-control" id="nationality" name="nationality"
            placeholder="Nationality" value="{{ old('nationality') }}" required>
        </div>
        <div class="form-group col-md-6">
          <small style="margin-left: 4px;"><b>Gender<b></small><br>
          <select class="form-control" id="gender" name="gender">
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
          </select><br><br>
        </div>
      </div>
      <div class="form-group">
        @error('cvTitle')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="text" class="form-control" id="cvTitle" name="cvTitle"
          placeholder="CV Title" value="{{ old('cvTitle') }}" required>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Attach your CV<b></small><br>
        @error('cv')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="file" class="form-control" id="cv" name="cv" required>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Attach other files (if any)<b></small><br>
        @error('other-files')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="file" class="form-control" id="other-files" name="other-files[]" multiple>
        {{-- <small style="margin-left: 4px;">maximun 2 files</small> --}}
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <small style="margin-left: 4px;"><b>Highest degree<b></small><br>
          <select class="form-control" id="education" name="education">
            <option value="Diploma" {{ old('education') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
            <option value="Bachelor" {{ old('education') == 'Bachelor' ? 'selected' : '' }}>Bachelor</option>
            <option value="Masters" {{ old('education') == 'Masters' ? 'selected' : '' }}>Masters</option>
            <option value="PhD" {{ old('education') == 'PhD' ? 'selected' : '' }}>PhD</option>
          </select><br><br>
        </div>
        <div class="form-group col-md-6">
          <small style="margin-left: 4px;"><b>Experience<b></small><br>
          <select class="form-control" id="experience" name="experience">
            <option value="No experience" {{ old('experience') == 'No experience' ? 'selected' : '' }}>No experience
            </option>
            <option value="1 year" {{ old('experience') == '1 year' ? 'selected' : '' }}>1 year</option>
            <option value="2 years" {{ old('experience') == '2 years' ? 'selected' : '' }}>2 years</option>
            <option value="3 years" {{ old('experience') == '3 years' ? 'selected' : '' }}>3 years</option>
            <option value="4 years" {{ old('experience') == '4 years' ? 'selected' : '' }}>4 years</option>
            <option value="5 or more years" {{ old('experience') == '5 or more years' ? 'selected' : '' }}>5 or more
              years
            </option>
          </select><br><br>
        </div>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="skills" cols="10" rows="5" placeholder=" skills"
          required>{{ old('skills') }}</textarea>
      </div>
      <div class="form-group">
        <button type="submit" id="payBtn" class="btn btn-sm"
          @if (auth()->guard('employer')->check()) disabled title="Login as normal user to apply" @endif>Apply</button>
      </div>
    </form>
  </div>
</div>

@include('partials.footer')
