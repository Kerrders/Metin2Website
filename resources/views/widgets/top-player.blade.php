<div class="card">
    <div class="card-header">
       @lang('messages.rankingTitle')
    </div>
    <div class="card-body">
       @if (count($topPlayers))
       <table class="table table-striped">
          <tr>
             <th>@lang('messages.rankingIndexTitle')</th>
             <th>@lang('messages.rankingNameTitle')</th>
             <th>@lang('messages.rankingLevelTitle')</th>
          </tr>
          @foreach ($topPlayers as $player)
          <tr>
             <td>{{ $loop->iteration }}</td>
             <td><img src="{{ asset('assets/img/race/race_'.$player->job.'.png') }}" alt="Race {{ $player->playerIndex->empire }}"> {{ $player->name }}</td>
             <td>{{ $player->level }}</td>
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
