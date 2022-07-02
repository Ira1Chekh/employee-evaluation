@extends('layouts.crm')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
            <h1 class="text-3xl font-bold">
                Show Project
            </h1>
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('projects.index') }}">< Back</a>
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                <h3 class="text-2xl font-semibold">{{ $project->name }}</h3>
                <p class="text-base text-gray-700 mt-5">Start date: {{ $project->start_date }}</p>
                <p class="text-base text-gray-700 mt-5">Importance: {{ $project->importance }}</p>
                <p class="text-base text-gray-700 mt-5">Status: {{ $project->status }}</p>
                <p class="text-base text-gray-700 mt-5">Employees: </p>
                <table class="text-base text-gray-700 mt-5">
                    <tr>
                        <th>Full name</th>
                        <th>Correctness</th>
                        <th>Initiative</th>
                        <th>Comment</th>
                    </tr>

                    @foreach($project->projectUsers as $projectUser)
                        <tr>
                            <td>{{ $projectUser->user->full_name }}</td>
                            <td>{{ optional($projectUser->rating)->correctness }}</td>
                            <td>{{ optional($projectUser->rating)->initiative }}</td>
                            <td>{{ optional($projectUser->rating)->comment }}</td>
                        </tr>
{{--                        <p class="text-base text-gray-700 mt-5">{{ $user->full_name }}</p>--}}
                    @endforeach
                </table>

            </div>

            @if($project->isOpen())
            <form action="{{ route('projects.close',$project->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="flex items-center justify-start mt-4 gap-x-2">
                    <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-green-100 bg-green-500 hover:bg-green-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">Close</button>
                </div>
            </form>
            @else
                <a href="{{ route('projects.ratings.create', [$project->id]) }}" class="text-indigo-600 hover:text-indigo-900 text-gray-600">
                   Add rating
                </a>
            @endif

        </div>
    </div>
@endsection
