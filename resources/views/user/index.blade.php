@extends('layouts.crm')

@section('content')

    <div class="max-w-4xl mx-auto mt-8">

        <div class="mb-4">
            <h1 class="text-3xl font-bold text-center">
                Employees
            </h1>
        </div>

        <div class="flex flex-col mt-10">
            <div class="flex flex-col">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    @if ($message = Session::get('success'))
                        <div class="p-3 rounded bg-green-500 text-green-100 mb-4 m-3">
                            <span>{{ $message }}</span>
                        </div>
                    @endif

                    <table class="min-w-full">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Id</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Full name</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Role</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Start date</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Avg rating</th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50" width="180px">Action</th>
                        </tr>
                        <tbody class="bg-white">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 whitespace-no-wrap border-b border-gray-200">{{ $user->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->full_name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->role }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->start_date->format('d.m.Y') }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                        <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('users.show', [$user->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
