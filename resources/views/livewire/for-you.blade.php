<x-guest-layout>
    <div class="pt-10 px-2 mb-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4">            
                @include('livewire.includes.buy')

                <h1 class="text-xl">#ForYou</h1>
                <div class="grid grid-cols-1 m-4 md:grid-cols-4">
                @foreach($tiket as $t)
                    <div class="p-4">
                        <div class="mx-auto block rounded-lg shadow-lg bg-transparent hover:bg-blue-500 text-blue-700 hover:text-white border border-blue-500 hover:border-transparent max-w-sm p-4">
                        <img src="/storage/{{ $t->gambar }}" alt="" srcset="" width="20%" class="pb-2">
                        <p>{{ $t->nama }}</p>
                        <p>{{ $t->penyanyi }}</p>
                        <p>{{ $t->tempat }}</p>
                        <p>{{ $t->tanggal }}</p>
                        <p class="pb-2">Rp {{ $t->harga }}</p>
                            <a href="#" wire:click="confirmBuy()">
                                <h5 class="py-5 px-5 md:px-5 md:py-8 lg:px-8 lg:py-4 text-md leading-tight text-center font-medium hover:bg-white hover:text-blue-700 rounded-lg">Pesan</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
