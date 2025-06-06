@extends('admin.master')

@section('title', 'Create')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> {{__('admin.create_C')}} </h1>

    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="mb-3">       
           <label for="name_en">  Category Name English </label>
           <input type="text" name="name_en" placeholder="Name English" value="{{old('name_en')}}" class="form-control @error('name_en') is-invalid @enderror">
           @error('name_en')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

          <div class="mb-3">       
           <label for="name_ar">  Category Name Arabic </label>
           <input type="text" name="name_ar" placeholder="Name Arabic" value="{{old('name_ar')}}" class="form-control @error('name_ar') is-invalid @enderror">
           @error('name_ar')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

          <div class="mb-3 col-md-6">
    <label for="image"> Image </label>
    <input onchange="return showImg(event)" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
    @error('image')
      <small class="invalid-feedback"> {{$message}}</small>
    @enderror
    <div class="mt-2 mb-4">
        <img src="" width="100" id="preview" style="display: block;">
    </div>
</div>

         <div class="mb-3 mt-4">
              <button class="btn btn-success"> <i class="fas fa-save"></i> {{__('admin.save')}} </button>
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
