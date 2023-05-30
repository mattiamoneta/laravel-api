@extends('layouts.admin')

@section('page-name')
    Edit
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card bg-light">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.projects.update', $project) }}">

                        @csrf

                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col">
                                <label for="name" class="form-label fw-bold small">Project Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                            is-invalid
                        @enderror"
                                    id="name" name="name" value="{{ old('name', $project->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="description" class="form-label fw-bold small">Description</label>
                                <input type="text"
                                    class="form-control @error('description')
                            is-invalid
                        @enderror"
                                    id="description" name="description"
                                    value="{{ old('description', $project->description) }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <label for="thumb" class="form-label fw-bold small">Cover Image</label>
                                <input type="file"
                                    class="form-control @error('thumb')
                                is-invalid
                            @enderror"
                                    id="thumb" name="thumb" value="{{ old('thumb', $project->thumb) }}">
                                @error('thumb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="type" class="form-label fw-bold small">Project Type</label>
                                <select
                                    class="form-select @error('type')
                                is-invalid
                            @enderror"
                                    name="type" aria-label="Default select example">
                                    @foreach ($types as $type)
                                        <option @selected(old('type_id', $project->type_id) == '') value="{{ $type->id }}">{{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>





                        <div class="mb-3">
                            <div class="row">
                                <h6 class="mb-3 fw-bold small">Technologies Tags</h6>
                                <div class="col-3">
                                    <div class="row">
                                        @foreach ($technologies as $techItem)
                                            <div class="col-6">
                                                @if ($errors->any())
                                                    <input type="checkbox" id="tech_{{ $techItem->id }}"
                                                        name="technologies[]" value="{{ $techItem->id }}"
                                                        @if (in_array($techItem->id, old('technologies', []))) checked @endif>
                                                @else
                                                    <input type="checkbox" id="tech_{{ $techItem->id }}"
                                                        name="technologies[]" value="{{ $techItem->id }}"
                                                        @if ($project->technologies->contains($techItem->id)) checked @endif>
                                                @endif

                                                <label for="tech_{{ $techItem->id }}">{{ $techItem->name }}</label><br>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('technologies')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="text-end">
                            <button type="submit"
                                class="btn btn-dark rounded-5 text-uppercase small-btn fw-bold px-5 py-2">
                                <i class="fa-solid fa-plus me-2"></i>
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
