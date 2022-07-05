@extends('auth.layouts.master')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Когда отправлен
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Действия
                </th>
            </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->created_at->format('Y:m:d H:i:s') }}</td>
                        <td>{{ $order->sum }} {{ $order->currency->symbol }}</td>

                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" type="button"
                                @if (auth()->user()->isAdmin())
                                    href="{{ route('admin.order.show', $order->id) }}"
                                @else
                                    href="{{ route('person.order.show', $order->id) }}"
                                @endif

                                >Открыть</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $orders->withQueryString()->links('includes.pagination') }}
@endsection
