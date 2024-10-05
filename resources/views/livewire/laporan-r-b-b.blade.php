<div class="w-full max-w-3xl">
    <form action="{{ url()->current() }}" method="get" class="flex space-x-4">
        <div class="w-full max-w-xs p-2">
            <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
            <select id="bulan" name="month" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500">
                @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ $i == date('n') ? 'selected' : '' }}>
                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                </option>
                @endfor
                <!-- Add other months as needed -->
            </select>
        </div>

        <div class="w-full max-w-xs p-2">
            <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
            <select id="tahun" name="year" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500">
                @for ($i = 2024; $i <= date('Y'); $i++)
                <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>
                    {{ $i }}
                </option>
                @endfor
            </select>
        </div>

        <div class="w-full max-w-xs" style="padding-top:32px !important;padding-left:4px !important;">
            <button type="submit" style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" type="button" wire:loading.attr="disabled">
                <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->    <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
              <path d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z"></path>
            </svg>            
                <span class="fi-btn-label">
                    Generate
                </span>
            </button>
        </div>
    </form>

    <!-- Optional: Display success message -->
    <div id="successMessage" class="mt-4 text-green-600 hidden"></div>

    @push('scripts')
    <script>
        window.addEventListener('formSubmitted', event => {
            document.getElementById('successMessage').innerText = 'Data saved successfully!';
            document.getElementById('successMessage').classList.remove('hidden');
        });
    </script>
    @endpush
</div>