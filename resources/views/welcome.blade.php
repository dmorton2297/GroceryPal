<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Style -->
        <style type="text/css">
            /* Add a black background color to the top navigation */
            .topnav {
                background-color: #DCEDC8;
                overflow: hidden;
            }

            /* Style the links inside the navigation bar */
            .topnav a {
                float: left;
                color: #000000;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            /* Change the color of links on hover */
            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }

            /* Add a color to the active/current link */
            .topnav a.active {
                background-color: #4CAF50;
                color: white;
            }
        </style>

    </head>
    <body>

        <div class="topnav" id="myTopnav">
            <a class="active" href="#home">Home</a>
            <a href="#news">Recipe Suggestions</a>
        </div>
        <div class="col-xs-6">
            <h2 class="sub-header">Grocery List</h2>
            <div class="table1">
                <table class="table table-striped">
                    <tr>
                        <th>Item</th>
                        <th>Date Added</th>
                    </tr>
                    <tr>
                        <td>Chicken</td>
                        <td>May 30</td>
                    </tr>
                    <tr>
                        <td>Chips</td>
                        <td>June 30</td>
                    </tr>
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
                    <tr>
                        <td>Chicken</td>
                        <td>May 30</td>
                    </tr>
                    <tr>
                        <td>Chips</td>
                        <td>June 30</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
