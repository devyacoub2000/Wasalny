
@extends('admin.master')

@section('title', 'Edit Service')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{__('admin.edit')}} </h1>

    <form action="{{route('admin.service.update', $service->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('put')

         <div class="mb-3">       
           <label for="name_en">  Service Name English </label>
           <input type="text" name="name_en" placeholder="Name English"
            value="{{old('name_en', $service->name_en)}}" class="form-control @error('name_en') is-invalid @enderror">
           @error('name_en')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

           <div class="mb-3">       
           <label for="name_ar">  Service Name Arabic </label>
           <input type="text" name="name_ar" placeholder="Name Arabic" 
           value="{{old('name_ar', $service->name_ar)}}" class="form-control @error('name_ar') is-invalid @enderror">
           @error('name_ar')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

            <div class="mb-3">       
           <label for="category_id">  Category Name </label>
           <select name="category_id" class="form-control">
               @foreach($data as $item)
                  <option value="{{$item->id}}" {{$item->id === $service->category->id ? 'selected' : ''}}> {{$item->Trans_Name}}</option>
               @endforeach
           </select>
           @error('name_ar')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

           <div class="col-md-6">
                     <label for="image"> Image </label>
                      <input onchange="return showImg(event)" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                      @error('image')
                        <small class="invalid-feedback"> {{$message}}</small>
                      @enderror
                      @php
                      $src = '';
                        if($service->image) {
                            $src = asset('images/'.$service->image->path);
                        }
                      @endphp
                      <img src="{{$src}}" width="100" id="preview">
               </div>

         <div class="mb-3">
              <button class="btn btn-info"> <i class="fas fa-edit"></i> {{__('admin.save')}} </button>
         </div>



    </form>
@endsection
@section('js')
   <script type="text/javascript">
          function showImg(e) {
            const [file] = e.target.files;
            if(file) {
               preview.src = URL.createObjectURL(file);
            }
          }
     </script>
@endsection