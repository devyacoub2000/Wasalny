@extends('user.app')
@section('title', __('front.conactUs'))

@section('content')
<!-- Main Content -->
<div class="px-40 flex flex-1 justify-center py-5">
  <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
    <div class="flex flex-wrap justify-between gap-3 p-4">
      <div class="flex min-w-72 flex-col gap-3">
        <p class="text-[#0d141c] tracking-light text-[32px] font-bold leading-tight" style="cursor:pointer;">
          {{__('front.conactUs')}}
        </p>
        <p class="text-[#49739c] text-sm font-normal leading-normal" style="font-size: 18px; cursor:pointer;">
          {{__('front.support')}}
        </p>
      </div>
    </div>
    <form action="{{route('front.store_msg')}}" method="POST">
      @csrf
      @method('POST')
      <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
        <label class="flex flex-col min-w-40 flex-1">
          <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">{{__('admin.name')}}</p>
          <input
            placeholder="{{__('front.enter')}} {{__('admin.name')}}"
            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedbe8] bg-slate-50 focus:border-[#cedbe8] h-14 placeholder:text-[#49739c] p-[15px] text-base font-normal leading-normal"
            value="{{old('name')}}" name="name" type="text" />
        </label>
        @error('name')
        <small class="invalid-feedback"> {{$message}} </small>
        @enderror
      </div>
      <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
        <label class="flex flex-col min-w-40 flex-1">
          <p class="text-[#0d141c] text-base font-medium leading-normal pb-2"> {{__('front.email')}}</p>
          <input
            placeholder="{{__('front.enter')}} {{__('front.email')}}"
            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedbe8] bg-slate-50 focus:border-[#cedbe8] h-14 placeholder:text-[#49739c] p-[15px] text-base font-normal leading-normal"
            value="{{old('email')}}" name="email" type="email" />
        </label>
        @error('email')
        <small class="invalid-feedback"> {{$message}} </small>
        @enderror
      </div>
      <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
        <label class="flex flex-col min-w-40 flex-1">
          <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">{{__('front.subject')}}</p>
          <input
            placeholder="{{__('front.enter')}} {{__('front.subject')}}"
            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedbe8] bg-slate-50 focus:border-[#cedbe8] h-14 placeholder:text-[#49739c] p-[15px] text-base font-normal leading-normal"
            value="{{old('subject')}}" name="subject" type="text" />
        </label>
        @error('subject')
        <small class="invalid-feedback"> {{$message}} </small>
        @enderror
      </div>
      <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
        <label class="flex flex-col min-w-40 flex-1">
          <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">{{__('front.msg')}}</p>
          <textarea placeholder="{{__('front.enter')}} {{__('front.msg')}}" name="msg"
            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedbe8] bg-slate-50 focus:border-[#cedbe8] min-h-36 placeholder:text-[#49739c] p-[15px] text-base font-normal leading-normal">
          {{old('msg')}}
          </textarea>
        </label>
        @error('msg')
        <small class="invalid-feedback"> {{$message}} </small>
        @enderror
      </div>
      <div class="flex px-4 py-3 justify-start">
        <button
          class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#0c7ff2] text-slate-50 text-sm font-bold leading-normal tracking-[0.015em]">
          <span class="truncate">{{__('front.send')}}</span>
        </button>
      </div>

    </form>

  </div>
</div>
@endsection