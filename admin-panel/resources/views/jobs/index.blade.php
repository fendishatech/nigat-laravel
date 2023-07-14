@extends('master.layout') @section('page_title')
    Admin Home
@endsection

@section('page_title')
    Jobs List
@endsection

@section('content')
    <div class="px-6 my-8">
        <div class="w-full flex flex-col items-center overflow-auto">
            <div class=" overflow-x-auto border-b border-gray-200 shadow">
                @if (Session::has('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p class="font-bold">Success</p>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <div class="w-full p-6 flex justify-between items-center">
                    <h1 class="text-xl font-bold text-red-600">Jobs List</h1>
                    <a class="px-6 py-2 text-xl bg-red-300 rounded-md text-white font-semibold hover:bg-red-600"
                        href="{{ url('/jobs/create') }}">Add New Job</a>
                </div>
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="overflow-x-auto border-b border-gray-200 shadow">
                            <table class="divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-2 text-xs text-gray-500">ID</th>
                                        <th class="px-6 py-2 text-xs text-gray-500">First Name</th>
                                        <th class="px-6 py-2 text-xs text-gray-500">Last Name</th>
                                        <th class="px-6 py-2 text-xs text-gray-500">Role</th>
                                        <th class="px-6 py-2 text-xs text-gray-500">Edit</th>
                                        <th class="px-6 py-2 text-xs text-gray-500">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-300">

                                    @foreach ($jobs as $job)
                                        <tr class="whitespace-nowrap">
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">
                                                    {{ $job->first_name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-500">
                                                    {{ $job->last_name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $job->job_role }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ url('/jobs/' . $job->id . '/edit') }}"
                                                    class="px-4 py-1 text-sm text-indigo-600 bg-indigo-200 rounded-full">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ url('/jobs/' . $job->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
