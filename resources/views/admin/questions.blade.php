@extends('layouts.Admin.master')

@section('content')

<div class="container-fluid my-2 pt-5">
    <section>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 mt-2">
                <form id="viewQuestionsForm" action="{{ route('admin.view.questions') }}">
                    @csrf
                    <div class="card bg-pattern mb-3">
                        <div class="form-group m-1 text-center">
                            <select id="addUserStatus" name="exam" class="form-control" required>
                                <option value="">Select Exam</option>
                                @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div onclick="document.getElementById('viewQuestionsForm').submit()">
                        <div class="card card-warning white-text">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <p class="mb-0">VIEW Questions</p>
                                <i class="fas fa-eye fa-4x text-black-40"></i>
                            </div>
                            <div class="card-footer">
                                <span>.</span>
                                <span class="material-icons"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6 col-lg-6 add-question-card" onclick="window.location.href='{{ route('admin.add.question') }}'">
                <div class="card primary-color white-text">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <p class="mb-0">ADD Questions</p>
                        <i class="fas fa-plus fa-4x text-black-40"></i>
                    </div>
                    <div class="card-footer">
                        <span>.</span>
                        <span class="material-icons"></span>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection
