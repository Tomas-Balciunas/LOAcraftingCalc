@extends('main')
@section('content')

    @{{ huh }}
<div class="buttons">
    <button v-for="(item) in items" @click="getItem(item)">@{{  item }}</button>
</div>

@endsection
