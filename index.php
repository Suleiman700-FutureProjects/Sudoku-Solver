<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sudoku Solver</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="container">

    <h1 class="text-center">JS Sudoku Solver</h1>
    <h6 class="text-center">Time Took: <span id="time_took">0</span></h6>

    <div class="row">
        <div class="col-2 col-md-1">
            <button class="btn btn-primary" id="solve">Solve</button>
        </div>
        <div class="col-2 col-md-1">
            <button class="btn btn-danger" id="clear">Clear</button>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col-6">
            <label>Number Of Tries</label>
            <select class="form-select" id="num_of_tries">
                <option value="1">1 Try</option>
                <option value="2">2 Tries</option>
                <option value="3" selected class="text-success">* 3 Tries</option>
                <option value="4">4 Tries</option>
                <option value="5">5 Tries</option>
            </select>
        </div>
        <div class="col-6">
            <label>Manual Entry Or Demo</label>
            <select class="form-select" id="entry_type">
                <option value="manual" selected class="text-success">* Manual Entry (Manually enter numbers)</option>
                <option value="demo1" selected>Demo 1</option>
                <option value="demo2">Demo 2</option>
            </select>
        </div>
    </div>


    <table id="grid" class="mx-auto mt-5">
        <tr>
            <td><input id="cell-0"  class="cell" col="0" row="0" block="0" xy="0,0" value="" type="text"></td>
            <td><input id="cell-1"  class="cell" col="1" row="0" block="0" xy="0,1" value="" type="text"></td>
            <td><input id="cell-2"  class="cell" col="2" row="0" block="0" xy="0,2" value="" type="text"></td>

            <td><input id="cell-3"  class="cell" col="3" row="0" block="1" xy="1,0" value="2" type="text"></td>
            <td><input id="cell-4"  class="cell" col="4" row="0" block="1" xy="1,1" value="6" type="text"></td>
            <td><input id="cell-5"  class="cell" col="5" row="0" block="1" xy="1,2" value="" type="text"></td>

            <td><input id="cell-6"  class="cell" col="6" row="0" block="2" xy="2,0" value="7" type="text"></td>
            <td><input id="cell-7"  class="cell" col="7" row="0" block="2" xy="2,1" value="" type="text"></td>
            <td><input id="cell-8"  class="cell" col="8" row="0" block="2" xy="2,2" value="1" type="text"></td>
        </tr>

        <tr>
            <td><input id="cell-9"  class="cell"  col="0" row="1" block="0" xy="0,3" value="6" type="text"></td>
            <td><input id="cell-10"  class="cell" col="1" row="1" block="0" xy="0,4" value="8" type="text"></td>
            <td><input id="cell-11"  class="cell" col="2" row="1" block="0" xy="0,5" value="" type="text"></td>

            <td><input id="cell-12"  class="cell" col="3" row="1" block="1" xy="1,3" value="" type="text"></td>
            <td><input id="cell-13"  class="cell" col="4" row="1" block="1" xy="1,4" value="7" type="text"></td>
            <td><input id="cell-14"  class="cell" col="5" row="1" block="1" xy="1,5" value="" type="text"></td>

            <td><input id="cell-15"  class="cell" col="6" row="1" block="2" xy="2,3" value="" type="text"></td>
            <td><input id="cell-16"  class="cell" col="7" row="1" block="2" xy="2,4" value="9" type="text"></td>
            <td><input id="cell-17"  class="cell" col="8" row="1" block="2" xy="2,5" value="" type="text"></td>
        </tr>

        <tr>
            <td><input id="cell-18"  class="cell" col="0" row="2" block="0" xy="0,6" value="1" type="text"></td>
            <td><input id="cell-19"  class="cell" col="1" row="2" block="0" xy="0,7" value="9" type="text"></td>
            <td><input id="cell-20"  class="cell" col="2" row="2" block="0" xy="0,8" value="" type="text"></td>

            <td><input id="cell-21"  class="cell" col="3" row="2" block="1" xy="1,6" value="" type="text"></td>
            <td><input id="cell-22"  class="cell" col="4" row="2" block="1" xy="1,7" value="" type="text"></td>
            <td><input id="cell-23"  class="cell" col="5" row="2" block="1" xy="1,8" value="4" type="text"></td>

            <td><input id="cell-24"  class="cell" col="6" row="2" block="2" xy="2,6" value="5" type="text"></td>
            <td><input id="cell-25"  class="cell" col="7" row="2" block="2" xy="2,7" value="" type="text"></td>
            <td><input id="cell-26"  class="cell" col="8" row="2" block="2" xy="2,8" value="" type="text"></td>
        </tr>

        <tr>
            <td><input id="cell-27"  class="cell" col="0" row="3" block="3" xy="3,0" value="8" type="text"></td>
            <td><input id="cell-28"  class="cell" col="1" row="3" block="3" xy="3,1" value="2" type="text"></td>
            <td><input id="cell-29"  class="cell" col="2" row="3" block="3" xy="3,2" value="" type="text"></td>

            <td><input id="cell-30"  class="cell" col="3" row="3" block="4" xy="4,0" value="1" type="text"></td>
            <td><input id="cell-31"  class="cell" col="4" row="3" block="4" xy="4,1" value="" type="text"></td>
            <td><input id="cell-32"  class="cell" col="5" row="3" block="4" xy="4,2" value="" type="text"></td>

            <td><input id="cell-33"  class="cell" col="6" row="3" block="5" xy="5,0" value="" type="text"></td>
            <td><input id="cell-34"  class="cell" col="7" row="3" block="5" xy="5,1" value="4" type="text"></td>
            <td><input id="cell-35"  class="cell" col="8" row="3" block="5" xy="5,2" value="" type="text"></td>
        </tr>

        <tr>
            <td><input id="cell-36"  class="cell" col="0" row="4" block="3" xy="3,3" value="" type="text"></td>
            <td><input id="cell-37"  class="cell" col="1" row="4" block="3" xy="3,4" value="" type="text"></td>
            <td><input id="cell-38"  class="cell" col="2" row="4" block="3" xy="3,5" value="4" type="text"></td>

            <td><input id="cell-39"  class="cell" col="3" row="4" block="4" xy="4,3" value="6" type="text"></td>
            <td><input id="cell-40"  class="cell" col="4" row="4" block="4" xy="4,4" value="" type="text"></td>
            <td><input id="cell-41"  class="cell" col="5" row="4" block="4" xy="4,5" value="2" type="text"></td>

            <td><input id="cell-42"  class="cell" col="6" row="4" block="5" xy="5,3" value="9" type="text"></td>
            <td><input id="cell-43"  class="cell" col="7" row="4" block="5" xy="5,4" value="" type="text"></td>
            <td><input id="cell-44"  class="cell" col="8" row="4" block="5" xy="5,5" value="" type="text"></td>
        </tr>

        <tr>
            <td><input id="cell-45"  class="cell" col="0" row="5" block="3" xy="3,6" value="" type="text"></td>
            <td><input id="cell-46"  class="cell" col="1" row="5" block="3" xy="3,7" value="5" type="text"></td>
            <td><input id="cell-47"  class="cell" col="2" row="5" block="3" xy="3,8" value="" type="text"></td>

            <td><input id="cell-48"  class="cell" col="3" row="5" block="4" xy="4,6" value="" type="text"></td>
            <td><input id="cell-49"  class="cell" col="4" row="5" block="4" xy="4,7" value="" type="text"></td>
            <td><input id="cell-50"  class="cell" col="5" row="5" block="4" xy="4,8" value="3" type="text"></td>

            <td><input id="cell-51"  class="cell" col="6" row="5" block="5" xy="5,6" value="" type="text"></td>
            <td><input id="cell-52"  class="cell" col="7" row="5" block="5" xy="5,7" value="2" type="text"></td>
            <td><input id="cell-53"  class="cell" col="8" row="5" block="5" xy="5,8" value="8" type="text"></td>
        </tr>

        <tr>
            <td><input id="cell-54"  class="cell" col="0" row="6" block="6" xy="6,0" value="" type="text"></td>
            <td><input id="cell-55"  class="cell" col="1" row="6" block="6" xy="6,1" value="" type="text"></td>
            <td><input id="cell-56"  class="cell" col="2" row="6" block="6" xy="6,2" value="9" type="text"></td>

            <td><input id="cell-57"  class="cell" col="3" row="6" block="7" xy="7,0" value="3" type="text"></td>
            <td><input id="cell-58"  class="cell" col="4" row="6" block="7" xy="7,1" value="" type="text"></td>
            <td><input id="cell-59"  class="cell" col="5" row="6" block="7" xy="7,2" value="" type="text"></td>

            <td><input id="cell-60"  class="cell" col="6" row="6" block="8" xy="8,0" value="" type="text"></td>
            <td><input id="cell-61"  class="cell" col="7" row="6" block="8" xy="8,1" value="7" type="text"></td>
            <td><input id="cell-62"  class="cell" col="8" row="6" block="8" xy="8,2" value="4" type="text"></td>
        </tr>

        <tr>
            <td><input id="cell-63"  class="cell" col="0" row="7" block="6" xy="6,3" value="" type="text"></td>
            <td><input id="cell-64"  class="cell" col="1" row="7" block="6" xy="6,4" value="4" type="text"></td>
            <td><input id="cell-65"  class="cell" col="2" row="7" block="6" xy="6,5" value="" type="text"></td>

            <td><input id="cell-66"  class="cell" col="3" row="7" block="7" xy="7,3" value="" type="text"></td>
            <td><input id="cell-67"  class="cell" col="4" row="7" block="7" xy="7,4" value="5" type="text"></td>
            <td><input id="cell-68"  class="cell" col="5" row="7" block="7" xy="7,5" value="" type="text"></td>

            <td><input id="cell-69"  class="cell" col="6" row="7" block="8" xy="8,3" value="" type="text"></td>
            <td><input id="cell-70"  class="cell" col="7" row="7" block="8" xy="8,4" value="3" type="text"></td>
            <td><input id="cell-71"  class="cell" col="8" row="7" block="8" xy="8,5" value="6" type="text"></td>
        </tr>

        <tr>
            <td><input id="cell-72"  class="cell" col="0" row="8" block="6" xy="6,6" value="7" type="text"></td>
            <td><input id="cell-73"  class="cell" col="1" row="8" block="6" xy="6,7" value="" type="text"></td>
            <td><input id="cell-74"  class="cell" col="2" row="8" block="6" xy="6,8" value="3" type="text"></td>

            <td><input id="cell-75"  class="cell" col="3" row="8" block="7" xy="7,6" value="" type="text"></td>
            <td><input id="cell-76"  class="cell" col="4" row="8" block="7" xy="7,7" value="1" type="text"></td>
            <td><input id="cell-77"  class="cell" col="5" row="8" block="7" xy="7,8" value="8" type="text"></td>

            <td><input id="cell-78"  class="cell" col="6" row="8" block="8" xy="8,6" value="" type="text"></td>
            <td><input id="cell-79"  class="cell" col="7" row="8" block="8" xy="8,7" value="" type="text"></td>
            <td><input id="cell-80"  class="cell" col="8" row="8" block="8" xy="8,8" value="" type="text"></td>
        </tr>

    </table>

    <a href="https://github.com/Suleiman700" target="_blank">GitHub</a>
