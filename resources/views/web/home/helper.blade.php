@extends('web.layouts.app')

@section('title','注册')

@section('page_id','sign_up')

@section('css')
    <style>
        .log-in-form {
            /*border: 1px solid #cacaca;*/
            padding: 1rem 1rem !important;
            border-radius: 3px;
        }

        .help-text {
            color: #ec5840;
        }

        textarea:disabled {
            height: 10rem;
            overflow-y: auto;
            cursor: inherit;
            background-color: #fefefe;
            font-size: 90%;
        }
    </style>
@endsection

@section('content')
    帮助页面
@endsection
