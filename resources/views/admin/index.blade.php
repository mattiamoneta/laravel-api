@extends('layouts.admin')

@section('page-name')
    Portfolio
@endsection


@section('content')
    <div class="row justify-content-center">
        @include('layouts.partials.alert')
        @foreach ($projects as $project)
            <div class="col-3">
                <div class="card my-5 text-center" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $project->thumb) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="post">
                            <a class="btn btn-dark btn-sm rounded-4 px-3"
                                href="{{ route('admin.projects.show', $project->slug) }}"><i
                                    class="fa-solid fa-magnifying-glass me-2"></i>Show</a>
                            <a class="btn btn-dark btn-sm rounded-4 px-3"
                                href="{{ route('admin.projects.edit', $project) }}"><i
                                    class="fa-solid fa-file-pen me-2"></i>Edit</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-4"
                                onclick="return confirm('Are you sure to delete?');"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
