@extends('user.ally.menu')

@section('ally_content')
<div class="container">
    @if (empty($data["allies"]))
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('ally.noAllies') }}</div>
                    <div class="card-body">
                        <a href="{{ route('client.list') }}" class="btn btn-outline-success btn-block">{{ __('ally.list') }}</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>{{ __('ally.id') }}</th>
                          <th>{{ __('ally.title') }}</th>
                          <th>{{ __('ally.category') }}</th>
                          <th>{{ __('ally.detail') }}</th>
                          <th>{{ __('ally.price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["allies"] as $ally)
                        <tr>
                            @foreach($ally as $value)
                                    <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
