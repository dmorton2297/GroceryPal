    @extends('layouts.app')
    @section('content')


        <div class="col-xs-6">
            <h2 class="sub-header">Grocery List</h2>
            <div class="table1">
                <table class="table table-striped">
                    <tr>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Date Added</th>
                    </tr>
                    @foreach ($items as $item)
                        @if ($item -> inGroceryList == true)
                             <tr>
                                <td>{!! $item->item !!}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{{!! $item->created_at !!}}</td>
                             </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
         <div class="col-xs-6">
            <h2 class="sub-header">Current Pantry</h2>
            <div class="table2">
                <table class="table table-striped">
                    <tr>
                        <th>Item</th>
                        <th>Date Added</th>
                    </tr>
                     @foreach ($items as $item)
                        @if ($item -> inPantry == true)
                             <tr>
                                <td>{!! $item->item !!}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{{!! $item->created_at !!}}</td>
                             </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
@stop
