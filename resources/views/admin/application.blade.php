@extends('layouts.Admin.master')

@section('content')


<div class="container-fluid">
    <div class="table-responsive text-center">
        <table class="table" style="border-collapse: separate; border-spacing: 0; border-radius: 12px; overflow: hidden;">
            <thead style="background-color: #7D6E65; color: #FFFFFF;">
                <tr>
                    <th style="border-right: 1px solid #FFFFFF;">Job Title</th>
                    <th style="border-right: 1px solid #FFFFFF;">Name</th>
                    <th style="border-right: 1px solid #FFFFFF;">Email</th>
                    <th style="border-right: 1px solid #FFFFFF;">Phones</th>
                    <th style="border-right: 1px solid #FFFFFF;">National ID</th>
                    <th style="border-right: 1px solid #FFFFFF;">Date of birth</th>
                    <th style="border-right: 1px solid #FFFFFF;">Address</th>
                    <th style="border-right: 1px solid #FFFFFF;">Graduation Year</th>
                    <th style="border-right: 1px solid #FFFFFF;">Degree</th>
                    <th style="border-right: 1px solid #FFFFFF;">University</th>
                    <th style="border-right: 1px solid #FFFFFF;">CV</th>





                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $app )
                <tr>
                    <td>{{ $app->job->name }}</td>
                    <td>{{ $app->name }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->phone }} / {{ $app->sec_phone }}</td>
                    <td>{{ $app->national_id }}</td>
                    <td>{{ $app->dob }}</td>
                    <td>{{ $app->address }}</td>
                    <td>{{ $app->grad_year }}</td>
                    <td>{{ $app->degree }}</td>
                    <td>{{ $app->university }}</td>
                    <td>
                        @if ($app->cv_path)
                        <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank" class="btn btn-primary" style="width: 5rem">View CV</a>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>





@endsection
