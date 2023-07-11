@extends('master.layout') @section('page_title')
    Admin Home
@endsection

@section('page_title')
    Edit user Detail
@endsection

@section('content')
    <div class="w-full px-10 flex items-center justify-center bg-slate-100">
        <form class="w-full my-8 rounded-lg bg-white" action="{{ url('/users/' . $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <h2 class="mt-6 text-2xl text-center text-gray-400 mb-8">
                Edit user Detail
            </h2>
            <div class="px-12 pb-10">
                {{-- first_name || last_name --}}
                <div class="mb-4 flex items-center gap-6">
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-bold mb-2" for="store_name">
                            First Name
                        </label>
                        <div class="relative">
                            <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                                name="first_name" min="1" value="{{ old('first_name', $user->first_name) }}">
                            @if ($errors->has('first_name'))
                                <span class="text-sm text-red-400">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class=" w-1/2">
                        <label class="block text-gray-700 font-bold mb-2" for="store_name">
                            Last Name
                        </label>
                        <div class="relative">
                            <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                                name="last_name" min="1" value="{{ old('last_name', $user->last_name) }}">
                            @if ($errors->has('last_name'))
                                <span class="text-sm text-red-400">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- email || phone_no --}}
                <div class="mb-4 flex items-center gap-6">
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-bold mb-2" for="store_name">
                            Email
                        </label>
                        <div class="relative">
                            <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                                name="email" min="1" value="{{ old('email', $user->email) }}">
                            @if ($errors->has('email'))
                                <span class="text-sm text-red-400">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700 font-bold mb-2" for="store_name">
                            Phone No
                        </label>
                        <div class="relative">
                            <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                                name="phone_no" min="1" value="{{ old('phone_no', $user->phone_no) }}">
                            @if ($errors->has('phone_no'))
                                <span class="text-sm text-red-400">{{ $errors->first('phone_no') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- Userrole --}}
                <div class="mb-4 flex items-start gap-6">

                    <div class="w-1/2">
                        <label class="block text-gray-700 font-bold mb-2" for="item_id">
                            User Role
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                id="item_id" name="user_role">
                                <option value="user" {{ old('user_role', $user->user_role) == 'user' ? 'selected' : '' }}>
                                    User</option>
                                <option value="admin"
                                    {{ old('user_role', $user->user_role) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                            </select>
                        </div>
                    </div>

                </div>
                {{-- User role --}}

                <button type="submit" class="w-full py-2 mt-8 rounded-full bg-red-600 text-gray-100 focus:outline-none">
                    Edit User
                </button>
            </div>
        </form>
    </div>
@endsection
