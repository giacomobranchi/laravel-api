@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <h1>ADMIN/PROJECTS/CREATE.BLADE</h1>
        <h2 class="fs-4 text-secondary my-4">
            {{ __('New Project Page for') }} {{ Auth::user()->name }}.
        </h2>

        <div class="row justify-content-center my-3">
            <div class="col">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label for="title" class="form-label"><strong>Title</strong></label>

                        <input type="text" class="form-control" name="title" id="title"
                            aria-describedby="helpTitle" placeholder="New project Title">

                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label"><strong>Type</strong></label>
                        <select class="form-select @error('type_id') is-invalid  @enderror" name="type_id" id="type_id">
                            <option selected disabled>Select a type</option>
                            <option value="">Uncategorized</option>

                            @forelse ($types as $type)
                                <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="technologies" class="form-label"><strong>Technologies</strong></label>
                        <select multiple class="form-select" name="technologies[]" id="technologies">
                            <option disabled>Select one</option>

                            @foreach ($technologies as $technology)
                                <option value="{{ $technology->id }}"
                                    {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                                    {{ $technology->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>
                    @error('technologies')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">

                        <label for="content" class="form-label"><strong>Description</strong></label>

                        <textarea class="form-control" name="content" id="content" aria-describedby="helpTitle" cols="30" rows="5"
                            placeholder="New project Description"></textarea>

                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="github" class="form-label"><strong>Project</strong></label>

                        <input type="text" class="form-control" name="github" id="github"
                            aria-describedby="helpgithub" placeholder="New project Code">

                        @error('github')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="Website" class="form-label"><strong>Description</strong></label>

                        <input type="text" class="form-control" name="website" id="website"
                            aria-describedby="helpwebsite" placeholder="New project Website">

                        @error('Website')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label for="cover_image" class="form-label"><strong>Choose a Thumbnail image file</strong></label>

                        <input type="file" class="form-control" name="cover_image" id="cover_image"
                            placeholder="Upload a new image file..." aria-describedby="fileHelpThumb">

                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-success my-3"><i class="fa-solid fa-floppy-disk"></i>
                        Save</button>
                    <a class="btn btn-primary" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-ban"></i>
                        Cancel</a>

                </form>
            </div>
        </div>

    </div>
@endsection
