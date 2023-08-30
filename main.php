<?php
require 'UserManagement.php';

$userManagement = new UserManagement();

// Create a new user
$userManagement->createUser('nikola', 'nikola@abv.bg', 'admin');

// Get user by ID
$user = $userManagement->getUserById(48);
echo "User ID: " . $user->getId() . "<br>";
echo "Username: " . $user->getUsername() . "<br>";
echo "Email: " . $user->getEmail() . "<br>";
echo "Role: " . $user->getRole() . "<br>";

// Update user information
$userManagement->updateUser(1, 'updated_john_doe', 'updated@example.com', 'admin');

// Delete user
$userManagement->deleteUser(1);