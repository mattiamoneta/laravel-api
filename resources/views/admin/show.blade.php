@extends('layouts.admin')

@section('page-name')
    Details
@endsection



@section('content')
    @include('layouts.partials.alert')
    <div class="row my-5">
        <div class="col-9 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-8">
                        <div class="card-body py-4">
                            <h2>{{ $project->name }}</h2>
                            <p class="mb-5">{{ $project->description }}</p>


                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('storage/' . $project->thumb) }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-8">
                            <div class="row py-3">
                                <div class="col-3">
                                    <h6 class="text-uppercase fw-bold small">PROJECT TYPE</h6>
                                    <span>{{ $project->type ? $project->type->name : '-' }}</span>
                                </div>
                                <div class="col-9">
                                    <h6 class="text-uppercase fw-bold small">PROJECT TECHNOLOGIES</h6>
                                    @foreach ($project->technologies as $tech)
                                        <span class="badge text-bg-secondary">
                                            {{ $tech->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
