<x-layouts.app :title="'Posts'">
  @if (session('status'))
    <div class="mb-4 p-3 rounded-sm text-sm bg-[#fff2f2] border border-[#e3e3e0]">
      {{ session('status') }}
    </div>
  @endif

  <div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-semibold">Posts</h1>
    <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-[#1b1b18] text-white rounded-sm hover:bg-black">Create Post</a>
  </div>

  <div class="overflow-x-auto bg-white border border-[#e3e3e0] rounded-sm">
    <table class="w-full text-sm">
      <thead class="bg-[#FDFDFC]">
        <tr class="text-left">
          <th class="px-4 py-3 border-b border-[#e3e3e0]">Title</th>
          <th class="px-4 py-3 border-b border-[#e3e3e0]">Created</th>
          <th class="px-4 py-3 border-b border-[#e3e3e0] w-40">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($posts as $post)
          <tr class="hover:bg-[#f9f9f8]">
            <td class="px-4 py-3">
              <a class="underline underline-offset-4 text-[#f53003]" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </td>
            <td class="px-4 py-3 text-[#706f6c]">{{ $post->created_at->diffForHumans() }}</td>
            <td class="px-4 py-3">
              <div class="flex items-center gap-2">
                <a href="{{ route('posts.edit', $post) }}" class="px-3 py-1.5 border border-[#e3e3e0] rounded-sm hover:border-[#19140035]">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="px-3 py-1.5 border border-[#e3e3e0] rounded-sm hover:border-[#19140035]">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="px-4 py-6 text-center text-[#706f6c]">No posts yet</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $posts->links() }}
  </div>
</x-layouts.app>


