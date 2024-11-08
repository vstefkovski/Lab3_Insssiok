<?php

function connectDatabase(): SQLite3{
    return new SQLite3(__DIR__ . '/database/products_db.sqlite');
}
//function connectDatabase(): SQLite3 {
//    return new SQLite3('C:/Users/Vojdan/PhpstormProjects/Lab3/database/products_db.sqlite');
//}