<!--    <table id="grid" class="mx-auto">-->
<!--        <tr>-->
<!--            <td><input id="cell-0"  class="cell" col="0" row="0" block="0" xy="0,0" value="" type="text"></td>-->
<!--            <td><input id="cell-1"  class="cell" col="1" row="0" block="0" xy="0,1" value="" type="text"></td>-->
<!--            <td><input id="cell-2"  class="cell" col="2" row="0" block="0" xy="0,2" value="" type="text"></td>-->

<!--            <td><input id="cell-3"  class="cell" col="3" row="0" block="1" xy="1,0" type="text" value="2" disabled></td>-->
<!--            <td><input id="cell-4"  class="cell" col="4" row="0" block="1" xy="1,1" type="text" value="6" disabled></td>-->
<!--            <td><input id="cell-5"  class="cell" col="5" row="0" block="1" xy="1,2" value="" type="text"></td>-->

<!--            <td><input id="cell-6"  class="cell" col="6" row="0" block="2" xy="2,0" type="text" value="7" disabled></td>-->
<!--            <td><input id="cell-7"  class="cell" col="7" row="0" block="2" xy="2,1" value="" type="text"></td>-->
<!--            <td><input id="cell-8"  class="cell" col="8" row="0" block="2" xy="2,2" type="text" value="1" disabled></td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td><input id="cell-9"  class="cell"  col="0" row="1" block="0" xy="0,3" type="text" value="6" disabled></td>-->
<!--            <td><input id="cell-10"  class="cell" col="1" row="1" block="0" xy="0,4" type="text" value="8" disabled></td>-->
<!--            <td><input id="cell-11"  class="cell" col="2" row="1" block="0" xy="0,5" value="" type="text"></td>-->

