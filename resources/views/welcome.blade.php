    @extends('layouts.app')
    @section('content')

        <script type="text/javascript">
            function deleteItem(id) {
                window.location = '/deleteFood/' + id;

            }
        </script>

        <div class="col-xs-6">
            <h2 class="sub-header">Grocery List</h2>
            <div class="table1">
                <table class="table table-striped">
                    <tr>
                        <td>Id</td>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($items as $item)
                        @if ($item -> inGroceryList == true)
                             <tr>
                                <?php 
                                    $function = 'deleteItem(\''.$item->id.'\')';
                                ?>
                                <td> {!! $item->id !!} </td>
                                <td>{!! $item->item !!}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{!! $item->created_at !!}</td>
                                <td><button class="btn btn-default" id="<?php echo $item->id; ?>"
                                    onClick="<?php echo $function ?>">Remove</button></td>
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
                        <th>id</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                     @foreach ($items as $item)
                        @if ($item -> inPantry == true)
                             <tr>
                                <td>{!! $item->id !!} </td>
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
