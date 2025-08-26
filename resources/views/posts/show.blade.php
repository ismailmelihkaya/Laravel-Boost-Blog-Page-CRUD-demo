<x-layouts.app :title="$post->title">
  <div class="flex items-center justify-between mb-4">
    <a href="{{ route('posts.index') }}" class="underline underline-offset-4">← Back</a>
    <div class="flex items-center gap-2">
      <a href="{{ route('posts.edit', $post) }}" class="px-3 py-1.5 border border-[#e3e3e0] rounded-sm hover:border-[#19140035]">Edit</a>
      <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-3 py-1.5 border border-[#e3e3e0] rounded-sm hover:border-[#19140035]">Delete</button>
      </form>
    </div>
  </div>
  <h1 class="text-3xl font-semibold mb-2">{{ $post->title }}</h1>
  <p class="text-sm text-[#706f6c] mb-6">Created {{ $post->created_at->diffForHumans() }}, updated {{ $post->updated_at->diffForHumans() }}</p>
  <article class="prose max-w-none">
    {!! nl2br(e($post->body)) !!}
  </article>
</x-layouts.app>


