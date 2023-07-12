@extends('master.layout') @section('page_title')
    Admin Home
@endsection

@section('page_title')
    Add New Blog
@endsection

@section('head_links')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
@endsection

@section('content')
    <div class="w-full px-10 flex items-center justify-center bg-slate-100">
        <form class="w-full my-8 rounded-lg bg-white" action="{{ url('/blogs') }}" method="POST">
            @csrf
            <h2 class="mt-6 text-2xl text-center text-gray-400 mb-8">
                Add New Blog
            </h2>
            <div class="px-12 pb-10">
                {{-- Title --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="title">
                        Title
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                            name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="text-sm text-red-400">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Content --}}
                <div id="editor" style=height: 200px></div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="content">
                        Content
                    </label>
                    <div class="relative">
                        <textarea class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" name="content" rows="8">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="text-sm text-red-400">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Published At --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="published_at">
                        Published At
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="datetime-local"
                            name="published_at" value="{{ old('published_at') }}">
                        @if ($errors->has('published_at'))
                            <span class="text-sm text-red-400">{{ $errors->first('published_at') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Category --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="category_id">
                        Category
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="text-sm text-red-400">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                </div>

                {{-- User --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="user_id">
                        User
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <span class="text-sm text-red-400">{{ $errors->first('user_id') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Is Featured --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="is_featured">
                        Is Featured
                    </label>
                    <div class="relative">
                        <input type="checkbox" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                        @if ($errors->has('is_featured'))
                            <span class="text-sm text-red-400">{{ $errors->first('is_featured') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Blog Post
                    </button>
                </div>

                <button type="submit" class="w-full py-2 mt-8 rounded-full bg-red-600 text-gray-100 focus:outline-none">
                    Add Blog
                </button>
            </div>
        </form>
    </div>
@endsection

@section('script_section')
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
@endsection
