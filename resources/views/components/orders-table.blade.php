<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-auto">
                <div class="fw-600">Order number</div>
                <span>#3286</span>
            </div>
            <div class="col-auto">
                <div class="fw-600">Date placed</div>
                <span>Jul 20, 2022</span>
            </div>
            <div class="col-auto">
                <div class="fw-600">Total amount</div>
                <span>$115.00</span>
            </div>
            <div class="ml-auto col-auto">
                <a href="#" class="btn btn-primary">View Order</a>
            </div>
        </div>
    </div>
    <div class="card-body">
glt
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            @if (auth()->user()->is_admin)
                <th scope="col">User Id</th>
            @endif
            <th scope="col">Status</th>
            <th scope="col">Message</th>
            <th scope="col">Products</th>
            <th scope="col">Total</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                @if (auth()->user()->is_admin)
                    <td> 
                        <a href="{{route('user.index', $order->user_id)}}" class="link-primary">
                            {{$order->user->email}}
                        </a>
                    </td>
                @endif
                <td class="link-info">{{$order->status_payment == config('constants.payment_status.paid') ? 'paid' : ($order->status_payment == config('constants.payment_status.unpaid') ? 'unpaid' : 'rejected')}}</td>
                @if ($order->status_payment == config('constants.payment_status.reject'))
                    <td>{{$order->status_payment_reason}}</td>
                @endif
                <td>{{$order->items_count}}</td>
                <td>${{$order->total_price}}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('orders.show', $order->order_id)}}" class="btn btn-primary">Details</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
