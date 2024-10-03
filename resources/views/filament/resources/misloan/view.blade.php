<x-filament-panels::page @class([
    'fi-resource-view-record-page',
    'fi-resource-' . str_replace('/', '-', $this->getResource()::getSlug()),
    'fi-resource-record-' . $record->getKey(),
])>
    <div class="bg-white rounded-lg border shadow-md p-4 transition-transform duration-300 w-full">
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 border-b border-gray-900">
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        NO REKENING
                    </div>
                    <div class="p-4">
                        {{ $record->NOMOR_REKENING }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        NAMA DEBITUR
                    </div>
                    <div class="p-4 text-gray-900">
                        {{ $record->NAMA_NASABAH }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        ALAMAT
                    </div>
                    <div class="p-4">
                        {{ $record->ALAMAT}}
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 border-b border-gray-900">
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        PLAFOND
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($record->PLAFOND_AWAL,2) }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        TANGGAL CAIR | JTH TEMPO
                    </div>
                    <div class="p-4">
                        {{ date('d-m-Y', strtotime($record->TGL_AWAL_FAS)) }} |
                        
                        {{ date('d-m-Y', strtotime($record->TGL_AKHIR_FAS)) }}
                    </div>
                </div>
            </div>

            
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        JANGKA WAKTU | BUNGA
                    </div>
                    <div class="p-4">
                        {{ $record->JANGKA_WAKTU }} Bln | {{ number_format($record->BGA/12, 2)}}%
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 border-b border-gray-900">
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        BAKI DEBET 
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($record->POKOK_PINJAMAN,2) }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        TUNGGAKAN POKOK
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($record->TUNGGAKAN_POKOK,2) }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        TUNGGAKAN BUNGA
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($record->TUNGGAKAN_BUNGA,2) }}
                    </div>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        KOLEKTIBILITAS
                    </div>
                    <div class="p-4">
                        @switch($record->KODE_KOLEK)
                            @case(1)
                                <p>1 - Lancar</p>
                                @break
                            @case(2)
                                <p>2 - Dalam Perhatian Khusus</p>
                                @break
                            @case(3)
                                <p>3 - Kurang Lancar</p>
                                @break
                            @case(4)
                                <p>4 - Diragukan</p>
                                @break
                            @case(5)
                                <p>5 - Macet</p>
                                @break
                            @default
                                <p>Nilai kolektibilitas tidak valid.</p>
                        @endswitch
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        ANGSURAN
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($record->ANGSURAN_TOTAL,2) }}
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1">
                    <div class="p-4 font-semibold">
                        TITIPAN EFEKTIF
                    </div>
                    <div class="p-4">
                        Rp. {{ number_format($record->TITIPA_EF,2) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg border shadow-md p-4 transition-transform duration-300 w-full">
        
    
<!-- Tabs -->
<div
x-data="{
    selectedId: null,
    init() {
        // Set the first available tab on the page on page load.
        this.$nextTick(() => this.select(this.$id('tab', 1)))
    },
    select(id) {
        this.selectedId = id
    },
    isSelected(id) {
        return this.selectedId === id
    },
    whichChild(el, parent) {
        return Array.from(parent.children).indexOf(el) + 1
    }
}"
x-id="['tab']"
>
<!-- Tab List -->
<ul
    x-ref="tablist"
    @keydown.right.prevent.stop="$focus.wrap().next()"
    @keydown.home.prevent.stop="$focus.first()"
    @keydown.page-up.prevent.stop="$focus.first()"
    @keydown.left.prevent.stop="$focus.wrap().prev()"
    @keydown.end.prevent.stop="$focus.last()"
    @keydown.page-down.prevent.stop="$focus.last()"
    role="tablist"
    class="-mb-px flex items-stretch"
>
<!-- Tab -->
    <li>
        <button
            :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
            @click="select($el.id)"
            @mousedown.prevent
            @focus="select($el.id)"
            type="button"
            :tabindex="isSelected($el.id) ? 0 : -1"
            :aria-selected="isSelected($el.id)"
            :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
            class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5"
            role="tab"
        >Alamat</button>
    </li>

    <li>
        <button
            :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
            @click="select($el.id)"
            @mousedown.prevent
            @focus="select($el.id)"
            type="button"
            :tabindex="isSelected($el.id) ? 0 : -1"
            :aria-selected="isSelected($el.id)"
            :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
            class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5"
            role="tab"
        >Histori</button>
    </li>
</ul>

<!-- Panels -->
<div role="tabpanels" class="">
<!-- Panel -->
    <section
        x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
        role="tabpanel"
        class="p-8"
    >
    <div class="grid grid-cols-2 sm:grid-cols-2 gap-4 border-b border-gray-900">
        <div>
            <div class="grid grid-cols-1">
                <div class="p-4 font-semibold">
                    ALAMAT LENGKAP
                </div>
                <div class="p-4">
                    {{ $record->ALAMAT }} {{ $record->KELURAHAN }} {{ $record->KECAMATAN }}
                </div>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <div>
            <div class="grid grid-cols-1">
                <div class="p-4 font-semibold">
                    TEMPAT BEKERJA
                </div>
                <div class="p-4">
                    {{ $record->TEMPAT_BEKERJA }}
                </div>
            </div>
        </div>

        <div>
            <div class="grid grid-cols-1">
                <div class="p-4 font-semibold">
                    NOMOR TELPON
                </div>
                <div class="p-4 text-gray-900">
                    {{ $record->NO_HP }}
                </div>
            </div>
        </div>

        <div>
            <div class="grid grid-cols-1">
                <div class="p-4 font-semibold">
                    PETUGAS AO
                </div>
                <div class="p-4 text-gray-900">
                    {{ $record->AO }}
                </div>
            </div>
        </div>
    </div>
</section>

<section
    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
    role="tabpanel"
    class="p-8"
>
    <h2 class="text-xl font-bold">Tab 2 Content</h2>
    <p class="mt-2 text-gray-500">Fugiat odit alias, eaque optio quas nobis minima reiciendis voluptate dolorem nisi facere debitis ea laboriosam vitae omnis ut voluptatum eos. Fugiat?</p>
    <button class="mt-5 rounded-md border border-gray-200 px-4 py-2 text-sm">Something else focusable</button>
</section>
</div>
</div>


    </div>

    <div class="fi-ac gap-3 flex flex-wrap items-center justify-start">
        <a href="{{ route('filament.admin.resources.mis-loans.index') }}"
           class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-gray fi-btn-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 fi-ac-btn-action">Back</a>

           <a href="{{ route('filament.admin.surat-panggilan', ['id' => $record->id]) }}" style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-btn-action" target="blank">Surat Panggilan</a>
    </div>
</x-filament-panels::page>