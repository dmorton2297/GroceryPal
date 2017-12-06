    @extends('layouts.app')
    @section('content')
        <body onload="onload()"></body>

        <script type="text/javascript">
            function deleteItem(id) {
                window.location = '/deleteFood/' + id;
            }
        </script>

        <script type="text/javascript">
            function moveItem(item) {
                window.location = '/moveFood/' + item;
            }
        </script>

        <script type="text/javascript">
            function onload() {
                if ($(window).width() < 960) {
                    document.getElementById('normal').style.display = 'none';
                } else {
                    document.getElementById('mobile').style.display = 'none';
                }

             }
        </script>

        <div id="normal">
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
                            <th>Transfer to Pantry</th>
                        </tr>
                        @foreach ($items as $item)
                            @if ($item -> inGroceryList == true && $item -> userId == Auth::user()->id)
                                 <tr>
                                    <?php 
                                        $function = 'deleteItem(\''.$item->id.'\')';
                                        
                                    ?>
                                    <?php
                                        $function2 = 'moveItem(\''.$item->id.'\')';
                                    ?>
                                    <td> {!! $item->id !!} </td>
                                    <td>{!! $item->item !!}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{!! $item->created_at !!}</td>
                                    <td><button class="btn btn-danger" onClick="<?php echo $function; ?>">Remove</button></td>
                                    <td><button class="btn btn-default" onClick="<?php echo $function2; ?>">Move</button></td>
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
                            @if ($item -> inPantry == true && $item -> userId == Auth::user()->id)
                                 <tr>
                                    <?php 
                                        $function = 'deleteItem(\''.$item->id.'\')';
                                    ?>
                                    <td>{!! $item->id !!} </td>
                                    <td>{!! $item->item !!}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{{!! $item->created_at !!}}</td>
                                     <td><button class="btn btn-danger" onClick="<?php echo $function; ?>">Remove</button></td>
                                 </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div id="mobile">
         <h2 class="sub-header">Grocery List</h2>
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
                                <td><button class="btn btn-default" onClick="<?php echo $function; ?>">Remove</button></td>
                                <td><button class="btn btn-danger" onClick="<?php echo $function; ?>">Remove</button></td>
                             </tr>
                        @endif
                    @endforeach
            </table>

            <h2 class="sub-header">Current Pantry</h2>
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
                                <?php 
                                    $function = 'deleteItem(\''.$item->id.'\')';
                                ?>
                                <td>{!! $item->id !!} </td>
                                <td>{!! $item->item !!}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{{!! $item->created_at !!}}</td>
                                 <td><button class="btn btn-default" onClick="<?php echo $function; ?>">Remove</button></td>
                             </tr>
                        @endif
                    @endforeach
            </table>
        </div>
@stop
