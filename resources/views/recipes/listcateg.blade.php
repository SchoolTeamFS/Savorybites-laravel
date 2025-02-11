<x-app-layout>
    @section('test')
    <br><br><br><br><br>
        @foreach($categories as $elt)
            <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $elt->name)]) }}">
                {{ $elt->name }}
            </a>
        @endforeach
    @endsection

   
</x-app-layout>
