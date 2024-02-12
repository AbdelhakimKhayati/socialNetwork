<x-app title='create Publication'>
    <div class="d-flex justify-content-center mt-5">
    <div class="bg-light p-2 rounded shadow mt-4 w-75">
    <form action="{{ route('publication.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" mb-3">
            <label for="" class="form-label fs-5">Le titre :</label>
            <input type="text" name="titre" id="" class="form-control" placeholder="le titre de votre publication" aria-describedby="helpId" value="{{ old('titre') }}">
                @error('titre')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
          </div>
          <div class="mb-3">
            <label for="" class="form-label fs-5">body : </label>
            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="5" placeholder="script">{{ old('body') }}</textarea>
              @error('body')
              <strong style="color: red">{{ $message }}</strong>
              @enderror
        </div>
          <div class="mb-3">
            <label for="" class="form-label fs-5">Image :</label>
            <input type="file" name="image" id="" class="form-control" placeholder="insere votre image" aria-describedby="helpId">
            @error('image')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
          <div class="d-grid my-2">
              <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
    </form>
        </div>
    </div>
    </x-app>
