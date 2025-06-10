@extends('user.app')

@section('title', __('front.main'))

@section('content')
<div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
        <div class="px-4 py-3">
            <label class="flex flex-col min-w-40 h-12 w-full">
                <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                    <div
                        class="text-[#49739c] flex border-none bg-[#e7edf4] items-center justify-center pl-4 rounded-l-lg border-r-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                            fill="currentColor" viewBox="0 0 256 256">
                            <path
                                d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                            </path>
                        </svg>
                    </div>
                    <input placeholder="{{__('front.searchService')}}"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border-none bg-[#e7edf4] focus:border-none h-full placeholder:text-[#49739c] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                        value="" />
                </div>
            </label>
        </div>

        <h2 class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
            {{__('front.serSpechial')}}
        </h2>

        <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4" id="services-grid">
            <!-- Services will be populated by JavaScript -->
        </div>

        <div class="@container">
            <div
                class="flex flex-col justify-end gap-6 px-4 py-10 @[480px]:gap-8 @[480px]:px-10 @[480px]:py-20">
                <div class="flex flex-col gap-2 text-center">
                    <h1
                        class="text-[#0d141c] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]">
                        {{__('front.join')}}
                    </h1>
                    <p class="text-[#0d141c] text-base font-normal leading-normal max-w-[720px">
                        {{__('front.body')}}
                    </p>
                </div>
                <div class="flex flex-1 justify-center">
                    @guest
                    <div class="flex justify-center">
                        <a href="{{route('register')}}" class=" btn btn-success"> {{__('front.registerAsType')}}</a>


                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection