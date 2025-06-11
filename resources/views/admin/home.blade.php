@extends('layouts.Admin.master')

@section('content')



    <!--Container Main start-->

    <div class="container-fluid my-2 pt-5">

        <section>

            <div class="row ">

                <div class="col-md-6 col-lg-3 ">

                    <!-- Card -->
                    <div class="card primary-color white-text">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <p class="h2-responsive font-weight-bold mt-n2 mb-0">{{ $userApplicationCount }}</p>
                                <p class="mb-0 " style="font-weight: 700;"> Applicants</p>
                            </div>
                            <div>
                                <img src="{{ asset('assets/admin/images/teacher (1) 1.svg') }}" alt="Users Photo" class="img-fluid" style="width: 64px; height: auto;">
                            </div>
                        </div>
                        <div class="card-footer"
                            style="background-color: #7A6964; color: white; display: flex; justify-content: space-between; align-items: center; padding: 0 10px;">
                            <span>% change</span>
                            <span class="material-icons">trending_up</span>
                        </div>
                    </div>
                    <!-- Card -->

                </div>

                <div class="col-md-6 col-lg-3 ">

                    <!-- Card -->
                    <div class="card warning-color white-text">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <p class="h2-responsive font-weight-bold mt-n2 mb-0">{{ $examCount }} </p>
                                <p class="mb-0" style="font-weight: 700;"> Exams</p>
                            </div>
                            <div>
                                <img src="{{asset('assets/admin/images/exam (1) 1.svg')}}" alt="Users Photo" class="img-fluid" style="width: 64px; height: auto; ;">

                            </div>
                        </div>
                        <div class="card-footer"
                            style="background-color: #7A6964; color: white; display: flex; justify-content: space-between; align-items: center; padding: 0 10px;">
                            <span>% change</span>
                            <span class="material-icons">trending_up</span>
                        </div>
                    </div>
                    <!-- Card -->

                </div>

                <div class="col-md-6 col-lg-3 ">

                    <!-- Card -->
                    <div class="card light-blue lighten-1 white-text">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <p class="h2-responsive font-weight-bold mt-n2 mb-0">{{ $jobCount }}</p>
                                <p class="mb-0" style="font-weight: 700;">  Jobs </p>
                            </div>
                            <div>
                                <img src="{{ asset('assets/admin/images/building 1.svg') }}" alt="Users Photo" class="img-fluid" style="width: 64px; height: auto; ">


                            </div>
                        </div>
                        <div class="card-footer"
                            style="background-color: #7A6964; color: white; display: flex; justify-content: space-between; align-items: center; padding: 0 10px;">
                            <span>% change</span>
                            <span class="material-icons">trending_up</span>
                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <div class="col-md-6 col-lg-3 ">

                    <!-- Card -->
                    <div class="card  accent-2 white-text">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <p class="h2-responsive font-weight-bold mt-n2 mb-0">{{ $questionCount }}</p>
                                <p class="mb-0" style="font-weight: 700;"> Questions</p>
                            </div>
                            <div>
                                <img src="{{ asset('assets/admin/images/question 1.svg') }}" alt="Users Photo" class="img-fluid" style="width: 64px; height: auto; ">


                            </div>
                        </div>
                        <div class="card-footer"
                            style="background-color: #7A6964; color: white; display: flex; justify-content: space-between; align-items: center; padding: 0 10px;">
                            <span>% change</span>
                            <span class="material-icons">trending_up</span>
                        </div>
                    </div>
                    <!-- Card -->

                </div>

            </div>

        </section>
    </div>
    <div class="container-fluid">
        <div class="table-responsive text-center">
            <table class="table" style="border-collapse: separate; border-spacing: 0; border-radius: 12px; overflow: hidden;">
                <thead style="background-color: #7D6E65; color: #FFFFFF;">
                    <tr>
                        <th style="border-right: 1px solid #FFFFFF; border-top-left-radius: 12px;">Name</th>
                        <th style="border-right: 1px solid #FFFFFF;">Email</th>
                        <th style="border-right: 1px solid #FFFFFF;">Exam Name</th>
                        <th style="border-right: 1px solid #FFFFFF;">Job</th>
                        <th style="border-top-right-radius: 12px;">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                    @foreach($job->exams as $exam)
                        @foreach($exam->userExams as $userExam)
                            <tr>
                                <td>{{ $userExam->user->name }}</td>
                                <td>{{ $userExam->user->email }}</td>
                                <td>{{ $exam->exam_name }}</td>
                                <td>{{ $job->name }}</td>
                                <td>{{ $userExam->score }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>























@endsection
