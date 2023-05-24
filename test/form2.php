<!DOCTYPE html>
<html>
    <head>
        <title>E-ECN & IECN</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
            @media print {
                header, footer {
                    position: fixed;
                    left: 0;
                    right: 0;
                }
                header {
                    top: 0;
                }
                footer {
                    bottom: 0;
                }
            }
        </style>

        <script>
            var addButton = $('#add_button');
            var wrapper = $('#input_wrapper');
            var fieldIndex = 4;
            var fieldHTML =
                    '<div class="input-group">' +
                    '<input type="text" name="name[]" id="name_' + fieldIndex + '" placeholder="Name" />' +
                    '<input type="text" name="age[]" id="age_' + fieldIndex + '" placeholder="Age" />' +
                    '<input type="text" name="gender[]" id="gender_' + fieldIndex + '" placeholder="Gender" />' +
                    '<a href="javascript:void(0);" class="remove_button">Remove</a>' +
                    '</div>';
        </script>

    </head>
    
    <header>
    <br><br>
        <h1>This is a Header</h1>
    </header>
    <body>
        <div class="container" id="container">
            <div class="row">
                <div class="input-group">
                    <input type="text" name="name[]" id="name_0" placeholder="Name" />
                    <input type="text" name="age[]" id="age_0" placeholder="Age" />
                    <input type="text" name="gender[]" id="gender_0" placeholder="Gender" />
                </div>
            </div>
        </div>
        <button id="clone-row" type="button">Add row</button>
    </body>
    <footer>
        <h1>This is a Footer</h1>
    </footer>
</html>
