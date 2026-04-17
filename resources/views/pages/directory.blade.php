@extends('layouts.kimia')

@section('title', 'SC Kimia Member Directory')

@section('content')
<main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
<div class="mb-8">
<h1 class="text-3xl font-display font-bold text-text-main-light dark:text-text-main-dark mb-2">Data Anggota</h1>
<p class="text-text-muted-light dark:text-text-muted-dark">Manage and view the member directory of Science Club Kimia.</p>
</div>
<div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 mb-6 transition-all">
<div class="flex flex-col md:flex-row gap-4 justify-between items-center">
<div class="flex flex-wrap gap-3 w-full md:w-auto">
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-icons-round text-gray-400 text-sm">school</span>
</div>
<select class="pl-9 pr-8 py-2 w-full md:w-40 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-main-light dark:text-text-main-dark text-sm rounded-lg focus:ring-secondary focus:border-secondary block transition-colors cursor-pointer appearance-none hover:bg-gray-100 dark:hover:bg-gray-700">
<option value="">All Classes</option>
<option value="10">Class 10</option>
<option value="11">Class 11</option>
<option value="12">Class 12</option>
</select>
<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
<span class="material-icons-round text-sm">expand_more</span>
</div>
</div>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-icons-round text-gray-400 text-sm">badge</span>
</div>
<select class="pl-9 pr-8 py-2 w-full md:w-40 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-main-light dark:text-text-main-dark text-sm rounded-lg focus:ring-secondary focus:border-secondary block transition-colors cursor-pointer appearance-none hover:bg-gray-100 dark:hover:bg-gray-700">
<option value="">All Positions</option>
<option value="member">Member</option>
<option value="board">Board Member</option>
<option value="president">President</option>
</select>
<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
<span class="material-icons-round text-sm">expand_more</span>
</div>
</div>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-icons-round text-gray-400 text-sm">calendar_today</span>
</div>
<select class="pl-9 pr-8 py-2 w-full md:w-40 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-main-light dark:text-text-main-dark text-sm rounded-lg focus:ring-secondary focus:border-secondary block transition-colors cursor-pointer appearance-none hover:bg-gray-100 dark:hover:bg-gray-700">
<option value="">All Years</option>
<option value="2024">2024</option>
<option value="2023">2023</option>
<option value="2022">2022</option>
</select>
<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
<span class="material-icons-round text-sm">expand_more</span>
</div>
</div>
</div>
<div class="flex gap-3 w-full md:w-auto">
<div class="relative w-full md:w-64">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-icons-round text-gray-400">search</span>
</div>
<input class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-main-light dark:text-text-main-dark text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full pl-10 p-2 placeholder-gray-400 dark:placeholder-gray-500 transition-all" placeholder="Search members..." type="text"/>
</div>
<button class="bg-primary hover:bg-primary-dark text-gray-900 font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition-all shadow-md hover:shadow-lg transform active:scale-95">
<span class="material-icons-round text-sm">add</span>
<span class="hidden sm:inline">Add Member</span>
</button>
</div>
</div>
</div>
<div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left text-sm text-text-muted-light dark:text-text-muted-dark border-collapse">
<thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase font-semibold text-text-main-light dark:text-text-main-dark">
<tr>
<th class="px-6 py-4 tracking-wider" scope="col">Name / ID</th>
<th class="px-6 py-4 tracking-wider" scope="col">Class</th>
<th class="px-6 py-4 tracking-wider" scope="col">Status</th>
<th class="px-6 py-4 tracking-wider" scope="col">Jabatan (Position)</th>
<th class="px-6 py-4 tracking-wider" scope="col">Joined Date</th>
<th class="px-6 py-4 text-right tracking-wider" scope="col">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-gray-200 dark:divide-gray-700">
<tr class="bg-white dark:bg-surface-dark hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-secondary font-bold text-lg">
                                        AZ
                                    </div>
