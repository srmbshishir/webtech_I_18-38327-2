<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button>Show employye list</button>
    <button onclick="addemployee()">add employee</button>
    <button onclick="loadDoc()">show employee</button>
    <button onclick="searchuser()">search user</button>
    <button onclick="location.href = 'dailysales.php';">show daily sales</button>
    <button onclick="location.href = 'monthlysale.php';">show monthly sales</button>
    <button onclick="location.href = 'productdetails.php';">show product details</button>
    <button onclick="location.href = 'dashboard.php';">go back</button>
    <div id="demo"></div>

    <script>
        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "../viewer/showAllEmployee.php", true);
        xhttp.send();
        }
        function addemployee() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "../viewer/addemployee.php", true);
        xhttp.send();
        }
        function searchuser() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "../controller/searchUser.php", true);
        xhttp.send();
        }
        
    </script>
    

</body>
</html>