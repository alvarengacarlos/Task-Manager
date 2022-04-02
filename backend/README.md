# Backend
The backend consists of a rest api. Supported languages are Brazilian Portuguese and English.

## Setting the language
Add the query parameter __lang__. The value options are: __pt_BR__ and __en__. By default if no value is passed then __lang=en__ is set.
```
Ex: /api/task-manager/task?lang=pt_BR
Ex: /api/task-manager/task?lang=en
```
## Create a task:
```json
POST
/api/task-manager/task

{
    "title": "Title",
    "body": "Body text"
}
```

## Searching a task:
```json
GET
/api/task-manager/task/1
```

## Searching all tasks:
```json
GET
/api/task-manager/task
```

## Updating a task:
```json
PUT
/api/task-manager/task/1

{
    "title": "Title",
    "body": "Body text"
}
```

## Deleting a task:
```json
DELETE
/api/task-manager/task/1
```