<div class="ml-4">
<div class="text-sm font-semibold text-text-main-light dark:text-text-main-dark">Ahmad Zulfikar</div>
<div class="text-xs text-text-muted-light dark:text-text-muted-dark">SCK-2023-001</div>
</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="text-text-main-light dark:text-text-main-dark font-medium">XII IPA 1</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800">
                                    Aktif
                                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-icons-round text-primary text-base">star</span>
<span class="text-text-main-light dark:text-text-main-dark">Ketua (President)</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-text-muted-light dark:text-text-muted-dark">
                                Jan 12, 2022
                            </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<button class="text-secondary hover:text-blue-600 dark:hover:text-blue-400 p-1">
<span class="material-icons-round text-base">edit</span>
</button>
<button class="text-gray-400 hover:text-red-500 dark:hover:text-red-400 p-1">
<span class="material-icons-round text-base">delete</span>
</button>
</td>
</tr>
<tr class="bg-table-stripe-light dark:bg-table-stripe-dark border-y border-transparent hover:bg-blue-100 dark:hover:bg-blue-900/40 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center text-purple-600 dark:text-purple-300 font-bold text-lg">
                                        SN
                                    </div>
<div class="ml-4">
<div class="text-sm font-semibold text-text-main-light dark:text-text-main-dark">Siti Nurhaliza</div>
<div class="text-xs text-text-muted-light dark:text-text-muted-dark">SCK-2023-014</div>
</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="text-text-main-light dark:text-text-main-dark font-medium">XI IPA 3</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800">
                                    Aktif
                                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-icons-round text-gray-400 text-base">science</span>
<span class="text-text-main-light dark:text-text-main-dark">Anggota (Member)</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-text-muted-light dark:text-text-muted-dark">
                                Feb 05, 2023
                            </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<button class="text-secondary hover:text-blue-600 dark:hover:text-blue-400 p-1">
<span class="material-icons-round text-base">edit</span>
</button>
<button class="text-gray-400 hover:text-red-500 dark:hover:text-red-400 p-1">
<span class="material-icons-round text-base">delete</span>
</button>
</td>
</tr>
<tr class="bg-white dark:bg-surface-dark hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="flex-shrink-0 h-10 w-10 rounded-full bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600 dark:text-orange-300 font-bold text-lg">
                                        BP
                                    </div>
<div class="ml-4">
<div class="text-sm font-semibold text-text-main-light dark:text-text-main-dark">Budi Pratama</div>
<div class="text-xs text-text-muted-light dark:text-text-muted-dark">SCK-2021-088</div>
</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="text-text-main-light dark:text-text-main-dark font-medium">Graduated</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-600">
                                    Alumni
                                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-icons-round text-gray-400 text-base">school</span>
<span class="text-text-main-light dark:text-text-main-dark">Ex-Secretary</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-text-muted-light dark:text-text-muted-dark">
                                Aug 20, 2021
                            </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<button class="text-secondary hover:text-blue-600 dark:hover:text-blue-400 p-1">
<span class="material-icons-round text-base">visibility</span>
</button>
<button class="text-gray-400 cursor-not-allowed opacity-50 p-1">
<span class="material-icons-round text-base">delete</span>
</button>
</td>
</tr>
<tr class="bg-table-stripe-light dark:bg-table-stripe-dark border-y border-transparent hover:bg-blue-100 dark:hover:bg-blue-900/40 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="flex-shrink-0 h-10 w-10 rounded-full bg-pink-100 dark:bg-pink-900/30 flex items-center justify-center text-pink-600 dark:text-pink-300 font-bold text-lg">
                                        DS
                                    </div>
<div class="ml-4">
<div class="text-sm font-semibold text-text-main-light dark:text-text-main-dark">Dewi Sartika</div>
<div class="text-xs text-text-muted-light dark:text-text-muted-dark">SCK-2023-045</div>
</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="text-text-main-light dark:text-text-main-dark font-medium">X IPA 2</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800">
                                    Aktif
                                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-icons-round text-secondary text-base">biotech</span>
