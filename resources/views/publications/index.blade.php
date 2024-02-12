<x-app title='liste Publication'>
    <div class="card-deck w-50 m-auto ">
        @foreach ($publications as $publication)
            <x-publication :canUpdate='false' :publication='$publication' />
        @endforeach
    </div>
    {{ $publications->links() }}
</x-app>

