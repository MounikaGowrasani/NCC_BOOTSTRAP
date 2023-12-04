<!DOCTYPE html>
<html>
<head>
    <title>Add Events</title>
    <style>
body {
    font-family: Arial, sans-serif;

}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
  
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: '';
}

input[type="submit"] {
    background-color: #01579b;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color:#012970;

}

    </style>
</head>
<body>
    <center><h2>Add Events</h2></center>
    <form action="events.php" method="POST">
        <label for="eventName">Event Name:</label>
     
        <input type="text" id="eventName" name="eventName" required><br><br>

        <label for="eventType">Event Type: </label>
     
        <select id="eventType" name="eventType">
            <option value="Conference">Institution</option>
            <option value="Workshop">State
            <option value="Seminar">National</option>
        </select><br><br>

        <label for="startDate">From Date:</label>
      
        <input type="date" id="startDate" name="startDate" required><br><br>

        <label for="endDate">To Date:</label>
      
        <input type="date" id="endDate" name="endDate" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
