@extends('layouts.admin')
@section('content')
    @include('partials.session_message')
    <h2 class="mt-3">Questa è la lista dei progetti</h2>
    <div class="text-end">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Nuovo progetto</a>
    </div>
    <div class="container">
        <table class="table table-compact table-sm">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Slug</th>

                    <th scope="col">Azioni</th>
                    <th scope="col">Tech</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->title }}</th>
                        <td>{{ $project->type?->name }}</td>

                        <td>{{ $project->number }}</td>

                        <td>{{ $project->slug }}</td>

                        <td>
                            <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            @if ($project->technology->isNotEmpty())
                                <p class="card-text">{{ $project->technology->first()->name }}</p>
                            @else
                                <p class="card-text">n/a</p>
                            @endif

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
