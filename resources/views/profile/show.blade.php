<x-app title="Profiles">
    <div class="card mb-3">
        <div class="card-body text-center">
            <a href="{{ url('storage/'. $profile->image) }}"><img class="w-25 rounded-circle" src="{{ asset('storage/'. $profile->image) }}" alt="Title"><a>
            <h4 class="card-title"># {{ $profile->id }} {{ $profile->name }}</h4>
            <p class="muted">{{ $profile->created_at->format('Y-m-d') }}</p>
            <h6><a href="mailto: {{ $profile->email }}">{{ $profile->email }}</a></h6>
            <p class="card-text">{{ $profile->bio }}</p>
        </div>
    </div>
    <div class="card-deck w-50 m-auto ">
        @foreach ($profile->publications as $publication)
            <h1> Les publications :</h1>
            <x-publication :canUpdate='$canUpdate = auth()->user()->id === $publication->profile_id' :publication='$publication' />
        @endforeach
    </div>
</x-app>
