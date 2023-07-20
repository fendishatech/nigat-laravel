@extends('master.layout') @section('page_title')
    Admin Home
@endsection

@section('page_title')
    Add New Job
@endsection

@section('content')
    <div class="w-full px-10 flex items-center justify-center bg-slate-100">
        <form class="w-full my-8 rounded-lg bg-white" action="{{ url('/jobs') }}" method="POST">
            @csrf
            <h2 class="mt-6 text-2xl text-center text-gray-400 mb-8">
                Add New Job
            </h2>
            <div class="px-12 pb-10">
                {{-- Title --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="title">
                        Title
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                            name="title" value="{{ old('title', $job->title) }}">
                        @if ($errors->has('title'))
                            <span class="text-sm text-red-400">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Company --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="company">
                        Company
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                            name="company" value="{{ old('company', $job->company) }}">
                        @if ($errors->has('company'))
                            <span class="text-sm text-red-400">{{ $errors->first('company') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="description">
                        Description
                    </label>
                    <div class="relative">
                        <textarea class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" name="description">{{ old('description', $job->description) }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-sm text-red-400">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Location --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="location">
                        Location
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                            name="location" value="{{ old('location', $job->location) }}">
                        @if ($errors->has('location'))
                            <span class="text-sm text-red-400">{{ $errors->first('location') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Requirement --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="requirement">
                        Requirement
                    </label>
                    <div class="relative">
                        <textarea class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" name="requirement">{{ old('requirement', $job->requirement) }}</textarea>
                        @if ($errors->has('requirement'))
                            <span class="text-sm text-red-400">{{ $errors->first('requirement') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Employment Type --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="employment_type">
                        Employment Type
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" name="employment_type">
                            <option value="" disabled selected>Select an option</option>
                            <option value="full_time"
                                {{ old('employment_type', $job->employment_type) == 'full_time' ? 'selected' : '' }}>
                                Full-time</option>
                            <option value="part_time"
                                {{ old('employment_type', $job->employment_type) == 'part_time' ? 'selected' : '' }}>
                                Part-time</option>
                            <option value="contract"
                                {{ old('employment_type', $job->employment_type) == 'contract' ? 'selected' : '' }}>
                                Contract
                            </option>
                            <option value="freelance"
                                {{ old('employment_type', $job->employment_type) == 'freelance' ? 'selected' : '' }}>
                                Freelance</option>
                        </select>
                        @if ($errors->has('employment_type'))
                            <span class="text-sm text-red-400">{{ $errors->first('employment_type') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Education --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="education">
                        Education
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                            name="education" value="{{ old('education', $job->education) }}">
                        @if ($errors->has('education'))
                            <span class="text-sm text-red-400">{{ $errors->first('education') }}</span< /div>
                        @endif
                    </div>
                </div>

                {{-- Skills --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="skills">
                        Skills
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                            name="skills" value="{{ old('skills', $job->skills) }}">
                        @if ($errors->has('skills'))
                            <span class="text-sm text-red-400">{{ $errors->first('skills') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Experience Years --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="experience_years">
                        Experience Years
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="number"
                            name="experience_years" value="{{ old('experience_years', $job->experience_years) }}">
                        @if ($errors->has('experience_years'))
                            <span class="text-sm text-red-400">{{ $errors->first('experience_years') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Experience Months --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="experience_months">
                        Experience Months
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="number"
                            name="experience_months" value="{{ old('experience_months', $job->experience_months) }}">
                        @if ($errors->has('experience_months'))
                            <span class="text-sm text-red-400">{{ $errors->first('experience_months') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Salary --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="salary">
                        Salary
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="text"
                            name="salary" value="{{ old('salary', $job->salary) }}">
                        @if ($errors->has('salary'))
                            <span class="text-sm text-red-400">{{ $errors->first('salary') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Deadline --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="deadline">
                        Deadline
                    </label>
                    {{ gettype($job->deadline) }}
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="date"
                            name="deadline" value="{{ old('deadline', $job->deadline) }}">
                        @if ($errors->has('deadline'))
                            <span class="text-sm text-red-400">{{ $errors->first('deadline') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Benefits --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="benefits">
                        Benefits
                    </label>
                    <div class="relative">
                        <textarea class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" name="benefits">{{ old('benefits', $job->benefits) }}</textarea>
                        @if ($errors->has('benefits'))
                            <span class="text-sm text-red-400">{{ $errors->first('benefits') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Contact Email --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="contact_email">
                        Contact Email
                    </label>
                    <div class="relative">
                        <input class="w-full px-4 py-2 pr-8 rounded shadow border border-gray-400" type="email"
                            name="contact_email" value="{{ old('contact_email', $job->contact_email) }}">
                        @if ($errors->has('contact_email'))
                            <span class="text-sm text-red-400">{{ $errors->first('contact_email') }}</span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="w-full py-2 mt-8 rounded-full bg-red-600 text-gray-100 focus:outline-none">
                    Add Job
                </button>
            </div>

        </form>
    </div>
@endsection
