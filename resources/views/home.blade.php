@extends('layouts.main')

@section('titolo', "Home | ")

@section('body')
<div class="container">
    <a href="/open_gate" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">TEST CANCELLO</a>
</div>
@endsection

@section('scripts')
<script src="<?= asset("assets/js/home.js") ?>"></script>
@endsection