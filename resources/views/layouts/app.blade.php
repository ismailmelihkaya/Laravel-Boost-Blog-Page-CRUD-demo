<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
      <script src="https://cdn.tailwindcss.com"></script>
    @endif
  </head>
  <body class="min-h-screen bg-[#FDFDFC] text-[#1b1b18]">
    <header class="border-b border-[#e3e3e0] bg-white">
      <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('posts.index') }}" class="text-xl font-semibold">Blog</a>
        <nav class="flex items-center gap-2">
          <a href="{{ route('posts.index') }}" class="px-3 py-1.5 border border-transparent hover:border-[#19140035] rounded-sm">Posts</a>
          <a href="{{ route('posts.create') }}" class="px-3 py-1.5 bg-[#1b1b18] text-white rounded-sm hover:bg-black">New Post</a>
        </nav>
      </div>
    </header>
    <main class="max-w-5xl mx-auto px-4 py-8">
      {{ $slot }}
    </main>
  </body>
  </html>


