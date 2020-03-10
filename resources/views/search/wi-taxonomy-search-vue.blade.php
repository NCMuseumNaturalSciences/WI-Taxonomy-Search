@extends('layouts.master')
@section('title', 'Wildlife Insights Taxonomy Search')
@section('page-header')
@endsection
@section('content')
    <div class="container matches-container">
        <header class="header-wrapper">
            <div class="text-left">
                <h1>Wildlife Insights Taxonomy Bulk Search</h1>
            </div>
        </header>
        <section id="v-app" class="content-wrapper search-container">
            <vue-wi-taxonomy-search></vue-wi-taxonomy-search>
        </section>
    </div>
@endsection
