@extends('layouts.crm')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
            <h1 class="text-3xl font-bold">
                Show Employee
            </h1>
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('users.index') }}">< Back</a>
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                <h3 class="text-2xl font-semibold">{{ $user->full_name }}</h3>
                <p class="text-base text-gray-700 mt-5">Role: {{ $user->role }}</p>
                <p class="text-base text-gray-700 mt-5">Start date: {{$user->start_date->format('d.m.Y')}}</p>
                <p class="text-base text-gray-700 mt-5">Email: {{ $user->email }}</p>
                <p class="text-base text-gray-700 mt-5">Avg initiative: {{ $user->ratings_avg_initiative }}</p>
                <p class="text-base text-gray-700 mt-5">Avg correctness: {{ $user->ratings_avg_correctness }}</p>

                <p class="text-base text-gray-700 mt-5">Ratings: </p>
                <table class="text-base text-gray-700 mt-5">
                    <tr>
                        <th>Project name</th>
                        <th>Correctness</th>
                        <th>Initiative</th>
                        <th>Comment</th>
                    </tr>

                    @foreach($user->ratings as $rating)
                        <tr>
                            <td>{{ $rating->projectUser->project->name }}</td>
                            <td>{{ $rating->correctness }}</td>
                            <td>{{ $rating->initiative }}</td>
                            <td>{{ $rating->comment }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>

        </div>
    </div>
@endsection
