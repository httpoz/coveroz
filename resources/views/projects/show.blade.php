@extends('layouts.app')

@section('content')
    <section class="ribbon py-3 text-white mb-5 shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-10 align-items-center">
                    <h3 class="mb-0">
                        <img src="{{ $project->health_img }}" width="48" alt="project health">
                        {{ $project->title }}</h3>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>Run this curl script in one of your CI stages, ideally after tests pass.</p>
                        <code>$ bash <(curl -s https://coveroz.herokuapp.com/bash) {{ $project->hook_id }}</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection