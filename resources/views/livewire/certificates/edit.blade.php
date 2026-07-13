<div>
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Certificate</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Update certificate details for {{ $certificate->certificate_number }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column: Certificate Form -->
            <div class="bg-white dark:bg-gray-900
            border border-gray-200 dark:border-gray-700
            rounded-xl shadow-sm p-4">

                <!-- Header -->
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-9 h-9 rounded-lg bg-indigo-100 dark:bg-indigo-900/40
                    flex items-center justify-center">
                        <i class="fas fa-certificate text-indigo-600 dark:text-indigo-400"></i>
                    </div>

                    <div>
                        <h2 class="text-base font-semibold text-gray-900 dark:text-white">
                            Certificate Details
                        </h2>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Update certificate information
                        </p>
                    </div>
                </div>


                <form wire:submit.prevent="update" class="space-y-3">


                    <!-- Basic Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Certificate Number *
                            </label>

                            <input type="text" wire:model="certificate_number" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                              bg-white dark:bg-gray-800
                              text-sm text-gray-900 dark:text-white
                              focus:ring-indigo-500 focus:border-indigo-500">

                            @error('certificate_number')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Title *
                            </label>

                            <input type="text" wire:model="title" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                              bg-white dark:bg-gray-800
                              text-sm text-gray-900 dark:text-white
                              focus:ring-indigo-500 focus:border-indigo-500">

                            @error('title')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>



                    <!-- Type / Status -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Type *
                            </label>

                            <select wire:model="type" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                               bg-white dark:bg-gray-800
                               text-sm text-gray-900 dark:text-white">

                                @foreach(['compliance', 'accreditation', 'license', 'award', 'training', 'membership', 'other'] as $typeOption)
                                    <option value="{{ $typeOption }}">
                                        {{ ucfirst($typeOption) }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Status *
                            </label>

                            <select wire:model="status" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                               bg-white dark:bg-gray-800
                               text-sm text-gray-900 dark:text-white">

                                @foreach(['draft', 'active', 'expired', 'revoked', 'renewed'] as $statusOption)
                                    <option value="{{ $statusOption }}">
                                        {{ ucfirst($statusOption) }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>




                    <!-- Authority -->
                    <div>

                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Issuing Authority *
                        </label>

                        <input type="text" wire:model="issuing_authority" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                          bg-white dark:bg-gray-800
                          text-sm text-gray-900 dark:text-white">

                        @error('issuing_authority')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                    </div>




                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Issue Date *
                            </label>

                            <input type="date" wire:model="issue_date" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                              bg-white dark:bg-gray-800 text-sm">
                        </div>


                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Expiry Date
                            </label>

                            <input type="date" wire:model="expiry_date" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                              bg-white dark:bg-gray-800 text-sm">
                        </div>


                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Renewal Date
                            </label>

                            <input type="date" wire:model="renewal_date" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                              bg-white dark:bg-gray-800 text-sm">
                        </div>

                    </div>




                    <!-- Validity -->
                    <div>

                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Validity Period
                        </label>

                        <input type="text" wire:model="validity_period" placeholder="e.g. 1 year, 6 months" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                          bg-white dark:bg-gray-800 text-sm">

                    </div>




                    <!-- Related -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Related Project
                            </label>

                            <select wire:model="related_project_id" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                               bg-white dark:bg-gray-800 text-sm">

                                <option value="">Select Project</option>

                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">
                                        {{ $project->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                        <div>
                            <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Related Tender
                            </label>

                            <select wire:model="related_tender_id" class="w-full rounded-lg border-gray-300 dark:border-gray-700
                               bg-white dark:bg-gray-800 text-sm">

                                <option value="">Select Tender</option>

                                @foreach($tenders as $tender)
                                    <option value="{{ $tender->id }}">
                                        {{ $tender->title }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>




                    <!-- Renewal -->
                    <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-3">

                        <label class="flex items-center gap-2 text-sm
                          text-gray-700 dark:text-gray-300">

                            <input type="checkbox" wire:model="is_renewable" class="rounded text-indigo-600">

                            Renewable certificate

                        </label>


                        @if($is_renewable)

                            <input type="number" wire:model="renewal_reminder_days" min="0" placeholder="Reminder days"
                                class="mt-2 w-full rounded-lg
                                      border-gray-300 dark:border-gray-700
                                      bg-white dark:bg-gray-900 text-sm">

                        @endif

                    </div>




                    <!-- Description -->
                    <div>

                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Description
                        </label>

                        <textarea wire:model="description" rows="2" class="w-full rounded-lg
                             border-gray-300 dark:border-gray-700
                             bg-white dark:bg-gray-800 text-sm"></textarea>

                    </div>



                    <!-- Notes -->
                    <div>

                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Notes
                        </label>

                        <textarea wire:model="notes" rows="2" class="w-full rounded-lg
                             border-gray-300 dark:border-gray-700
                             bg-white dark:bg-gray-800 text-sm"></textarea>

                    </div>




                    <!-- Buttons -->
                    <div class="flex justify-end gap-2 pt-3 border-t
                    border-gray-200 dark:border-gray-700">


                        <a href="{{ route('certificates.show', $certificate) }}" class="px-4 py-2 text-sm rounded-lg
                      bg-gray-100 dark:bg-gray-800
                      text-gray-700 dark:text-gray-300">
                            Cancel
                        </a>


                        <button type="submit" wire:loading.attr="disabled" class="px-4 py-2 text-sm rounded-lg
                           bg-indigo-600 hover:bg-indigo-700
                           text-white">

                            <span wire:loading.remove wire:target="update">
                                Update
                            </span>

                            <span wire:loading wire:target="update">
                                <i class="fas fa-spinner fa-spin"></i>
                                Updating
                            </span>

                        </button>


                    </div>


                </form>

            </div>
            <!-- Right Column: Attachments Management -->
            <div class="space-y-3">


                <!-- Existing Attachments -->
                <div class="bg-white dark:bg-gray-900
                border border-gray-200 dark:border-gray-700
                rounded-xl shadow-sm p-3">


                    <div class="flex items-center gap-2 mb-3">

                        <div class="w-8 h-8 rounded-lg
                        bg-indigo-100 dark:bg-indigo-900/40
                        flex items-center justify-center">

                            <i class="fas fa-paperclip text-xs
                          text-indigo-600 dark:text-indigo-400"></i>

                        </div>

                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                            Current Attachments
                        </h2>

                    </div>


                    @if(count($existingAttachments) > 0)

                        <div class="space-y-2">

                            @foreach($existingAttachments as $index => $attachment)

                                <div class="flex items-center justify-between
                                        rounded-lg
                                        border border-gray-200 dark:border-gray-700
                                        bg-gray-50 dark:bg-gray-800
                                        p-2">


                                    <div class="flex items-center gap-2 min-w-0">


                                        <div class="w-7 h-7 rounded-md
                                                bg-white dark:bg-gray-700
                                                flex items-center justify-center">

                                            @if(str_contains($attachment['type'], 'image'))

                                                <i class="fas fa-image text-blue-500 text-xs"></i>

                                            @else

                                                <i class="fas fa-file-pdf text-red-500 text-xs"></i>

                                            @endif

                                        </div>


                                        <div class="min-w-0">

                                            <p class="text-xs font-medium
                                                  text-gray-900 dark:text-white truncate">

                                                {{ $attachment['name'] }}

                                            </p>

                                            <p class="text-[11px]
                                                  text-gray-500 dark:text-gray-400">

                                                {{ strtoupper(pathinfo($attachment['name'], PATHINFO_EXTENSION)) }}
                                                •
                                                {{ round($attachment['size'] / 1024, 1) }} KB

                                            </p>

                                        </div>


                                    </div>


                                    <button type="button" wire:click="removeExistingAttachment({{ $index }})"
                                        onclick="return confirm('Are you sure you want to remove this file?')"
                                        class="text-red-500 hover:text-red-700">

                                        <i class="fas fa-trash text-xs"></i>

                                    </button>


                                </div>


                            @endforeach


                        </div>


                    @else

                        <p class="text-xs text-center text-gray-500 py-3">
                            No attachments uploaded
                        </p>

                    @endif


                </div>





                <!-- Upload Attachments -->
                <div class="bg-white dark:bg-gray-900
                border border-gray-200 dark:border-gray-700
                rounded-xl shadow-sm p-3">


                    <div class="flex items-center gap-2 mb-3">

                        <div class="w-8 h-8 rounded-lg
                        bg-green-100 dark:bg-green-900/40
                        flex items-center justify-center">

                            <i class="fas fa-upload text-xs
                          text-green-600 dark:text-green-400"></i>

                        </div>


                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                            Add Attachments
                        </h2>

                    </div>



                    <input type="file" wire:model="newFiles" multiple accept=".pdf,.jpg,.jpeg,.png" class="w-full text-xs
                      rounded-lg
                      border-gray-300 dark:border-gray-700
                      bg-white dark:bg-gray-800
                      text-gray-700 dark:text-gray-300">





                    @if(count($newFiles) > 0)

                        <div class="mt-2 space-y-1">

                            @foreach($newFiles as $index => $file)

                                <div class="flex justify-between items-center
                                        rounded-md
                                        bg-gray-50 dark:bg-gray-800
                                        px-2 py-1">


                                    <span class="text-xs truncate
                                             text-gray-700 dark:text-gray-300">

                                        <i class="fas fa-file mr-1 text-gray-400"></i>
                                        {{ $file->getClientOriginalName() }}

                                    </span>


                                    <button type="button" wire:click="removeNewFile({{ $index }})" class="text-red-500">

                                        <i class="fas fa-times text-xs"></i>

                                    </button>


                                </div>

                            @endforeach

                        </div>

                    @endif




                    <div class="mt-2 rounded-md
                    bg-blue-50 dark:bg-blue-900/20
                    px-2 py-1">

                        <p class="text-[11px]
                      text-blue-700 dark:text-blue-300">

                            <i class="fas fa-info-circle"></i>
                            PDF, JPG, JPEG, PNG | Max 10MB

                        </p>

                    </div>


                </div>





                <!-- Certificate Information -->
                <div class="bg-white dark:bg-gray-900
                border border-gray-200 dark:border-gray-700
                rounded-xl shadow-sm p-3">


                    <div class="flex items-center gap-2 mb-3">

                        <div class="w-8 h-8 rounded-lg
                        bg-purple-100 dark:bg-purple-900/40
                        flex items-center justify-center">

                            <i class="fas fa-info text-xs
                          text-purple-600 dark:text-purple-400"></i>

                        </div>


                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                            Certificate Information
                        </h2>

                    </div>



                    <div class="space-y-1.5 text-xs">


                        <div class="flex justify-between">
                            <span class="text-gray-500">ID</span>
                            <span class="dark:text-white font-medium">
                                {{ $certificate->id }}
                            </span>
                        </div>


                        <div class="flex justify-between">
                            <span class="text-gray-500">Created By</span>
                            <span class="dark:text-white font-medium">
                                {{ $certificate->user->name ?? 'Unknown' }}
                            </span>
                        </div>


                        <div class="flex justify-between">
                            <span class="text-gray-500">Created</span>
                            <span class="dark:text-white font-medium">
                                {{ $certificate->created_at->format('M d,Y') }}
                            </span>
                        </div>


                        <div class="flex justify-between">
                            <span class="text-gray-500">Updated</span>
                            <span class="dark:text-white font-medium">
                                {{ $certificate->updated_at->format('M d,Y') }}
                            </span>
                        </div>


                        <div class="flex justify-between">
                            <span class="text-gray-500">Files</span>
                            <span class="dark:text-white font-medium">
                                {{ count($existingAttachments) + count($newFiles) }}
                            </span>
                        </div>


                    </div>



                    <a href="{{ route('certificates.show', $certificate) }}" class="mt-3 block text-center
                  rounded-lg
                  bg-indigo-600 hover:bg-indigo-700
                  text-white text-xs
                  py-2">

                        <i class="fas fa-eye mr-1"></i>
                        View Certificate

                    </a>


                </div>


            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    @if(session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
            {{ session('message') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="fixed bottom-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg">
            {{ session('error') }}
        </div>
    @endif
</div>

@push('scripts')
    <script>
        // Auto-hide flash messages
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const flashMessages = document.querySelectorAll('[x-data*="show"]');
                flashMessages.forEach(function (message) {
                    if (message.__x) {
                        message.__x.$data.show = false;
                    }
                });
            }, 5000);
        });

        // Confirm before removing existing attachments
        document.addEventListener('livewire:load', function () {
            Livewire.on('confirmRemoveAttachment', function (data) {
                if (confirm('Are you sure you want to remove this attachment?')) {
                    Livewire.emit('removeAttachmentConfirmed', data.index);
                }
            });
        });
    </script>
@endpush
