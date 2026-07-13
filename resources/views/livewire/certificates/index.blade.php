<div>
    <div class="container mx-auto px-4 py-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Certificates
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    Manage and track all certificates
                </p>
            </div>

            <a href="{{ route('certificates.create') }}" class="inline-flex items-center px-4 py-2 rounded-xl
                      bg-blue-600 hover:bg-blue-700 text-white shadow-md transition">
                <i class="fas fa-plus mr-2"></i>
                Add Certificate
            </a>
        </div>


        <!-- Search and Filters -->
        <div
            class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-4 mb-6">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">

                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search certificates..."
                    class="w-full rounded-lg bg-gray-50 dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">

                <select wire:model.live="type"
                    class="w-full rounded-lg bg-gray-50 dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">

                    <option value="">All Types</option>

                    @foreach($types as $type)
                        <option value="{{ $type }}">
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach

                </select>

                <select wire:model.live="authority"
                    class="w-full rounded-lg bg-gray-50 dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">

                    <option value="">All Authorities</option>

                    @foreach($authorities as $authority)
                        <option value="{{ $authority }}">
                            {{ $authority }}
                        </option>
                    @endforeach

                </select>

                <select wire:model.live="status"
                    class="w-full rounded-lg bg-gray-50 dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">

                    <option value="">All Statuses</option>

                    @foreach($statuses as $status)
                        <option value="{{ $status }}">
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach

                </select>

                <select wire:model.live="perPage"
                    class="w-full rounded-lg bg-gray-50 dark:bg-gray-800 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">

                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>

                </select>

            </div>

        </div>
        <!-- Certificates Table -->
        <div class="bg-white dark:bg-gray-900
                    border border-gray-200 dark:border-gray-700
                    rounded-xl shadow-md overflow-hidden">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                    <thead class="bg-gray-50 dark:bg-gray-800">

                        <tr>
                            <th wire:click="sortBy('certificate_number')" class="px-6 py-3 text-left text-xs font-semibold
                                       text-gray-500 dark:text-gray-300 uppercase cursor-pointer">
                                Certificate #
                                @if($sortField === 'certificate_number')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </th>

                            <th wire:click="sortBy('title')" class="px-6 py-3 text-left text-xs font-semibold
                                       text-gray-500 dark:text-gray-300 uppercase cursor-pointer">
                                Title
                                @if($sortField === 'title')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold
                                       text-gray-500 dark:text-gray-300 uppercase">
                                Type
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold
                                       text-gray-500 dark:text-gray-300 uppercase">
                                Status
                            </th>

                            <th wire:click="sortBy('issue_date')" class="px-6 py-3 text-left text-xs font-semibold
                                       text-gray-500 dark:text-gray-300 uppercase cursor-pointer">
                                Issue Date
                                @if($sortField === 'issue_date')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold
                                       text-gray-500 dark:text-gray-300 uppercase">
                                Attachments
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold
                                       text-gray-500 dark:text-gray-300 uppercase">
                                Actions
                            </th>
                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                        @forelse($certificates as $certificate)

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ $certificate->certificate_number }}
                                    </div>
                                </td>


                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ $certificate->title }}
                                    </div>

                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $certificate->issuing_authority }}
                                    </div>
                                </td>


                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 text-xs rounded-full font-medium

                                                        @if($certificate->type === 'compliance')
                                                            bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200

                                                        @elseif($certificate->type === 'accreditation')
                                                            bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200

                                                        @elseif($certificate->type === 'license')
                                                            bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200

                                                        @else
                                                            bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200

                                                        @endif">

                                        {{ ucfirst($certificate->type) }}

                                    </span>

                                </td>



                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 text-xs rounded-full font-medium

                                                        @if($certificate->status === 'active')
                                                            bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200

                                                        @elseif($certificate->status === 'expired')
                                                            bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200

                                                        @elseif($certificate->status === 'draft')
                                                            bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200

                                                        @elseif($certificate->status === 'revoked')
                                                            bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200

                                                        @else
                                                            bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200

                                                        @endif">

                                        {{ ucfirst($certificate->status) }}

                                    </span>

                                </td>


                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">

                                    {{ $certificate->issue_date->format('M d, Y') }}

                                    @if($certificate->expiry_date)

                                        <div class="text-xs text-gray-400 dark:text-gray-500">
                                            Expires:
                                            {{ $certificate->expiry_date->format('M d, Y') }}
                                        </div>

                                    @endif

                                </td>
                                <td class="px-6 py-4">

                                    @if($certificate->attachments && count($certificate->attachments) > 0)

                                        <div class="flex flex-wrap gap-2">

                                            @foreach($certificate->attachments as $index => $attachment)

                                                <button wire:click="downloadAttachment({{ $certificate->id }}, {{ $index }})" class="inline-flex items-center gap-1

                                                                                                           px-2 py-1

                                                                                                           rounded-lg

                                                                                                           text-xs

                                                                                                           bg-blue-50
                                                                                                           dark:bg-blue-900

                                                                                                           text-blue-600
                                                                                                           dark:text-blue-200

                                                                                                           hover:bg-blue-100
                                                                                                           dark:hover:bg-blue-800

                                                                                                           transition"
                                                    title="Download {{ $attachment['name'] }}">

                                                    <i
                                                        class="fas fa-file-{{ str_contains($attachment['type'], 'image') ? 'image' : 'pdf' }}"></i>

                                                    {{ Str::limit($attachment['name'], 10) }}

                                                </button>

                                            @endforeach

                                        </div>

                                    @else

                                        <span class="text-sm text-gray-400 dark:text-gray-500">
                                            No attachments
                                        </span>

                                    @endif

                                </td>




                                <!-- Actions -->

                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="flex items-center gap-3">


                                        <a href="{{ route('certificates.show', $certificate) }}" class="p-2 rounded-lg

                                                                  text-blue-600
                                                                  dark:text-blue-400

                                                                  hover:bg-blue-100
                                                                  dark:hover:bg-blue-900

                                                                  transition" title="View">

                                            <i class="fas fa-eye"></i>

                                        </a>



                                        <a href="{{ route('certificates.edit', $certificate) }}" class="p-2 rounded-lg

                                                                  text-green-600
                                                                  dark:text-green-400

                                                                  hover:bg-green-100
                                                                  dark:hover:bg-green-900

                                                                  transition" title="Edit">

                                            <i class="fas fa-edit"></i>

                                        </a>



                                        <button wire:click="deleteCertificate({{ $certificate->id }})"
                                            onclick="return confirm('Are you sure?')" class="p-2 rounded-lg

                                                                   text-red-600
                                                                   dark:text-red-400

                                                                   hover:bg-red-100
                                                                   dark:hover:bg-red-900

                                                                   transition" title="Delete">


                                            <i class="fas fa-trash"></i>


                                        </button>


                                    </div>

                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td colspan="7" class="px-6 py-8 text-center

                                                           text-gray-500
                                                           dark:text-gray-400">


                                    <div class="flex flex-col items-center gap-2">

                                        <i class="fas fa-folder-open text-3xl"></i>

                                        <span>
                                            No certificates found
                                        </span>

                                    </div>


                                </td>


                            </tr>


                        @endforelse


                    </tbody>


                </table>


            </div>



            <!-- Pagination -->

            <div class="px-6 py-4

                        border-t

                        border-gray-200
                        dark:border-gray-700">

                {{ $certificates->links() }}

            </div>


        </div>


    </div>



    <!-- Flash Message -->

    @if(session()->has('message'))

        <div class="fixed bottom-5 right-5 z-50

                                    bg-green-600
                                    dark:bg-green-500

                                    text-white

                                    px-5 py-3

                                    rounded-xl

                                    shadow-lg

                                    flex items-center gap-2">

            <i class="fas fa-check-circle"></i>

            {{ session('message') }}

        </div>

    @endif


</div>
