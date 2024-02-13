<x-app title='liste Publication'>
    <div class="card-deck w-50 m-auto ">
        @foreach ($publications as $publication)
            <x-publication :canUpdate='false' :publication='$publication' />
        @endforeach
    </div>
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
    {{ $publications->links() }}
</x-app>

