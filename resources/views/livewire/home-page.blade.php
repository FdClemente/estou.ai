@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ optional($settings)->{'tagline_'.$locale} ?? __('strings.tagline_default') }}</title>
    <!-- Tailwind CSS via CDN for rapid prototyping -->
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="antialiased text-gray-900">
    <!-- Language selector -->
    <div class="fixed top-4 right-4 z-50">
        <select wire:model="locale" class="p-2 border border-gray-300 rounded">
            <option value="pt">{{ __('strings.portuguese') }}</option>
            <option value="en">{{ __('strings.english') }}</option>
        </select>
    </div>

    <!-- Hero section -->
<<<<<<< HEAD
    <section id="hero" class="relative overflow-hidden pt-28 pb-28 md:pt-40 md:pb-32 text-white bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-400">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="relative inline-block mb-8">
                <!-- Glowing ring behind avatar -->
                <span class="absolute inset-0 rounded-full bg-white opacity-30 blur-xl"></span>
                <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="relative z-10 w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white shadow-xl" />
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 drop-shadow-md">
                {{ optional($settings)->{'tagline_'.$locale} ?? __('strings.tagline_default') }}
            </h1>
            <p class="max-w-2xl mx-auto text-lg md:text-xl opacity-90 mb-10">
                {{ optional($biography)->{'biography_'.$locale} ?? '' }}
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#projects" class="px-6 py-3 rounded-full bg-white/20 backdrop-blur-md hover:bg-white/30 transition text-white font-medium">
                    {{ __('strings.projects') }}
                </a>
                <a href="#contact" class="px-6 py-3 rounded-full bg-white text-blue-600 hover:bg-gray-100 transition font-medium">
                    {{ __('strings.contact') }}
                </a>
            </div>
        </div>
        <!-- Decorative gradient background shapes -->
        <div class="absolute -top-24 -left-1/2 w-full h-full transform scale-150 rotate-12 bg-gradient-to-tr from-white/20 to-white/5 rounded-full blur-3xl"></div>
    </section>

    <!-- About section -->
    <section id="about" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center text-gray-800">{{ __('strings.about') }}</h2>
            <div class="max-w-3xl mx-auto text-gray-700 leading-relaxed text-lg">
=======
    <section id="hero" class="pt-24 pb-16 md:pt-32 md:pb-24 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-32 h-32 md:w-40 md:h-40 rounded-full mx-auto mb-6 shadow-lg" />
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4">
                {{ optional($settings)->{'tagline_'.$locale} ?? __('strings.tagline_default') }}
            </h1>
            <p class="max-w-2xl mx-auto text-gray-600 mb-8">
                {{ optional($biography)->{'biography_'.$locale} ?? '' }}
            </p>
            <div class="flex justify-center space-x-4">
                <a href="#projects" class="px-5 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">{{ __('strings.projects') }}</a>
                <a href="#contact" class="px-5 py-3 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition">{{ __('strings.contact') }}</a>
            </div>
        </div>
    </section>

    <!-- About section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center">{{ __('strings.about') }}</h2>
            <div class="max-w-3xl mx-auto text-gray-700 leading-relaxed">
>>>>>>> e56cb76 (Initial portfolio commit)
                {!! nl2br(e(optional($biography)->{'biography_'.$locale} ?? '')) !!}
            </div>
        </div>
    </section>

    <!-- Skills section -->
<<<<<<< HEAD
    <section id="skills" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center text-gray-800">{{ __('strings.skills') }}</h2>
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($skills as $skill)
                    <div class="p-8 rounded-2xl shadow-lg bg-gradient-to-br from-gray-50 to-white border border-gray-200 flex flex-col items-start backdrop-blur-md">
                        @if ($skill->icon)
                            <div class="w-12 h-12 flex items-center justify-center rounded-full mb-4 text-white"
                                 style="background-image: linear-gradient(135deg, #6366f1 0%, #3b82f6 100%);">
                                <i class="{{ $skill->icon }}"></i>
                            </div>
                        @endif
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $skill->{'name_'.$locale} }}</h3>
=======
    <section id="skills" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center">{{ __('strings.skills') }}</h2>
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($skills as $skill)
                    <div class="p-6 bg-white rounded-lg shadow flex flex-col items-start">
                        @if ($skill->icon)
                            <div class="text-4xl text-blue-600 mb-3">
                                <i class="{{ $skill->icon }}"></i>
                            </div>
                        @endif
                        <h3 class="text-xl font-semibold mb-2">{{ $skill->{'name_'.$locale} }}</h3>
