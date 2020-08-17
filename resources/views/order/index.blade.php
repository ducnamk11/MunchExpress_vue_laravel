@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage orders for <strong>{{$resto['name']}}</strong></h2>
                <br>
                <a href="{{route('restos.orders.add', $resto->id)}}" class="btn btn-primary  ">Add</a>
                <br>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if($orders->count() >0)
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Customer Detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->amount}}</td>
                                    <td>{{($order->isComplete) ? 'Completed' : 'Uncomplete'}}</td>
                                    <td>
                                        <p>Name: {{$order['order_details']['customer_name']}}</p>
                                        <p>Phone: {{$order['order_details']['customer_phone']}}</p>
                                        <p>address: {{$order['order_details']['customer_address']}}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    @else
                        <p>You dont have data!</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import RestoGroup from "../js/modules/resto/RestoGroup";

    export default {
        components: {RestoGroup}
    }
</script>
