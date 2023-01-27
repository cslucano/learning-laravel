@auth
    <x-panel>
        <Form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{ auth()->user()->id }}" alt="" width="40" height="40"
                    class="rounded-full">
                <h2 class="ml-4">Desea participar?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                    placeholder="Ahora, piensa algo rápido que decir!" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 pt-6">
                <x-submit-button>
                    Enviar
                </x-submit-button>
            </div>
        </Form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Regístrese</a> o <a href="/login" class="hover:underline">ingrese</a>
        para dejar un comentario.
    </p>
@endauth
