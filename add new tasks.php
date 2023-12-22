<!-- add_new_tasks.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Add New Task</title>
</head>

<body>

    <div class="container">
        <h1>Add New Task</h1>
        <form action="Process add task.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br>

            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date"><br>

            <!-- Include any additional fields here -->

            <input type="submit" value="Add Task">
        </form>
    </div>

</body>

</html>

<style>
    /* style.css */

    body {
        font-family: 'Helvetica', sans-serif;
        background-color: #e9ecef;
        color: #495057;
        line-height: 1.5;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
    }

    .container {
        background: white;
        padding: 20px 25px;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        width: auto;
        max-width: 500px;
    }

    h1 {
        color: #007bff;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        /* Spacing between elements */
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    textarea {
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        resize: vertical;
        /* Allows the textarea to be resized */
    }

    input[type="date"] {
        /* Adjustments for cross-browser consistency in date input */
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    input[type="submit"] {
        background: #007bff;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Smaller devices */
    @media (max-width: 576px) {
        .container {
            width: 90%;
            padding: 15px;
        }
    }
</style>