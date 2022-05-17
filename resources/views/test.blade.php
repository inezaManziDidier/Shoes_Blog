<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>
<form method="POST" action="/test" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
        <small style="margin-left: 4px;"><b>Attach your CV<b></small><br>
        @error('cv')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="file" class="form-control" id="cv" name="cv" >
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Attach other files (if any)<b></small><br>
        @error('other-files')
          <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="file" class="form-control" id="other-files" name="other-files[]" multiple>
        {{-- <small style="margin-left: 4px;">maximun 2 files</small> --}}
      </div>
      <button type="submit">submit</button>
</form>
</body>
</html>