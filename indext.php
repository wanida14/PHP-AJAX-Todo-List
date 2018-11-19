<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>

    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<body>
    <div style="text-align: center;margin-top: 30px;">
        Input: <input type="text" id="text">
        <button id="OK" type="button" class="btn btn-warning">OK</button>    
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12" id="push_text" style="text-align: center;margin-top: 30px;margin-bottom: 30px;"></div>
        </div>
    </div>

    <script>
        function getTodoList() {
            $.ajax({
                url: "process.php",
                success: function(text) {
                    $('#push_text').html(text);
                }
            })
        }
        
        $(document).ready(function() {
            
            getTodoList();

            $("#OK").click(function() {
                var text = $('#text').val();
                $.ajax({
                method: 'POST',
                url: "process.php",
                data: { text: text },
                success: function(text) {
                    getTodoList();
                }
            })
        })

        });
    </script>
    
</body>
</html>