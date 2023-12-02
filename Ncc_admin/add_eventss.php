<!DOCTYPE html>
<html>
<head>
    <title>Add Events</title>
    <style>
        body {
    font-family: Arial, sans-serif;
   
    
}

h2 {
    color: #333;
    margin: 10px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="date"],
select {
    width: 50%;
    padding: 10px;
    margin-bottom: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
           
            border-radius: 5px;
           
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