<!--            <td><input id="cell-12"  class="cell" col="3" row="1" block="1" xy="1,3" value="" type="text"></td>-->
<!--            <td><input id="cell-13"  class="cell" col="4" row="1" block="1" xy="1,4" type="text" value="7" disabled></td>-->
<!--            <td><input id="cell-14"  class="cell" col="5" row="1" block="1" xy="1,5" value="" type="text"></td>-->

<!--            <td><input id="cell-15"  class="cell" col="6" row="1" block="2" xy="2,3" value="" type="text"></td>-->
<!--            <td><input id="cell-16"  class="cell" col="7" row="1" block="2" xy="2,4" type="text" value="9" disabled></td>-->
<!--            <td><input id="cell-17"  class="cell" col="8" row="1" block="2" xy="2,5" value="" type="text"></td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td><input id="cell-18"  class="cell" col="0" row="2" block="0" xy="0,6" type="text" value="1" disabled></td>-->
<!--            <td><input id="cell-19"  class="cell" col="1" row="2" block="0" xy="0,7" type="text" value="9" disabled></td>-->
<!--            <td><input id="cell-20"  class="cell" col="2" row="2" block="0" xy="0,8" value="" type="text"></td>-->

<!--            <td><input id="cell-21"  class="cell" col="3" row="2" block="1" xy="1,6" value="" type="text"></td>-->
<!--            <td><input id="cell-22"  class="cell" col="4" row="2" block="1" xy="1,7" value="" type="text"></td>-->
<!--            <td><input id="cell-23"  class="cell" col="5" row="2" block="1" xy="1,8" type="text" value="4" disabled></td>-->

