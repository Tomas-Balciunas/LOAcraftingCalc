@extends('main')
@section('content')

    @{{ huh }}
<div class="buttons">
    <button v-for="(item, key) in items" >@{{  key }}</button>
</div>

@endsection
