<!DOCTYPE HTML>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <meta charset="utf-8"/>
    <title>Lab №1</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <style>
        body, html {
            text-align: center;
            overflow: hidden;
            padding: 0;
            margin: 0;
            background-color: #b4b4b4;
            height: 100%;
            font-family: Monospace, monospace;
            font-size: 19pt;
        }

        .inputs {
            text-align: center;
            display: block;
            width: 100%;
            position: fixed;
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .graph {
            text-align: center;
            margin-top: 50px;
        }

        .sharp {
            border-radius: 0;
        }

        .btn-submit {
            color: Black;
            font-size: 24px;
            padding: 15px 71px;
            background-color: rgba(180, 180, 180, 0.7);
            border-color: Black;
        }

        .btn-submit:hover {
            background-color: rgba(195, 195, 195, 0.7);
        }

        .btn-submit:active {
            background-color: SlateGrey; /* Цвет кнопки при нажатии */
        }

        #num {
            font-size: 18px;
        }


    </style>
</head>
<body>

<h3>Pastukhov Kirill P3118 Var. 28813</h3>
<form method="POST" action="script.php" onsubmit="return Validate()" name="input_form">
    <div class="inputs">
        <div id="x_div">

            Input X<br>
            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="-4">
                <span>-4</span>
            </label>

            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="-3">
                <span>-3</span>
            </label>

            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="-2">
                <span>-2</span>
            </label>

            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="-1">
                <span>-1</span>
            </label>

            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="0" checked>
                <span>0</span>
            </label>

            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="1">
                <span>1</span>
            </label>

            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="2">
                <span>2</span>
            </label>

            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="3">
                <span>3</span>
            </label>

            <label id="num">
                <input name="inputX" id="inputX" type="radio" value="4">
                <span>4</span>
            </label>

            <div id="x_error"></div>
        </div>
        <div id="y_div">
            Input Y<br>
            <label>
                <input type="text" name="inputY" size="40" value="" maxlength="8">
            </label>

            <div id="y_error"></div>
        </div>
        <div id="r_div">
            Input R<br>
            <label>
                <select name="inputR">
                    <option value='1'>1</option>
                    <option value='1.5'>1.5</option>
                    <option value='2'>2</option>
                    <option value='2.5'>2.5</option>
                    <option value='3'>3</option>
                </select>
            </label>

            <div id="r_error"></div>
        </div>

        <div class="graph">
            Graph:<br> <img src="graph.jpg">
        </div>

        <div class="submit">
            <button name="btn" type="submit" class="btn-submit sharp" value="False">Submit</button>
        </div>
</form>
<script>

    let x = document.forms['input_form']['inputX'];
    let y = document.forms['input_form']['inputY'];
    let r = document.forms['input_form']['inputR'];

    // SELECTING ALL ERROR DISPLAY ELEMENTS
    let x_error = document.getElementById('x_error');
    let y_error = document.getElementById('y_error');
    let r_error = document.getElementById('r_error');

    // SETTING ALL EVENT LISTENERS
    x.addEventListener(xVerify, true);
    y.addEventListener(yVerify, true);
    x.addEventListener(rVerify, true);

    // validation function
    /**
     * @return {boolean}
     */
    function Validate() {

        // validate x
        // if (document.getElementsByName("inputX").checked === false) {
        //     x.style.border = "1px solid red";
        //     document.getElementById('x_div').style.color = "red";
        //     x_error.textContent = "X is required";
        //     x.focus();
        //     return false;
        // }

        if (y.value === "") {
            y.style.border = "1px solid red";
            document.getElementById('y_div').style.color = "red";
            y_error.textContent = "Y is required";
            y.focus();
            return false;
        }
        if (isNaN(y.value)) {

            y.style.border = "1px solid red";
            document.getElementById('y_div').style.color = "red";
            y_error.textContent = "Y must be a number";
            y.focus();
            return false;
        }
        if (y.value < -5 || y.value > 3) {

            y.style.border = "1px solid red";
            document.getElementById('y_div').style.color = "red";
            y_error.textContent = "Y must be in range [-5;3]";
            y.focus();
            return false;
        }

    }

    // event handler functions
    function xVerify() {
        if (document.getElementById("inputX").checked === true) {
            x.style.border = "1px solid #5e6e66";
            document.getElementById('x_div').style.color = "green";
            x_error.innerHTML = "";
            return true;
        }
    }

    function yVerify() {
        if (y.value !== "") {
            y.style.border = "1px solid #5e6e66";
            document.getElementById('y_div').style.color = "green";
            y_error.innerHTML = "";
            return true;
        }
    }

    function rVerify() {
        if (r.value !== "") {
            r.style.border = "1px solid #5e6e66";
            document.getElementById('r_div').style.color = "green";
            r_error.innerHTML = "";
            return true;
        }
    }
</script>
</body>
</html>
