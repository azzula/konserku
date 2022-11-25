<x-jet-dialog-modal wire:model="confirmingAdd">
    <x-slot name="title">
        {{ __('Buat Konser') }}
    </x-slot>

    <x-slot name="content">
        <!-- Nama -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="nama" value="{{ __('Nama Konser') }}" />
            <x-jet-input id="nama" type="text" class="mt-1 block w-full" wire:model.defer="nama" autocomplete="nama" required />
        </div>

        <!-- Penyanyi -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="penyanyi" value="{{ __('Penyanyi') }}" />
            <x-jet-input id="penyanyi" type="text" class="mt-1 block w-full" wire:model.defer="penyanyi" autocomplete="penyanyi" required />
        </div>

        <!-- Tempat -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="tempat" value="{{ __('Tempat Konser') }}" />
            <x-jet-input id="tempat" type="text" class="mt-1 block w-full" wire:model.defer="tempat" autocomplete="tempat" required />
        </div>
        
        <!-- Tanggal -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="tanggal" value="{{ __('Tanggal Konser') }}" />
            <x-jet-input id="tanggal" type="date" class="mt-1 block w-full" wire:model.defer="tanggal" required />
        </div>
        
        <!-- Harga -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="harga" value="{{ __('Harga') }}" />
            <x-jet-input id="harga" type="number" class="mt-1 block w-full" wire:model.defer="harga" required />
        </div>

        <!-- File -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="file" value="{{ __('Gambar') }}" />
            <x-jet-input id="file" type="file" class="mt-1 block w-full" wire:model.defer="file" required />
            <x-jet-label wire:loading wire:target="file" class="mt-1" value="{{ __('Mengunggah..') }}" />
        </div>

        <div class="flex justify-center mt-8">
            <p class="text-sm">
                <b>Periksa kembali data yang Anda masukkan sebelum Anda menekan tombol buat.</b>
            </p>
        </div>
    </x-slot>
            
    <x-slot name="footer">
        <x-jet-secondary-button class="mr-3" wire:click="$set('confirmingAdd', false)" wire:loading.attr="disabled">
            {{ __('Kembali') }}
        </x-jet-secondary-button>
            
        <div wire:loading.remove>
            <x-jet-button class="bg-blue-500 hover:bg-blue-700" wire:click="storeKonser()" wire:loading.attr="disabled">
                {{ __('Buat') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-dialog-modal>
