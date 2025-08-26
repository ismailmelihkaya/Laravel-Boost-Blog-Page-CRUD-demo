<x-layouts.app :title="'Create Post'">
  <h1 class="text-2xl font-semibold mb-4">Create Post</h1>
  <form action="{{ route('posts.store') }}" method="POST" class="space-y-4 max-w-2xl">
    @csrf
    <div>
      <label class="block text-sm mb-1">Title</label>
      <input type="text" name="title" value="{{ old('title') }}" required class="w-full border border-[#e3e3e0] rounded-sm px-3 py-2 focus:outline-none focus:border-[#19140035]">
      @error('title')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
    </div>
    <div>
      <label class="block text-sm mb-1">Body</label>
      <textarea name="body" rows="8" required class="w-full border border-[#e3e3e0] rounded-sm px-3 py-2 focus:outline-none focus:border-[#19140035]">{{ old('body') }}</textarea>
      @error('body')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
    </div>
    <div class="flex items-center gap-2">
      <button type="submit" class="px-4 py-2 bg-[#1b1b18] text-white rounded-sm hover:bg-black">Save</button>
      <a href="{{ route('posts.index') }}" class="px-4 py-2 border border-[#e3e3e0] rounded-sm hover:border-[#19140035]">Cancel</a>
    </div>
  </form>
</x-layouts.app>