<!--            <td><input id="cell-24"  class="cell" col="6" row="2" block="2" xy="2,6" type="text" value="5" disabled></td>-->
<!--            <td><input id="cell-25"  class="cell" col="7" row="2" block="2" xy="2,7" value="" type="text"></td>-->
<!--            <td><input id="cell-26"  class="cell" col="8" row="2" block="2" xy="2,8" value="" type="text"></td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td><input id="cell-27"  class="cell" col="0" row="3" block="3" xy="3,0" type="text" value="8" disabled></td>-->
<!--            <td><input id="cell-28"  class="cell" col="1" row="3" block="3" xy="3,1" type="text" value="2" disabled></td>-->
<!--            <td><input id="cell-29"  class="cell" col="2" row="3" block="3" xy="3,2" value="" type="text"></td>-->

<!--            <td><input id="cell-30"  class="cell" col="3" row="3" block="4" xy="4,0" type="text" value="1" disabled></td>-->
<!--            <td><input id="cell-31"  class="cell" col="4" row="3" block="4" xy="4,1" value="" type="text"></td>-->
<!--            <td><input id="cell-32"  class="cell" col="5" row="3" block="4" xy="4,2" value="" type="text"></td>-->

<!--            <td><input id="cell-33"  class="cell" col="6" row="3" block="5" xy="5,0" value="" type="text"></td>-->
<!--            <td><input id="cell-34"  class="cell" col="7" row="3" block="5" xy="5,1" type="text" value="4" disabled></td>-->
<!--            <td><input id="cell-35"  class="cell" col="8" row="3" block="5" xy="5,2" value="" type="text"></td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td><input id="cell-36"  class="cell" col="0" row="4" block="3" xy="3,3" value="" type="text"></td>-->
<!--            <td><input id="cell-37"  class="cell" col="1" row="4" block="3" xy="3,4" value="" type="text"></td>-->
<!--            <td><input id="cell-38"  class="cell" col="2" row="4" block="3" xy="3,5" type="text" value="4" disabled></td>-->

<!--            <td><input id="cell-39"  class="cell" col="3" row="4" block="4" xy="4,3" type="text" value="6" disabled></td>-->
<!--            <td><input id="cell-40"  class="cell" col="4" row="4" block="4" xy="4,4" value="" type="text"></td>-->
<!--            <td><input id="cell-41"  class="cell" col="5" row="4" block="4" xy="4,5" type="text" value="2" disabled></td>-->

<!--            <td><input id="cell-42"  class="cell" col="6" row="4" block="5" xy="5,3" type="text" value="9" disabled></td>-->
<!--            <td><input id="cell-43"  class="cell" col="7" row="4" block="5" xy="5,4" value="" type="text"></td>-->
<!--            <td><input id="cell-44"  class="cell" col="8" row="4" block="5" xy="5,5" value="" type="text"></td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td><input id="cell-45"  class="cell" col="0" row="5" block="3" xy="3,6" value="" type="text"></td>-->
<!--            <td><input id="cell-46"  class="cell" col="1" row="5" block="3" xy="3,7" type="text" value="5" disabled></td>-->
<!--            <td><input id="cell-47"  class="cell" col="2" row="5" block="3" xy="3,8" value="" type="text"></td>-->

