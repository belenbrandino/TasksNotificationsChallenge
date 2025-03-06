<!DOCTYPE html>
<html>
<head>
    <title>Task Notification</title>
</head>
<body>
    <h1>Task Assignment Notification</h1>
    <p>Task Id:</strong> {{ $task->id }}</p>
    <p>Title:</strong> {{ $task->title }}</p>
    <p>Description:</strong> {{ $task->description }}</p>
    <p>Status:</strong> {{ $task->status->value() }}</p>
</body>
</html>
