<div class="card my-3">
    <div class="card-body">
        <div class="row my-2">
            <div class="col position-relative">
                @if($publication->profile !== null && $publication->profile->image !== null)
                    <h4><img class="rounded-circle mx-2" src="{{ asset('storage/' . $publication->profile->image) }}" width="60px"/>{{ $publication->profile->name }}</h4>

                    <a href="{{ route('profile.show', $publication->profile->id) }}" class="stretched-link"></a>
                @endif
            </div>
            <div class="col-2 d-flex justify-content-end">
                @can('update', $publication)
                @can('delete', $publication)
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('publication.edit', $publication->id) }}">Modifier</a>
                        </li>
                        <li>
                            <form action="{{ route('publication.destroy', $publication->id ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr')" class="btn dropdown-item">Supprimer</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endcan
                @endcan
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
        </div>
        <hr>
        <h5 class="card-title">{{ $publication->titre }}</h5>
        <p class="card-text">{{ $publication->body }}</p>
        <p class="card-text"><small class="text-muted">Publié il y a {{ $publication->created_at->diffForHumans() }}</small></p>
    </div>
    @if ( !is_null($publication->image))
        <img class="card-img-top" height="500px" src="{{ asset('storage/'. $publication->image) }}" alt="Card image cap" />
    @endif
</div>
