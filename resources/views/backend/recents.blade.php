@extends('frontend.includes.sidebar')
@include('frontend.includes.header')

<div class="col-sm-9 ml-5 mt-5 text-info">
    <form class="horizontal">
        {{ csrf_field() }}
        @if(isset($status)&& isset($project))
            <table>
                @foreach ($status as $row)
                    <tr><td class="mt-4">{{ $row->action }}  at   {{ $row->created_at }}</td></tr>
                @endforeach
            </table>
    </form>
    @endif
</div>



