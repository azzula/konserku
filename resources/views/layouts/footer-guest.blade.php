<!-- Footer -->
<div class="pb-10 px-2">
    <div class="mx-auto">
        <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4">
            <p class="text-center text-xs">
                <span class="font-bold"><a href="{{ route('welcome') }}" class="font-bold text-purple-600 hover:text-purple-800">Siponjay</a></span> &#183; <span class="font-bold"> Code with &#10084; by <a href="https://www.instagram.com/atstsaurie" target="_blank" class="font-bold text-purple-600 hover:text-purple-800">Sufyan</a></span> &#183;

                    {{ ((\Carbon\Carbon::now())->year === 2022 ? "2022" : "2022-".(\Carbon\Carbon::now())->year) }}
            </p>
        </div>
    </div>
</div>