<span class="text-text-main-light dark:text-text-main-dark">Bendahara (Treasurer)</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-text-muted-light dark:text-text-muted-dark">
                                Mar 10, 2023
                            </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<button class="text-secondary hover:text-blue-600 dark:hover:text-blue-400 p-1">
<span class="material-icons-round text-base">edit</span>
</button>
<button class="text-gray-400 hover:text-red-500 dark:hover:text-red-400 p-1">
<span class="material-icons-round text-base">delete</span>
</button>
</td>
</tr>
<tr class="bg-white dark:bg-surface-dark hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="flex-shrink-0 h-10 w-10 rounded-full bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center text-teal-600 dark:text-teal-300 font-bold text-lg">
                                        RH
                                    </div>
<div class="ml-4">
<div class="text-sm font-semibold text-text-main-light dark:text-text-main-dark">Rian Hidayat</div>
<div class="text-xs text-text-muted-light dark:text-text-muted-dark">SCK-2023-092</div>
</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="text-text-main-light dark:text-text-main-dark font-medium">XI IPA 1</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300 border border-red-200 dark:border-red-800">
                                    Inactive
                                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-icons-round text-gray-400 text-base">science</span>
<span class="text-text-main-light dark:text-text-main-dark">Anggota (Member)</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-text-muted-light dark:text-text-muted-dark">
                                Sep 15, 2022
                            </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<button class="text-secondary hover:text-blue-600 dark:hover:text-blue-400 p-1">
<span class="material-icons-round text-base">edit</span>
</button>
<button class="text-gray-400 hover:text-red-500 dark:hover:text-red-400 p-1">
<span class="material-icons-round text-base">delete</span>
</button>
</td>
</tr>
<tr class="bg-table-stripe-light dark:bg-table-stripe-dark border-y border-transparent hover:bg-blue-100 dark:hover:bg-blue-900/40 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center">
<div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-300 font-bold text-lg">
                                        KA
                                    </div>
<div class="ml-4">
<div class="text-sm font-semibold text-text-main-light dark:text-text-main-dark">Kartika Ayu</div>
<div class="text-xs text-text-muted-light dark:text-text-muted-dark">SCK-2023-101</div>
</div>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="text-text-main-light dark:text-text-main-dark font-medium">X IPA 4</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 border border-green-200 dark:border-green-800">
                                    Aktif
                                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-icons-round text-gray-400 text-base">science</span>
<span class="text-text-main-light dark:text-text-main-dark">Anggota (Member)</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-text-muted-light dark:text-text-muted-dark">
                                Jun 01, 2023
                            </td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<button class="text-secondary hover:text-blue-600 dark:hover:text-blue-400 p-1">
<span class="material-icons-round text-base">edit</span>
</button>
<button class="text-gray-400 hover:text-red-500 dark:hover:text-red-400 p-1">
<span class="material-icons-round text-base">delete</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="bg-surface-light dark:bg-surface-dark px-4 py-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-700 sm:px-6">
<div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
<div>
<p class="text-sm text-text-muted-light dark:text-text-muted-dark">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">42</span> members
                        </p>
</div>
<div>
<nav aria-label="Pagination" class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
<a class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-700" href="#">
<span class="sr-only">Previous</span>
<span class="material-icons-round text-base">chevron_left</span>
</a>
<a aria-current="page" class="z-10 bg-blue-50 dark:bg-blue-900 border-secondary text-secondary relative inline-flex items-center px-4 py-2 border text-sm font-medium" href="#">
                                1
                            </a>
<a class="bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-700 relative inline-flex items-center px-4 py-2 border text-sm font-medium" href="#">
                                2
                            </a>
<a class="bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-700 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium" href="#">
                                3
                            </a>
<span class="relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-400">
                                ...
                            </span>
<a class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-700" href="#">
<span class="sr-only">Next</span>
<span class="material-icons-round text-base">chevron_right</span>
</a>
</nav>
</div>
</div>
<div class="flex sm:hidden justify-between w-full">
<a class="relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700" href="#">
                        Previous
                    </a>
<a class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700" href="#">
                        Next
                    </a>
</div>
</div>
</div>
</main>
@endsection
