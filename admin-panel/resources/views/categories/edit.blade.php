@extends('master.layout') @section('page_title')
    Admin Home
@endsection

@section('page_title')
    Edit Category Detail
@endsection

@section('content')
    <div class="w-full px-10 flex items-center justify-center bg-slate-100">
        <form class="w-full my-8 rounded-lg bg-white" action="{{ url('/categories/' . $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <h2 class="mt-6 text-2xl text-center text-gray-400 mb-8">
                Edit Category Detail
            </h2>
            <div class="px-12 pb-10">
                {{-- name --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="name">
                        Category Name
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                            name="name" value="{{ old('name', $category->name) }}">
                        @if ($errors->has('name'))
                            <span class="text-sm text-red-400">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="w-full py-2 mt-8 rounded-full bg-red-600 text-gray-100 focus:outline-none">
                    Add Category
                </button>
            </div>
        </form>
    </div>
@endsection
