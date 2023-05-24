<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Fields Form</title>
    <style>
        .input-group {
            margin-bottom: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var addButton = $('#add_button');
            var wrapper = $('#input_wrapper');
            var fieldIndex = 1;

            $(addButton).click(function(e) {
                e.preventDefault();
                var fieldHTML =
                    '<div class="input-group">' +
                    '<input type="text" name="name[]" id="name_' + fieldIndex + '" placeholder="Name" />' +
                    '<input type="text" name="age[]" id="age_' + fieldIndex + '" placeholder="Age" />' +
                    '<input type="text" name="gender[]" id="gender_' + fieldIndex + '" placeholder="Gender" />' +
                    '<a href="javascript:void(0);" class="remove_button">Remove</a>' +
                    '</div>';
                    fieldIndex++;
                $(wrapper).append(fieldHTML);
            });

            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
            });
        });
    </script>
</head>
<body>
    <form method="POST" action="process_form1.php">
        <div>
            <label>Group Name:</label>
            <input type="text" name="group_name" placeholder="Group Name" />
        </div>
        <div id="input_wrapper">
            <div class="input-group">
                <input type="text" name="name[]" id="name_0" placeholder="Name" />
                <input type="text" name="age[]" id="age_0" placeholder="Age" />
                <input type="text" name="gender[]" id="gender_0" placeholder="Gender" />
            </div>
        </div>
        <button type="button" id="add_button">Add People</button>
        <input type="submit" value="Submit" />
    </form>
</body>
</html>
