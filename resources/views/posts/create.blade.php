<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
            <form method="POST" action="/admin/posts">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Título
                    </label>

                    <input type="text" class="border border-gray-400 p-2w w-full" name="title" id="title"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Slug
                    </label>

                    <input type="text" class="border border-gray-400 p-2w w-full" name="slug" id="slug"
                        value="{{ old('slug') }}" required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Extracto
                    </label>
                    <textarea name="excerpt" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="" required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror


                </div>

                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Contenido
                    </label>

                    <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="" required>{{ old('body') }}</textarea>
                    @error('body')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Categoría
                    </label>

                    <select name="category_id" id="category">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <x-submit-button>Publicar</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
