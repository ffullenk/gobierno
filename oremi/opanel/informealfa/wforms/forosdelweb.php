<head>
<title>Form Page</title>
<!-- Javascript code for the dynamic form elements. -->
<script>
    // Declare the form field count javascript variable so you know how many the user have added.
    //The CGI.REQUEST_METHOD bit is the CF code for setting this variable back to the count where it was last up to.
    var tFormFieldCount = 1;
    var tFormFieldList = "";
    
    // Function to dynamically insert the form field to the cell below. If you want textareas or other form elements, just create another function and change the html insert text below.
    function MakeOne(FieldType) {
        // Depending on what type of form fields the user choose then dynamically write the appropriate form element to the page
        if (FieldType == 'TextInput') {
            document.getElementById('DynamicContent').innerHTML += 'Form Element ' + tFormFieldCount + '- Text input box&nbsp;&nbsp;<input type="text" name="TextInput[]' + tFormFieldCount + '"><br>';
        } else if (FieldType == 'Textarea') {
            document.getElementById('DynamicContent').innerHTML += 'Form Element ' + tFormFieldCount + '- Textarea&nbsp;&nbsp;<textarea name="Textarea' + tFormFieldCount + '" cols=30 rows=3></textarea><br>';
        }
        
        // Populate the form element list.
        if (tFormFieldList == "") {
            tFormFieldList = FieldType;
        } else {
            tFormFieldList += "," + FieldType;
        }
        
        document.forms[0].FormFieldCount.value = tFormFieldCount;
        document.forms[0].FormFieldList.value = tFormFieldList;
        tFormFieldCount++;
    }
    
    // Just a function to check if the user have added any text input fields.
    function CheckIt() {
        if (tFormFieldCount == 1) {
            alert('You must add at least one text input field.');
            return false;
        }
    return true;
    }
</script>
</head>

<body bgcolor="#FFFFFF">
<!-- HTML form tag. -->
<!-- Action attribute specify where the form data is to be sent to  -->
<!-- Method attribute specify what method the form data is to be sent. POST or GET. Default is GET. -->
<form action="fdw2.php" method="post" onSubmit="return CheckIt();">
    <table cellspacing=0 cellpadding=4 border=1>
        <tr><td align="right"><input type="button" value="Add Form Text Fields" onClick="MakeOne('TextInput');">&nbsp;&nbsp;<input type="button" value="Add Form Textarea" onClick="MakeOne('Textarea');"></td></tr>
        <tr>
            <td id="DynamicContent" valign="top">
                <!-- Cold fusion code again to test to see if the request method of this page is POST or GET. -->
                <!-- If is POST then you know is from the result page and there's data to be output. -->
                
            </td>
        </tr>
        <tr>
            <td align="right" colspan=2>
                <!-- Hidden form field to pass the count of the text inputs to the result page. -->
                <input type="hidden" name="FormFieldList">
                <input type="hidden" name="FormFieldCount">
                <input type="submit" value="Send It">
            </td>
        </tr>
    </table>
</form>
</body>
</html>