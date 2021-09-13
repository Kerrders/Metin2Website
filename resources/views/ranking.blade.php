@extends('layouts.app')

@section('content')
<div class="panel-heading">
   <h2>@lang('messages.rankingTitle')</h2>
</div>
<div class="panel-body">
   <div class="con-wrapper">
      @if (count($players))
      <table>
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
            <td>{{ $player->name }}</td>
            <td>{{ $player->level }}</td>
            <td>{{ $player->guildMember->guild->name ?? '' }}</td>
            <td>{{ $player->playerIndex->empire }}</td>
            <td>{{ $player->exp }}</td>
         </tr>
         @endforeach
      </table>
      @else
         <div class="alert alert-primary" role="alert">
            @lang('messages.noPlayersFound')
         </div>
      @endif
   </div>
</div>
<div class="content_footer"></div>
@endsection
