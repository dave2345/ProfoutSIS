<div>
    <div class="container mx-auto px-4 py-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Create New Certificate
            </h1>

            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Fill in certificate details.
            </p>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">


            <!-- LEFT COLUMN : FILE UPLOAD -->
            <div class="bg-white dark:bg-gray-900
                        border border-gray-200 dark:border-gray-700
                        rounded-2xl shadow-lg p-6
                        transition-colors duration-300">


                <div class="flex items-center justify-between mb-6">

                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Upload Certificate Files
                    </h2>

                    <span class="text-xs px-3 py-1 rounded-full
                                 bg-blue-100 dark:bg-blue-900
                                 text-blue-700 dark:text-blue-300">
                        PDF / Images
                    </span>

                </div>



                <div class="mb-6">


                    <label class="block text-sm font-medium
                                  text-gray-700 dark:text-gray-300 mb-3">
                        Upload Certificate Documents
                    </label>



                    <!-- Upload Input -->
                    <div class="relative">

                        <input
                            type="file"
                            wire:model="files"
                            multiple
                            accept=".pdf,.jpg,.jpeg,.png"

                            class="block w-full text-sm
                                   text-gray-700 dark:text-gray-300

                                   file:mr-4 file:py-2 file:px-4
                                   file:rounded-lg file:border-0
                                   file:text-sm file:font-semibold
                                   file:bg-blue-600 file:text-white
                                   hover:file:bg-blue-700

                                   bg-gray-50 dark:bg-gray-800

                                   border border-gray-300
                                   dark:border-gray-700

                                   rounded-xl cursor-pointer

                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500"
                        >

                    </div>



                    <!-- Loading -->
                    <div wire:loading wire:target="files"
                         class="mt-4 flex items-center gap-2
                                text-blue-600 dark:text-blue-400">

                        <i class="fas fa-spinner fa-spin"></i>

                        Uploading files...

                    </div>




                    @if($files)

                        <div class="mt-8">

                            <h3 class="text-sm font-semibold mb-4
                                       text-gray-700 dark:text-gray-300">
                                File Preview
                            </h3>



                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                                @foreach($files as $index => $file)


                                    <div class="overflow-hidden
                                                rounded-xl

                                                border border-gray-200
                                                dark:border-gray-700

                                                bg-white
                                                dark:bg-gray-800

                                                shadow-md

                                                transition
                                                hover:shadow-xl">



                                        <!-- Image Preview -->


                                        <div
                                            onclick="openPreview('{{ $file->temporaryUrl() }}', '{{ $file->getMimeType() }}')"
                                            class="cursor-pointer group relative">


                                            @if(str_contains($file->getMimeType(), 'image'))


                                                <img
                                                    src="{{ $file->temporaryUrl() }}"

                                                    class="w-full h-48 object-cover
                                                        group-hover:scale-105
                                                        transition duration-300"

                                                    alt="Preview">


                                            @elseif($file->getMimeType() == 'application/pdf')

                                                <div class="h-full flex flex-col items-center justify-center">
                                                    <i class="fas fa-file-pdf text-red-500 text-4xl mb-3"></i>

                                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                                        PDF preview unavailable
                                                    </p>

                                                    <a href="{{ $file->temporaryUrl() }}"
                                                    target="_blank"
                                                    class="mt-2 text-blue-600 hover:underline">
                                                        Open PDF
                                                    </a>
                                                </div>

                                            @endif



                                            <!-- Overlay -->

                                            <div class="absolute inset-0

                                                        bg-black/0

                                                        group-hover:bg-black/40

                                                        flex items-center justify-center

                                                        transition">


                                                <div class="opacity-0
                                                            group-hover:opacity-100
                                                            text-white
                                                            text-sm
                                                            font-semibold">

                                                    <i class="fas fa-expand mr-2"></i>

                                                    Click to view

                                                </div>


                                            </div>


                                        </div>



                                        <!-- File Details -->
                                        <div class="p-4">


                                            <div class="flex items-center
                                                        justify-between
                                                        gap-3">



                                                <div class="flex items-center
                                                            gap-3
                                                            min-w-0">


                                                    @if(str_contains($file->getMimeType(), 'image'))

                                                        <div class="p-2 rounded-lg
                                                                    bg-blue-100
                                                                    dark:bg-blue-900">

                                                            <i class="fas fa-image
                                                                      text-blue-600
                                                                      dark:text-blue-300">
                                                            </i>

                                                        </div>


                                                    @else


                                                        <div class="p-2 rounded-lg
                                                                    bg-red-100
                                                                    dark:bg-red-900">

                                                            <i class="fas fa-file-pdf
                                                                      text-red-600
                                                                      dark:text-red-300">
                                                            </i>

                                                        </div>


                                                    @endif




                                                    <span class="text-sm truncate
                                                                 text-gray-700
                                                                 dark:text-gray-300">

                                                        {{ $file->getClientOriginalName() }}

                                                    </span>



                                                </div>




                                                <!-- Remove File -->
                                                <button

                                                    type="button"

                                                    wire:click="removeFile({{ $index }})"

                                                    class="p-2 rounded-lg

                                                           text-red-500

                                                           hover:bg-red-100

                                                           dark:hover:bg-red-900

                                                           transition">

                                                    <i class="fas fa-times"></i>

                                                </button>


                                            </div>


                                        </div>


                                    </div>


                                @endforeach


                            </div>


                        </div>


                    @endif


                </div>


            </div>
            <!-- RIGHT COLUMN : CERTIFICATE FORM -->

            <div class="bg-white dark:bg-gray-900
                        border border-gray-200 dark:border-gray-700
                        rounded-2xl shadow-lg p-6
                        transition-colors duration-300">


                <h2 class="text-xl font-semibold mb-6
                           text-gray-900 dark:text-white">
                    Certificate Details
                </h2>



                <form wire:submit.prevent="save">


                    <!-- Basic Information -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">


                        <div>

                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">

                                Certificate Number *

                            </label>


                            <input
                                type="text"
                                wire:model="certificate_number"

                                class="mt-2 w-full rounded-xl

                                       bg-gray-50 dark:bg-gray-800

                                       border border-gray-300
                                       dark:border-gray-700

                                       text-gray-900 dark:text-white

                                       focus:ring-2
                                       focus:ring-blue-500

                                       focus:border-blue-500">


                            @error('certificate_number')

                                <span class="text-red-500 text-xs">
                                    {{ $message }}
                                </span>

                            @enderror
                        </div>
                        <div>

                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Title
                            </label>
                            <input
                                type="text"
                                wire:model="title"
                                class="mt-2 w-full rounded-xl
                                       bg-gray-50 dark:bg-gray-800
                                       border border-gray-300
                                       dark:border-gray-700
                                       text-gray-900 dark:text-white
                                       focus:ring-2
                                       focus:ring-blue-500">

                        </div>
                    </div>
                    <!-- Type and Status -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Type
                            </label>
                            <select
                                wire:model="type"
                                class="mt-2 w-full rounded-xl
                                       bg-gray-50 dark:bg-gray-800
                                       border border-gray-300
                                       dark:border-gray-700
                                       text-gray-900 dark:text-white
                                       focus:ring-blue-500">
                                @foreach ([
                                    'compliance',
                                    'accreditation',
                                    'license',
                                    'award',
                                    'training',
                                    'membership',
                                    'other'
                                ] as $typeOption)
                                    <option value="{{ $typeOption }}">
                                        {{ ucfirst($typeOption) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                  Status
                            </label>

                            <select
                                wire:model="status"
                                class="mt-2 w-full rounded-xl
                                       bg-gray-50 dark:bg-gray-800
                                       border border-gray-300
                                       dark:border-gray-700
                                       text-gray-900 dark:text-white
                                       focus:ring-blue-500">
                                @foreach ([
                                    'draft',
                                    'active',
                                    'expired',
                                    'revoked',
                                    'renewed'
                                ] as $statusOption)
                                    <option value="{{ $statusOption }}">
                                        {{ ucfirst($statusOption) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Issuing Authority -->

                    <div class="mb-6">

                        <label class="block text-sm font-medium
                                      text-gray-700 dark:text-gray-300">

                            Issuing Authority *

                        </label>
                        <input
                            type="text"
                            wire:model="issuing_authority"
                            class="mt-2 w-full rounded-xl
                                   bg-gray-50 dark:bg-gray-800
                                   border border-gray-300
                                   dark:border-gray-700
                                   text-gray-900 dark:text-white
                                   focus:ring-2
                                   focus:ring-blue-500">
                        @error('issuing_authority')

                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>

                        @enderror


                    </div>

                    <!-- Dates -->

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
                        <div>
                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">

                                Issue Date *

                            </label>


                            <input

                                type="date"

                                wire:model="issue_date"

                                class="mt-2 w-full rounded-xl

                                       bg-gray-50 dark:bg-gray-800

                                       border border-gray-300
                                       dark:border-gray-700

                                       text-gray-900 dark:text-white

                                       focus:ring-blue-500">


                        </div>




                        <div>

                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">

                                Expiry Date

                            </label>


                            <input

                                type="date"

                                wire:model="expiry_date"

                                class="mt-2 w-full rounded-xl

                                       bg-gray-50 dark:bg-gray-800

                                       border border-gray-300
                                       dark:border-gray-700

                                       text-gray-900 dark:text-white">

                        </div>





                        <div>

                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">

                                Renewal Date

                            </label>


                            <input

                                type="date"

                                wire:model="renewal_date"

                                class="mt-2 w-full rounded-xl

                                       bg-gray-50 dark:bg-gray-800

                                       border border-gray-300
                                       dark:border-gray-700

                                       text-gray-900 dark:text-white">

                        </div>


                    </div>





                    <!-- Validity Period -->

                    <div class="mb-6">


                        <label class="block text-sm font-medium
                                      text-gray-700 dark:text-gray-300">

                            Validity Period

                        </label>



                        <input

                            type="text"

                            wire:model="validity_period"

                            placeholder="e.g. 1 year, 6 months"

                            class="mt-2 w-full rounded-xl

                                   bg-gray-50 dark:bg-gray-800

                                   border border-gray-300
                                   dark:border-gray-700

                                   text-gray-900 dark:text-white">


                    </div>
                                        <!-- Related Entities -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">


                        <div>

                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">

                                Related Project

                            </label>


                            <select

                                wire:model="related_project_id"

                                class="mt-2 w-full rounded-xl

                                       bg-gray-50 dark:bg-gray-800

                                       border border-gray-300
                                       dark:border-gray-700

                                       text-gray-900 dark:text-white

                                       focus:ring-2 focus:ring-blue-500">


                                <option value="">
                                    Select Project
                                </option>


                                @foreach ($projects as $project)

                                    <option value="{{ $project->id }}">
                                        {{ $project->name }}
                                    </option>

                                @endforeach


                            </select>

                        </div>




                        <div>


                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">

                                Related Tender

                            </label>


                            <select

                                wire:model="related_tender_id"

                                class="mt-2 w-full rounded-xl

                                       bg-gray-50 dark:bg-gray-800

                                       border border-gray-300
                                       dark:border-gray-700

                                       text-gray-900 dark:text-white">


                                <option value="">
                                    Select Tender
                                </option>


                                @foreach ($tenders as $tender)

                                    <option value="{{ $tender->id }}">
                                        {{ $tender->title }}
                                    </option>

                                @endforeach


                            </select>


                        </div>


                    </div>





                    <!-- Renewal Settings -->


                    <div class="bg-gray-50 dark:bg-gray-800

                                border border-gray-200
                                dark:border-gray-700

                                rounded-xl p-5 mb-6">



                        <div class="flex items-center mb-5">


                            <input

                                type="checkbox"

                                wire:model="is_renewable"

                                id="is_renewable"

                                class="w-5 h-5 rounded

                                       text-blue-600

                                       border-gray-300

                                       dark:border-gray-600

                                       dark:bg-gray-700">


                            <label

                                for="is_renewable"

                                class="ml-3 font-medium

                                       text-gray-700
                                       dark:text-gray-300">

                                This certificate is renewable

                            </label>


                        </div>





                        @if ($is_renewable)


                            <div>


                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">

                                    Renewal Reminder
                                    (days before expiry)

                                </label>


                                <input

                                    type="number"

                                    wire:model="renewal_reminder_days"

                                    min="0"

                                    class="mt-2 w-full rounded-xl

                                           bg-white dark:bg-gray-900

                                           border border-gray-300
                                           dark:border-gray-700

                                           text-gray-900 dark:text-white">


                            </div>


                        @endif


                    </div>







                    <!-- Description & Notes -->


                    <div class="space-y-5 mb-6">


                        <div>


                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">

                                Description

                            </label>



                            <textarea

                                wire:model="description"

                                rows="4"

                                class="mt-2 w-full rounded-xl

                                       bg-gray-50 dark:bg-gray-800

                                       border border-gray-300
                                       dark:border-gray-700

                                       text-gray-900 dark:text-white

                                       focus:ring-2 focus:ring-blue-500">

                            </textarea>


                        </div>





                        <div>


                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">

                                Notes

                            </label>



                            <textarea

                                wire:model="notes"

                                rows="3"

                                class="mt-2 w-full rounded-xl

                                       bg-gray-50 dark:bg-gray-800

                                       border border-gray-300
                                       dark:border-gray-700

                                       text-gray-900 dark:text-white">

                            </textarea>


                        </div>


                    </div>

                    <!-- Actions -->


                    <div class="flex justify-end gap-4 pt-6

                                border-t border-gray-200
                                dark:border-gray-700">



                        <a

                            href="{{ route('certificates.index') }}"

                            class="px-5 py-2.5 rounded-xl

                                   bg-gray-200
                                   dark:bg-gray-700

                                   text-gray-700
                                   dark:text-gray-200

                                   hover:bg-gray-300
                                   dark:hover:bg-gray-600

                                   transition">

                            Cancel

                        </a>





                        <button

                            type="submit"

                            wire:loading.attr="disabled"

                            class="px-6 py-2.5 rounded-xl

                                   bg-blue-600

                                   text-white

                                   hover:bg-blue-700

                                   disabled:opacity-50

                                   transition">


                            <span wire:loading.remove wire:target="save">
                                <i class="fas fa-save mr-2"></i>
                                Create Certificate
                            </span>
                            <span wire:loading wire:target="save">
                                <i class="fas fa-spinner fa-spin mr-2"></i>
                                Creating...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            function openPreview(url, mimeType) {
                if (mimeType === 'application/pdf') {
                    window.open(url, '_blank');
                } else if (mimeType.startsWith('image/')) {
                    const imgWindow = window.open('', '_blank');
                    imgWindow.document.write('<img src="' + url + '" style="width:100%;">');
                }
            }
        </script>
    @endpush
    <!-- Flash Message -->
    @if (session()->has('message'))

        <div

            class="fixed bottom-5 right-5 z-50

                   bg-green-600

                   text-white

                   px-5 py-3

                   rounded-xl

                   shadow-xl

                   flex items-center gap-3">


            <i class="fas fa-check-circle"></i>

            {{ session('message') }}


        </div>


    @endif
</div>
