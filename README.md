ZSSN (Zombie Survival Social Network)
================

Zssn development in Laravel 6.5 with database PostgreSql 10.

## How to install

First of all, you need to configure composer and php (7.2 or more) in your environment.<br>
Now you need to clone this project to you pc.<br>
After clone this project run composer to install all dependencies.

```
composer install
```
Ok, let's configurate now the database, first you need copy .env.example to .env in the root of project, env.example is a example of how do you configure you environment.<br>

With database configured, let's go to create our migrate and fill it..

```
php artisan migrate
php artisan db:seed
```

Then, run `php artisan serve`, and it will be available at http://localhost:8000/api

-------------------------------------------------------------------------

## API Documentation


### GET /survivors

```
GET /survivors
Content-Type: "application/json"
```
##### Returns:

```
200 Created
Content-Type: "application/json"

"data": [
    {
        "id": 2,
        "name": "Gilberto Doyle",
        "age": 47,
        "gender": "Male",
        "latitude": "18158.1727552",
        "longitude": "261575.5293",
        "infected": false,
        "created_at": "2019-11-29 17:10:49",
        "updated_at": "2019-11-29 17:10:49",
        "reportsCount": 0
    },
    {
        "id": 3,
        "name": "Prof. Nico Yundt",
        "age": 54,
        "gender": "Female",
        "latitude": "5.11093238",
        "longitude": "48425886",
        "infected": false,
        "created_at": "2019-11-29 17:10:49",
        "updated_at": "2019-11-29 17:10:49",
        "reportsCount": 0
    }
]
```
### GET /survivors/{id}

```
GET /:survivors/{id}
Content-Type: "application/json"
```

Attribute | Description
----------| -----------
**id**    | Survivor id

#### Returns

```
200 Ok
Content-Type: "application/json"

{
    "id": 1,
    "name": "Miss Rhoda Abbott PhD",
    "age": 55,
    "gender": "Male",
    "latitude": "116.4865271",
    "longitude": "6211846.638",
    "infected": false,
    "created_at": "2019-11-29 17:10:49",
    "updated_at": "2019-11-29 17:10:49",
    "resources": [
    {
      "description": "Water",
      "points": 4
    },
    {
      "description": "Ammunition",
      "points": 1
    }
    ],
    "reportsCount": 0
}
```

### POST /survivors

```
POST /survivors
Content-Type: "application/json"

{
    "name": "Willardy Tyrone",
    "age": 19,
    "gender": "Male",
    "latitude": "1522255.09052",
    "longitude": "1336523.1439",
    "infected": false
}
```
##### Returns:

```
201 Created
Content-Type: "application/json"

{
  "msg": "Survivor created at success"
}
```

### PUT /survivors/{id}
Attribute | Description
----------| -----------
**id**    | Survivor id

```
PUT /:survivors/{id}
Content-Type: "application/json"
```

#### Returns

```
201 Ok
Content-Type: "application/json"

{
     "msg": "Survivor updated at success"
}
```

### POST /survivors/{survivorReport}/reportInfected/{survivorReported}

```
POST /:survivors/{survivorReport}/report_infection/{survivorReported}
Content-Type: "application/json"
```
Attribute | Description
----------| -----------
**survivorReport**    | Survivor id
**survivorReported**    | Survivor id

#### Returns

```
200 Ok
Content-Type: "application/json"

{
  "msg": "Unconfirmed infection!"
}
```

```
200 Ok
Content-Type: "application/json"

{
  "msg": "Survivor infected!"
}
```

```
400 Ok
Content-Type: "application/json"

{
  "msg": "Report already created"
}
```

### GET /reports/percentInfected
```
200 Ok
Content-Type: "application/json"

GET /reports/percentInfected
Content-Type: "application/json"
```
#### Returns
```
200 Ok
Content-Type: "application/json"

{
    "msg": "37% of survivors are infected"
}
```

### GET /reports/percentNonInfected
```
200 Ok
Content-Type: "application/json"

GET /reports/percentNonInfected
Content-Type: "application/json"
```
#### Returns
```
{
    "msg": "37% of survivors are not infected"
}
```

### GET /reports/averageAmount
```
200 Ok
Content-Type: "application/json"

GET /reports/averageAmount
Content-Type: "application/json"
```
#### Returns
```
"data": {
        "Water": 0.2857142857142857,
        "Food": 0.2857142857142857,
        "Medication": 0.14285714285714285,
        "Ammunition": 1.5714285714285714
    }   
```

### GET /reports/pointsLost/{id}
```
200 Ok
Content-Type: "application/json"

GET /reports/pointsLost/{id}
Content-Type: "application/json"
```
#### Returns
```
200 Ok
Content-Type: "application/json"

{
    "message": "Survivor not infected, not yet"
} 
```

```
200 Ok
Content-Type: "application/json"

{
    "pointsLost": 4
}
```

### PUT /traders/{survivorOften}/tradeItems/{survivorAceppt}
```
200 Ok
Content-Type: "application/json"

PUT /traders/{survivorOften}/tradeItems/{survivorAceppt}
Content-Type: "application/json"
```
#### Returns
```
200 Ok
Content-Type: "application/json"

{
    "erro": "Survivor are equals"
}
```

```
200 Ok
Content-Type: "application/json"

{
    "msg": "Trade is done."
}
```

```
404 Ok
Content-Type: "application/json"

{
    "erro": "Survivor not found"
}
```







