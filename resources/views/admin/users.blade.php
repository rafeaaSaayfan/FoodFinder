@extends('layouts.dashboard.dashboard')

@section('content')

@include('admin.sideBar.sideBar')

        <div class="relative container bg-qua h-full w-100 md:w-4/5 xs:px-2 xl:px-10 flex justify-center items-center" style="min-height: 100vh">
            <div class="w-full h-full md:ps-10 lg:ps-10 xl:ps-5">
                <input type="hidden" value="{{ auth()->user()->id }}" id="user_id">
                <div class="lg:flex items-center justify-between">
                    <h2 class="font-meduim text-ter text-3xl ff-secondary">Users</h2>
                    <div class="md:flex items-center gap-4 wow fadeInUp text-qua pt-3 lg:pt-0" data-wow-delay="0.1s">
                        <div class="flex flex-wrap items-center gap-3">
                            <div class="flex items-center gap-1 pt-2 opacity-90">
                                <input type="checkbox" name="" id="customerSearch" class="w-4 h-4 cursor-pointer">
                                <label for="customerSearch" class="cursor-pointer pt-1 text-sm text-sec">Customer</label>
                            </div>
                            <div class="flex items-center gap-1 pt-2 opacity-90">
                                <input type="checkbox" name="" id="restauarntSearch" class="w-4 h-4 cursor-pointer">
                                <label for="restauarntSearch" class="cursor-pointer pt-1 text-sm text-sec">Restauarnt owner</label>
                            </div>
                            <div class="flex items-center gap-1 pt-2 opacity-90">
                                <input type="checkbox" name="" id="adminSearch" class="w-4 h-4 cursor-pointer">
                                <label for="adminSearch" class="cursor-pointer pt-1 text-sm text-sec">Admin</label>
                            </div>
                        </div>
                        <div class="md:w-80">
                            <div class="relative mt-1 w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-qua opacity-70" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" id="search" class="w-full bg-sec text-qua text-sm rounded-xl block pl-10 p-2.5" placeholder="Search User">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-2 mb-3">
                <div id="table" class="w-full">
                    <div class="table-responsive">
                      <table class="table table-sm fs-9 mb-0">
                        <thead>
                          <tr class="bg-sec">
                            <th class="sort border-top border-translucent px-2 text-qua">username</th>
                            <th class="sort border-top border-translucent text-qua">Email</th>
                            <th class="sort border-top border-translucent text-qua">role</th>
                            <th class="sort text-end align-middle border-top border-translucent text-qua px-2" scope="col">ACTION</th>
                          </tr>
                        </thead>
                        <tbody class="list tbody">
                        </tbody>
                      </table>
                      <div class="empty_data w-full flex items-center justify-center mt-2"></div>
                      <div class="pagination_controls px-3 shadow-md mt-3 rounded bg-qua py-2">
                      </div>
                    </div>
                </div>
                <div class="absolute start-1/2 top-1/2 loading-indicator">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/users.js') }}" type="module"></script>
@endpush
