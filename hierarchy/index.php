<?php

// Product’s Nested Categories

// Mysql if you need. I'll use simple array for the example.
/* CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL,
    parent_id INT DEFAULT NULL
); */

/* INSERT INTO `categories` (`id`, `category_name`, `parent_id`) VALUES
(1, 'Glasses', 0),
(2, 'Pads', 0),
(3, 'Knee Pads', 2),
(4, 'Metal', 3),
(5, 'Plastic', 3),
(6, 'Black Metal', 4),
(7, 'Hard Metal', 6),
(8, 'White Metal', 4); */

/* $mysqli = new mysqli("localhost", "username", "password", "database");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$sql = "SELECT id, category_name, parent_id FROM categories";
$result = $mysqli->query($sql);
$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}
$mysqli->close(); */

$categories = [
    ['id' => 1, 'category_name' => 'Glasses', 'parent_id' => 0],
    ['id' => 2, 'category_name' => 'Pads', 'parent_id' => 0],
    ['id' => 3, 'category_name' => 'Knee Pads', 'parent_id' => 2],
    ['id' => 4, 'category_name' => 'Metal', 'parent_id' => 3],
    ['id' => 5, 'category_name' => 'Plastic', 'parent_id' => 3],
    ['id' => 6, 'category_name' => 'Black Metal', 'parent_id' => 4],
    ['id' => 7, 'category_name' => 'Hard Metal', 'parent_id' => 6],
    ['id' => 8, 'category_name' => 'White Metal', 'parent_id' => 4],
];

function buildCategoryTree(array $elements, $parentId = 0): array {
    $branch = [];
    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildCategoryTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }
    return $branch;
}

$categoryTree = buildCategoryTree($categories);

function renderCategoryTree($categoryTree): void {
    echo '<ul>';
    foreach ($categoryTree as $category) {
        echo '<li>' . $category['category_name'];
        if (!empty($category['children'])) {
            renderCategoryTree($category['children']);
        }
        echo '</li>';
    }
    echo '</ul>';
}

renderCategoryTree($categoryTree);

// You can check the result within console: `php -S localhost:8000`
