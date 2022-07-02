@extends('layouts.crm')

@section('content')

    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
            <h1 class="text-3xl font-bold">
                Add New Rating
            </h1>
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('projects.show', [$project->id]) }}">< Back</a>
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <div class="flex flex-col">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    @if ($errors->any())
                        <div class="p-3 rounded bg-red-500 text-white m-3">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                        <form action="{{ route('projects.ratings.store', [$project->id]) }}" method="POST">
                            @csrf

                            <div class="mt-4">
                                <label class="block text-sm font-bold text-gray-700" for="name">Project: {{$project->name}}</label>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-bold text-gray-700" for="user_id">Employees:</label>
                                <select name="user_id"
                                        id="user_id"
                                        class="form-select"
                                >
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">
                                            {{ $employee->first_name.' '.$employee->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-bold text-gray-700" for="user_id">Correctness:</label>
                                <input type="number" id="correctness" name="correctness" min="1" max="10">
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-bold text-gray-700" for="user_id">Initiative:</label>
                                <input type="number" id="initiative" name="initiative" min="1" max="10">
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-bold text-gray-700" for="name">Comment</label>
                                <input type="text" name="comment" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="flex items-center justify-start mt-4 gap-x-2">
                                <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-green-100 bg-green-500 hover:bg-green-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
