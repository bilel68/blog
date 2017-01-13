@extends('templates.base')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Heroes</div>


                <div style="text-align=center;" class="panel-body">


                  @if(! empty($heroes))
                    @foreach($heroes as $hero)

                      {{ $hero->name }}

                      @foreach($hero->superpowers as $superpower)
                        {{ $superpower->name }}

                     @endforeach
                     @if($hero->nemesis != null)
                       <span>Nemesis : <b> {{ $hero->nemesis->name }} </b></span>
                     @endif
                     <a href='/hero/{{ $hero->id }}/update'>Update</a>
                     <a href='/hero/{{ $hero->id }}/delete'>Delete</a>
                     <br>
                   @endforeach
                  @elseif(! empty($hero))
                    {{ $hero }}
                    @foreach($hero->superpowers as $superpower)
                      {{ $superpower->name }}
                    @endforeach

                  @else
                    Aucun Hero affiché
                  @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
