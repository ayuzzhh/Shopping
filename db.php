<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "shopping");

if (!$conn) {
    die("Database connection failed");
}

$products = [
    1 => ["name" => "T-Shirt", "price" => 499, "emoji" => "👕"],
    2 => ["name" => "Shoes", "price" => 1499, "emoji" => "👟"],
    3 => ["name" => "Watch", "price" => 999, "emoji" => "⌚"],
    4 => ["name" => "Bag", "price" => 799, "emoji" => "🎒"]
];
?>