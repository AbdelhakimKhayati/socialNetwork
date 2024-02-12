<x-app title='create profile'>
    <div class="bg-light p-2 mb-4 rounded shadow">
    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label fs-5">Nom complete :</label>
            <input type="text" name="name" id="" class="form-control" placeholder="votre nom complaite" aria-describedby="helpId" value="{{ old("name", $profile->name) }}">
                @error('name')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
          </div>
          <div class="mb-3">
              <label for="" class="form-label fs-5">Email :</label>
              <input type="email" name="email" id="" class="form-control" placeholder="votre email" aria-describedby="helpId" value="{{ old('email',$profile->email) }}">
                @error('email')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
          </div>
          <div class="mb-3">
              <label for="" class="form-label fs-5">Mode de pass :</label>
              <input type="password" name="password" id="" class="form-control" placeholder="password" aria-describedby="helpId">
                @error('password')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
          </div>
            <div class="mb-3">
                <label for="" class="form-label fs-5">Confirmation de mot de pass :</label>
                <input type="password" name="password_confirmation" id="" class="form-control" placeholder="password confirmation" aria-describedby="helpId">
                @error('password_confirmation')
                <strong style="color: red">{{ $message }}</strong>
                @enderror
            </div>
          <div class="mb-3">
              <label for="" class="form-label fs-5">description : </label>
              <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3" placeholder="script">{{ old('bio',$profile->bio) }}</textarea>
                @error('bio')
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
              <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
    </form>
    </div>
    </x-app>
