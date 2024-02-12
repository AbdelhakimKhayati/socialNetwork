<x-app title="Profiles">
    <div class="container row mt-3 gx-5">
            @foreach ($profiles as $profile)
            <div class="col mb-4 position-relative ms-4 w-50 ">
            <div class="card w-100 h-100 shadow rounded-bottom " style="width: 18rem;">
                    <img src="{{ asset('storage/'.$profile->image) }}" class="card-img-top" alt="..." height="300px">
                    <div class="card-body">
                      <h4 class="card-text">{{ $profile->name }}</h4>
                      <p class="card-text">{{Str::limit( $profile->bio, 60) }}</p>
                      <a href="{{ route('profile.show', $profile->id) }}" class="stretched-link"></a>
                    </div>
                        <div class="card-footer text-muted d-flex flex-row-reverse" style="z-index: 9">
                            <form action="{{ route('profile.destroy', $profile->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Suprimer</button>
                            </form>
                            <form class="mx-2" action="{{ route('profile.edit', $profile->id) }}" method="GET">
                                @csrf
                                <button class="btn btn-primary">Modifier</button>
                            </form>
                        </div>
                </div>
            </div>

            @endforeach
        </div>
        {{ $profiles->links() }}
</x-app>
