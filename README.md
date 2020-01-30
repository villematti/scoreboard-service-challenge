# Scoreboard Challenge

My application for the Scoreboard Challenge.


## Architecture

Here are some explanations what all the files mean. Its a rather simple application, but because there is a data source required, I decided to create some separation on different parts.

### Data

These files handle data and are the layer for data source connection. If data source is changed, this layer and its methods has to be changed. Currently application uses Sqlite3.

### Domain

These files represent the middle layer between presentation and data. These are independent from other layers while connecting those as smoothly as possible.

As long as Data layer handles data similarly every time and presentation uses similar information regardless of the technology chosen, the application works.

### Presentation

Simple view layer on top of everything else. Only class connected to index.php.

## Features

### Sorting

The app is Javascript-free and there is sorting option build in. If you set the url a parameter "sort" and give it a value "asc" or "dec" table will sort accordingly by score values.

```
/?sort=asc
```