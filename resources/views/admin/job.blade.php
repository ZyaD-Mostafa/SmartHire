@extends('layouts.Admin.master')

@section('content')

<div class="content mt-4 pt-4">
    <div class="dash-nav d-flex flex-column flex-md-row align-items-center employee mb-3 mt-3">
        <div class="buttons mt-md-0 w-100 fs-4">
          <button type="button" class="btn btn-sm w-100" onclick="toggleAddForm()">
              <i class="fas fa-plus" style="color: #302927; margin-right: 8px;"></i> Add Job
          </button>

        </div>
    </div>
    <form method="POST" action="{{ route('admin.create.job') }}" id="addUserForm" style="display: none;" dir="ltr">
        @csrf
      <div class="row mt-5">
          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="name" class="w-100 border-1 form-control" placeholder="Job Title" id="addUserName" required>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="form-group m-1">
                    <input type="text" name="major" class="w-100 border-1 form-control" placeholder="Major" id="addUserName" required>

                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="form-group m-1">
                    <input type="text" name="location" class="w-100 border-1 form-control" placeholder="Location" id="addUserName" required>

                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="form-group m-1">
                    <input type="text" name="duration" class="w-100 border-1 form-control" placeholder="duration" id="addUserName" required>

                </div>
            </div>
        </div>



          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                    <select name="is_available" class="w-100 border-1 form-control" id="addUserName">
                        <option value="yes">Available</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>

                    </select>

                  </div>
              </div>
          </div>




          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="exam_count" class="w-100 border-1 form-control" placeholder="Total Exams" id="addUserJob" required>
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
                      <button class="btn w-100" type="submit">Create</button>
                  </div>
              </div>
          </div>
      </div>
  </form>
  <div class="container-fluid">
      <div class="table-responsive text-center">
          <table class="table" style="border-collapse: separate; border-spacing: 0; border-radius: 12px; overflow: hidden;">
              <thead style="background-color: #7D6E65; color: #FFFFFF;">
                  <tr>
                      <th style="border-right: 1px solid #FFFFFF;">Job</th>
                      <th style="border-right: 1px solid #FFFFFF;">Major</th>
                      <th style="border-right: 1px solid #FFFFFF;">Location</th>
                      <th style="border-right: 1px solid #FFFFFF;">Duration</th>
                      <th style="border-right: 1px solid #FFFFFF;">Available</th>
                      <th style="border-right: 1px solid #FFFFFF;">Total Exams</th>
                      <th style="border-right: 1px solid #FFFFFF;" colspan=2>Action</th>



                  </tr>
              </thead>
              <tbody>
                @foreach ($jobs  as  $job)
                <tr>
                    <td>{{ $job->name }}</td>
                    <td>{{ $job->major }}</td>
                    <td>{{ $job->location }}</td>
                    <td>{{ $job->duration }}</td>
                    <td>{{ $job->is_available }}</td>
                    <td>{{ $job->exam_count }}</td>
                    <td>
                        <a href="{{ route('admin.edit.job',$job->id) }}" class="btn btn-primary mb-1" style="width: 5rem">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.delete.job',$job->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="width: 5rem">Delete</button>

                        </form>

                    </td>
                </tr>
                @endforeach

              </tbody>
          </table>
      </div>
  </div>




@endsection
