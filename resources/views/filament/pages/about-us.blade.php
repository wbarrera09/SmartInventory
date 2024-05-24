<x-filament::page>
    <p class="mb-8 text-justify">{{ $summary }}</p>
    <div class="flex flex-wrap justify-center gap-6">
        @foreach ($developers as $developer)
            <div class="text-center p-2 rounded-lg shadow-md">
                <div class="mb-2">
                    <img src="{{ asset($developer['image']) }}" alt="{{ $developer['name'] }}" style="height: 200px; width: 200px; object-fit: cover;" class="rounded-full mx-auto">
                </div>
                <h2 class="text-lg font-medium mb-1" style="width: 310px; height: 28px;">{{ $developer['name'] }}</h2> <!-- Establecer el ancho y la altura -->
                <p class="text-sm text-gray-500 mb-1">{{ $developer['role'] }}</p>
                <p class="text-sm text-center" style="width: 250px; height: 100px; max-width: 250px; word-wrap: break-word; margin: 8% auto;">{{ $developer['bio'] }}</p> <!-- Ajuste del ancho y alto máximo, alineado a la izquierda, centrado y envolver palabras si es necesario -->
                <div class="flex justify-center mt-2">
                    <a href="https://wa.me/{{ $developer['whatsapp'] }}" class="text-blue-500 hover:underline flex items-center">
                        <img src="{{ asset('images/whatsapp.svg') }}" style="height: 26px; width: 26px; margin-right: 4px;" alt="WhatsApp Icon">
                        <span style="margin: 0 auto;">WhatsApp: {{ $developer['whatsapp'] }}</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @include('filament.pages.footer')

</x-filament::page>
