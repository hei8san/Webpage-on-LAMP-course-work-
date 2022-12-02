<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <title>Change image on mouse over</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script type="text/javascript">
            $(function ()
            {
                $('#idimg').hover(function ()	//on over
                {
                    $('#idimg').attr('Source Files', '1.png');
                },
                        function ()					//on out
                        {
                            $('#idimg').attr('Source Files', '2.png');
                        })
            })
        </script>
    </head>
    <body>
        <img src="2.png" id="idimg"/>
    </body>
</html>