<!--            <td><input id="cell-48"  class="cell" col="3" row="5" block="4" xy="4,6" value="" type="text"></td>-->
<!--            <td><input id="cell-49"  class="cell" col="4" row="5" block="4" xy="4,7" value="" type="text"></td>-->
<!--            <td><input id="cell-50"  class="cell" col="5" row="5" block="4" xy="4,8" type="text" value="3" disabled></td>-->

<!--            <td><input id="cell-51"  class="cell" col="6" row="5" block="5" xy="5,6" value="" type="text"></td>-->
<!--            <td><input id="cell-52"  class="cell" col="7" row="5" block="5" xy="5,7" type="text" value="2" disabled></td>-->
<!--            <td><input id="cell-53"  class="cell" col="8" row="5" block="5" xy="5,8" type="text" value="8" disabled></td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td><input id="cell-54"  class="cell" col="0" row="6" block="6" xy="6,0" value="" type="text"></td>-->
<!--            <td><input id="cell-55"  class="cell" col="1" row="6" block="6" xy="6,1" value="" type="text"></td>-->
<!--            <td><input id="cell-56"  class="cell" col="2" row="6" block="6" xy="6,2" type="text" value="9" disabled></td>-->

<!--            <td><input id="cell-57"  class="cell" col="3" row="6" block="7" xy="7,0" type="text" value="3" disabled></td>-->
<!--            <td><input id="cell-58"  class="cell" col="4" row="6" block="7" xy="7,1" value="" type="text"></td>-->
<!--            <td><input id="cell-59"  class="cell" col="5" row="6" block="7" xy="7,2" value="" type="text"></td>-->

<!--            <td><input id="cell-60"  class="cell" col="6" row="6" block="8" xy="8,0" value="" type="text"></td>-->
<!--            <td><input id="cell-61"  class="cell" col="7" row="6" block="8" xy="8,1" type="text" value="7" disabled></td>-->
<!--            <td><input id="cell-62"  class="cell" col="8" row="6" block="8" xy="8,2" type="text" value="4" disabled></td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td><input id="cell-63"  class="cell" col="0" row="7" block="6" xy="6,3" value="" type="text"></td>-->
<!--            <td><input id="cell-64"  class="cell" col="1" row="7" block="6" xy="6,4" type="text" value="4" disabled></td>-->
<!--            <td><input id="cell-65"  class="cell" col="2" row="7" block="6" xy="6,5" value="" type="text"></td>-->

<!--            <td><input id="cell-66"  class="cell" col="3" row="7" block="7" xy="7,3" value="" type="text"></td>-->
<!--            <td><input id="cell-67"  class="cell" col="4" row="7" block="7" xy="7,4" type="text" value="5" disabled></td>-->
<!--            <td><input id="cell-68"  class="cell" col="5" row="7" block="7" xy="7,5" value="" type="text"></td>-->

<!--            <td><input id="cell-69"  class="cell" col="6" row="7" block="8" xy="8,3" value="" type="text"></td>-->
<!--            <td><input id="cell-70"  class="cell" col="7" row="7" block="8" xy="8,4" type="text" value="3" disabled></td>-->
<!--            <td><input id="cell-71"  class="cell" col="8" row="7" block="8" xy="8,5" type="text" value="6" disabled></td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td><input id="cell-72"  class="cell" col="0" row="8" block="6" xy="6,6" type="text" value="7" disabled></td>-->
<!--            <td><input id="cell-73"  class="cell" col="1" row="8" block="6" xy="6,7" value="" type="text"></td>-->
<!--            <td><input id="cell-74"  class="cell" col="2" row="8" block="6" xy="6,8" type="text" value="3" disabled></td>-->

<!--            <td><input id="cell-75"  class="cell" col="3" row="8" block="7" xy="7,6" value="" type="text"></td>-->
<!--            <td><input id="cell-76"  class="cell" col="4" row="8" block="7" xy="7,7" type="text" value="1" disabled></td>-->
<!--            <td><input id="cell-77"  class="cell" col="5" row="8" block="7" xy="7,8" type="text" value="8" disabled></td>-->

<!--            <td><input id="cell-78"  class="cell" col="6" row="8" block="8" xy="8,6" value="" type="text"></td>-->
<!--            <td><input id="cell-79"  class="cell" col="7" row="8" block="8" xy="8,7" value="" type="text"></td>-->
<!--            <td><input id="cell-80"  class="cell" col="8" row="8" block="8" xy="8,8" value="" type="text"></td>-->
<!--        </tr>-->

<!--    </table>-->

</div>
<script type="text/javascript" src="./libs/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./libs/bootstrap.bundle.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="./js/numbers.js" type="module"></script>
</body>
</html>
