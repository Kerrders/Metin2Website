@extends('layouts.app')

@section('content')

<div class="card">
   <div class="card-header">
      @lang('messages.rankingTitle')
   </div>
   <div class="card-body">
      @if (count($players))
      <table class="table table-striped">
         <tr>
            <th>@lang('messages.rankingIndexTitle')</th>
            <th>@lang('messages.rankingNameTitle')</th>
            <th>@lang('messages.rankingLevelTitle')</th>
            <th>@lang('messages.rankingGuildTitle')</th>
            <th>@lang('messages.rankingEmpireTitle')</th>
            <th>@lang('messages.rankingExpTitle')</th>
         </tr>
         @foreach ($players as $player)
         <tr>
            <td>{{ $rank++ }}</td>
            <td><img src="{{ asset('assets/img/race/race_'.$player->job.'.png') }}" alt="Race {{ $player->playerIndex->empire }}"> {{ $player->name }}</td>
            <td>{{ $player->level }}</td>
            <td>{{ $player->guildMember->guild->name ?? '' }}</td>
            <td><img src="{{ asset('assets/img/empire/'.$player->playerIndex->empire.'_kl.jpg') }}" alt="Empire {{ $player->playerIndex->empire }}"></td>
            <td>{{ $player->exp }}</td>
         </tr>
         @endforeach
      </table>
      @else
         <div class="alert alert-primary" role="alert">
            @lang('messages.noPlayersFound')
         </div>
      @endif
      @if (count($players) > 25)
      <nav aria-label="Page navigation example">
         <ul class="pagination">
           <li class="page-item">
             <a class="page-link" href="#" aria-label="Previous">
               <span aria-hidden="true">&laquo;</span>
             </a>
           </li>
           <li class="page-item"><a class="page-link" href="#">1</a></li>
           <li class="page-item"><a class="page-link" href="#">2</a></li>
           <li class="page-item"><a class="page-link" href="#">3</a></li>
           <li class="page-item">
             <a class="page-link" href="#" aria-label="Next">
               <span aria-hidden="true">&raquo;</span>
             </a>
           </li>
         </ul>
       </nav>
       @endif
   </div>
 </div>
@endsection