>>>>>>> e56cb76 (Initial portfolio commit)
                        @if ($skill->{'description_'.$locale})
                            <p class="text-gray-600">{{ $skill->{'description_'.$locale} }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects section -->
<<<<<<< HEAD
    <section id="projects" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center text-gray-800">{{ __('strings.projects') }}</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->{'title_'.$locale} }}" class="w-full h-48 object-cover transform group-hover:scale-105 transition duration-500" />
                        @endif
                        <div class="p-6 bg-white flex-1 flex flex-col">
                            <h3 class="text-xl font-semibold mb-1 text-gray-800">{{ $project->{'title_'.$locale} }}</h3>
=======
    <section id="projects" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center">{{ __('strings.projects') }}</h2>
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <div class="rounded-lg shadow bg-gray-50 overflow-hidden flex flex-col">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->{'title_'.$locale} }}" class="w-full h-48 object-cover" />
                        @endif
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="text-lg font-semibold mb-1">{{ $project->{'title_'.$locale} }}</h3>
>>>>>>> e56cb76 (Initial portfolio commit)
                            @if ($project->date)
                                <p class="text-sm text-gray-500 mb-2">{{ Carbon::parse($project->date)->translatedFormat('F Y') }}</p>
                            @endif
                            <p class="text-gray-700 flex-1">{{ Str::limit($project->{'description_'.$locale}, 100) }}</p>
                            @if ($project->link)
<<<<<<< HEAD
                                <a href="{{ $project->link }}" target="_blank" class="mt-4 inline-block text-purple-600 hover:text-purple-800 font-medium">{{ __('strings.view_more') }}</a>
                            @endif
                        </div>
                        <!-- subtle gradient border effect -->
                        <span class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover:border-purple-500 transition duration-500"></span>
=======
                                <a href="{{ $project->link }}" target="_blank" class="mt-4 inline-block text-blue-600 hover:underline">{{ __('strings.view_more') }}</a>
                            @endif
                        </div>
>>>>>>> e56cb76 (Initial portfolio commit)
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials section -->
<<<<<<< HEAD
    <section id="testimonials" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center text-gray-800">{{ __('strings.testimonials') }}</h2>
            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($testimonials as $testimonial)
                    <div class="p-8 bg-gray-50 rounded-2xl shadow-lg relative flex flex-col">
=======
    <section id="testimonials" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center">{{ __('strings.testimonials') }}</h2>
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($testimonials as $testimonial)
                    <div class="p-6 bg-white rounded-lg shadow">
>>>>>>> e56cb76 (Initial portfolio commit)
                        <div class="flex items-center mb-4">
                            @if ($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full object-cover mr-3" />
                            @endif
                            <div>
<<<<<<< HEAD
                                <h4 class="font-semibold text-gray-800">{{ $testimonial->name }}</h4>
=======
                                <h4 class="font-semibold">{{ $testimonial->name }}</h4>
>>>>>>> e56cb76 (Initial portfolio commit)
                                @if ($testimonial->position)
                                    <p class="text-sm text-gray-500">{{ $testimonial->position }}</p>
                                @endif
                            </div>
                        </div>
<<<<<<< HEAD
                        <p class="italic text-gray-700 flex-1">"{{ $testimonial->{'comment_'.$locale} }}"</p>
                        <!-- quote icon -->
                        <svg class="absolute top-4 right-4 w-6 h-6 text-purple-500 opacity-40" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.17 6A5.17 5.17 0 0 0 2 11.17V12h5.17V6Zm9.66 0A5.17 5.17 0 0 0 11.66 11.17V12h5.17V6Z" />
                        </svg>
=======
                        <p class="italic text-gray-700">"{{ $testimonial->{'comment_'.$locale} }}"</p>
>>>>>>> e56cb76 (Initial portfolio commit)
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact section -->
<<<<<<< HEAD
    <section id="contact" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center text-gray-800">{{ __('strings.contact') }}</h2>
=======
    <section id="contact" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center">{{ __('strings.contact') }}</h2>
>>>>>>> e56cb76 (Initial portfolio commit)
            <div class="max-w-xl mx-auto">
                @if ($successMessage)
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ $successMessage }}
                    </div>
                @endif
                @if ($errorMessage)
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        {{ $errorMessage }}
                    </div>
                @endif
<<<<<<< HEAD
                <form wire:submit.prevent="submit" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-700" for="name">{{ __('strings.name') }}</label>
                        <input wire:model.defer="name" id="name" type="text" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-700" for="email">{{ __('strings.email') }}</label>
                        <input wire:model.defer="email" id="email" type="email" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                        @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-700" for="message">{{ __('strings.message') }}</label>
                        <textarea wire:model.defer="message" id="message" rows="5" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                        @error('message') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-8 py-3 rounded-full text-white font-medium bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 transition">
=======
                <form wire:submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1" for="name">{{ __('strings.name') }}</label>
                        <input wire:model.defer="name" id="name" type="text" class="w-full border border-gray-300 rounded p-2" />
                        @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="email">{{ __('strings.email') }}</label>
                        <input wire:model.defer="email" id="email" type="email" class="w-full border border-gray-300 rounded p-2" />
                        @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="message">{{ __('strings.message') }}</label>
                        <textarea wire:model.defer="message" id="message" rows="5" class="w-full border border-gray-300 rounded p-2"></textarea>
                        @error('message') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
>>>>>>> e56cb76 (Initial portfolio commit)
                            {{ __('strings.send_message') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @livewireScripts
</body>
</html>