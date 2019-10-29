<?php

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search User</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.css">
    <script>
    //==============    Javascript
        function showSuggestion(str)
        {
            if (str.length == 0)
            {
                document.getElementById('output').innerHTML = '';
            }
            else
            {
                // AJAX request
                var xmlhttp = new XMLHTTPRequest();
                xmlhttp.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.state == 200)
                    {
                        document.getElementById('output').innerHTML = this.responseText;
                    }
                }
            }
            xmlhttp.open("GET", "suggest.php ? q="+str, true);
            xmlhttp.send();
        }
    
    </script>
</head>
<body>
    <div class="container">
        <h1>Search Users</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            Search User: <input type="text" name="" id="" class="form-control" onkeyup="showSuggestion(this.value)">
        </form>
        <p>Suggestion: <span id="output" style="font-weight:bold"></span></p>
    </div>
</body>
</html>