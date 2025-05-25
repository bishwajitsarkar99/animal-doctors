@props(['conentId', 'tabPanel'=> '', 'tabClass'=>''])
<div id="{{ $conentId }}" class="container {{ $tabPanel }} {{ $tabClass }}"><br>{{$slot}}</div>