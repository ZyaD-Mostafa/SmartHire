@extends('layouts.Admin.master')
@section('content')

<form method="POST" action="{{ route('admin.update.job') }}" id="addUserForm"  dir="ltr">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $job->id }}">
  <div class="row mt-5">
      <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
              <div class="form-group m-1">
                  <input type="text" value="{{ $job->name }}" name="name" class="w-100 border-1 form-control" placeholder="Job Title" id="addUserName" required>
              </div>
          </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-pattern">
            <div class="form-group m-1">
                <input type="text" value="{{ $job->major }}" name="major" class="w-100 border-1 form-control" placeholder="Major" id="addUserName" required>

            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-pattern">
            <div class="form-group m-1">
                <input type="text" value="{{ $job->location }}" name="location" class="w-100 border-1 form-control" placeholder="Location" id="addUserName" required>

            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-pattern">
            <div class="form-group m-1">
            <select name="duration" class="w-100 border-1 form-control" id="selectDuration">
                <option value="{{$job->duration}}"  >{{$job->duration}}</option>
                <option value="full_time">Full-time</option>
                <option value="part_time">Part-time</option>
            </select>
            </div>
        </div>
    </div>



      <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
              <div class="form-group m-1">
                <select name="is_available" class="w-100 border-1 form-control" id="addUserName">
                    <option value='NULL' {{ $job->is_available === NULL ? 'selected':'' }}>Available</option>
                    <option value="0" {{ $job->is_available == 0 ? 'selected':'' }}>No</option>
                    <option value="1" {{ $job->is_available == 1 ? 'selected':'' }}>Yes</option>

                </select>

              </div>
          </div>
      </div>




      <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
              <div class="form-group m-1">
                  <input type="text" value="{{ $job->exam_count }}" name="exam_count" class="w-100 border-1 form-control" placeholder="Total Exams" id="addUserJob" required>
              </div>
          </div>
      </div>

      {{-- <div class="col-xl-3 col-md-6">
        <div class="card bg-pattern">
            <div class="form-group m-1">
                <input type="file" class="w-100 border-1 form-control" name="image" placeholder="Upload Image" id="addUserImage" accept="image/*" required>
            </div>
        </div>
    </div>
--}}




      <div class="col-xl-3 col-md-6">
          <div class="card bg-pattern">
              <div class="form-group m-1">
                  <button class="btn w-100" type="submit">Update</button>
              </div>
          </div>
      </div>
  </div>
</form>



@endsection
