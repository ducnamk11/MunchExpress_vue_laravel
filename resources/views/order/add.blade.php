@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Home delivery orders for <strong>{{$resto->name}}</strong></h2>
                <br>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <order-group :resto-id="{{$resto->id}}"></order-group>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import RestoGroup from "../js/modules/resto/RestoGroup";
    import OrderGroup from "../js/modules/order/OrderGroup";

    export default {
        components: {RestoGroup, OrderGroup}
    }
</script>
