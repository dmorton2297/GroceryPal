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
                var php_var = "<?php echo $stacked; ?>";
                if ($(window).width() < 960) {
                    document.getElementById('normal').style.display = 'none';
                    document.getElementById('stack-control').style.display = 'none';
                    document.getElementById('normal-control').style.display = 'none';

                } else if (php_var == "1") {
                    document.getElementById('normal').style.display = 'none';
                    document.getElementById('stack-control').style.display = 'none';

                } else {
                    document.getElementById('mobile').style.display = 'none';
                    document.getElementById('normal-control').style.display = 'none';

                }

             }
        </script>

   

        <div class="row">
            <div class="col-md-1" id="stack-control">
                <button class="btn btn-default"><a href="{{ route('welcomeStacked') }}">Stacked</a></button>
            </div>
             <div class="col-md-1" id="normal-control">
                <button class="btn btn-default"><a href="{{ route('welcome') }}">Normal</a></button>
            </div>
        </div>

        
        <div id="normal">
            <div class="col-xs-6">
                <h2 class="sub-header">Grocery List</h2>
                <div class="table1">
                    <table class="table table-striped" id = "table">
                        <tr>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Date Added</th>
                            <th>Delete</th>
                            <th>Move to Pantry</th>
                        </tr>
                        @foreach ($items as $item)
                            @if ($item -> inGroceryList == true && $item -> userId == Auth::user()->id)
                                 <tr id="row">
                                    <?php 
                                        $function = 'deleteItem(\''.$item->id.'\')';
                                        
                                    ?>
                                    <?php
                                        $function2 = 'moveItem(\''.$item->id.'\')';
                                    ?>
                                    <td id="col">{!! $item->item !!}</td>
                                    <td id="col">{!! $item->description !!}</td>
                                    <td id="col">{!! $item->created_at !!}</td>
                                    <td id="col"><button class="btn btn-danger" onClick="<?php echo $function; ?>">Remove</button></td>
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
                    <table class="table table-striped" id="table">
                        <tr>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Date Added</th>
                            <th>Delete</th>
                        </tr>
                         @foreach ($items as $item)
                            @if ($item -> inPantry == true && $item -> userId == Auth::user()->id)
                                 <tr id="row">
                                    <?php 
                                        $function = 'deleteItem(\''.$item->id.'\')';
                                    ?>
                                    <td id="col">{!! $item->item !!}</td>
                                    <td id="col">{!! $item->description !!}</td>
                                    <td id="col">{{!! $item->created_at !!}}</td>
                                    <td id="col"><button class="btn btn-danger" onClick="<?php echo $function; ?>">Remove</button></td>
                                 </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div id="mobile">
         <h2 class="sub-header" id="Header">Grocery List</h2>
        <table class="table table-striped" id="table">
                    <tr>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Date Added</th>
                        <th>Delete</th>
                        <th>Move to Pantry</th>
                    </tr>
                    @foreach ($items as $item)
                        @if ($item -> inGroceryList == true && $item -> userId == Auth::user()->id )
                             <tr id="row">
                                <?php 
                                    $function = 'deleteItem(\''.$item->id.'\')';
                                ?>

                                <?php
                                        $function2 = 'moveItem(\''.$item->id.'\')';
                                    ?>
                                <td id = "col">{!! $item->item !!}</td>
                                <td id = "col">{!! $item->description !!}</td>
                                <td id = "col">{!! $item->created_at !!}</td>
                                <td id = "col"><button class="btn btn-default" onClick="<?php echo $function; ?>">Remove</button></td>
                                <td id = "col"><button class="btn btn-danger" onClick="<?php echo $function2; ?>">Move</button></td>
                             </tr>
                        @endif
                    @endforeach
            </table>

            <h2 class="sub-header" id="Header">Current Pantry</h2>
            <table class="table table-striped" id="table">
                    <tr>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Date Added</th>
                        <th>Delete</th>
                    </tr>
                     @foreach ($items as $item)
                        @if ($item -> inPantry == true && $item -> userId == Auth::user()->id)
                             <tr id="row">
                                <?php 
                                    $function = 'deleteItem(\''.$item->id.'\')';
                                ?>
                                <td id="col">{!! $item->item !!}</td>
                                <td id="col">{!! $item->description !!}</td>
                                <td id="col">{{!! $item->created_at !!}}</td>
                                 <td id="col"><button class="btn btn-danger" onClick="<?php echo $function; ?>">Remove</button></td>
                             </tr>
                        @endif
                    @endforeach
            </table>
        </div>
@stop
