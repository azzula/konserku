<x-jet-dialog-modal wire:model="confirmingBuy">
    <x-slot name="title">
        {{ __('Beli Tiket') }}
    </x-slot>

    <x-slot name="content">
        <!-- Nama -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="nama" value="{{ __('Nama') }}" />
            <x-jet-input id="nama" type="text" class="mt-1 block w-full" wire:model.defer="nama" autocomplete="nama" required />
        </div>

        <!-- Jenis Kelamin -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="jenis_kelamin" value="{{ __('Jenis Kelamin') }}" />
            <select id="jenis_kelamin" class="py-2 px-3 mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="jenis_kelamin" wire:model.defer="jenis_kelamin" required>
                <option value=""></option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <!-- Telepon -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="phone" value="{{ __('Telepon') }}" />
            <x-jet-input id="phone" type="number" class="mt-1 block w-full" wire:model.defer="phone" autocomplete="phone" required />
        </div>
        
        <!-- Tanggal Lahir -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
            <x-jet-input id="tanggal_lahir" type="date" class="mt-1 block w-full" wire:model.defer="tanggal_lahir" required />
        </div>

        <div class="flex justify-center mt-8">
            <p class="text-sm">
                <b>Periksa kembali data yang Anda masukkan sebelum Anda menekan tombol buat.</b>
            </p>
        </div>
    </x-slot>
            
    <x-slot name="footer">
        <x-jet-secondary-button class="mr-3" wire:click="$set('confirmingBuy', false)" wire:loading.attr="disabled">
            {{ __('Kembali') }}
        </x-jet-secondary-button>
            
        <div wire:loading.remove>
            <x-jet-button class="bg-blue-500 hover:bg-blue-700" wire:click="storeBuy()" wire:loading.attr="disabled">
                {{ __('Buat') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-dialog-modal>
