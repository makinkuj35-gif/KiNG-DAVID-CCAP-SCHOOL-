<?php
// Run from a terminal/SSH session: php create_admin.php username
if (PHP_SAPI !== 'cli') { http_response_code(403); exit("Run this script from the command line only.\n"); }
if ($argc < 2) { fwrite(STDERR, "Usage: php create_admin.php USERNAME\n"); exit(1); }
require __DIR__ . '/db.php';
$username = trim($argv[1]);
if ($username === '') { fwrite(STDERR, "Username cannot be blank.\n"); exit(1); }
fwrite(STDOUT, "New admin password: "); $password = trim(fgets(STDIN));
if (strlen($password) < 12) { fwrite(STDERR, "Use a password with at least 12 characters.\n"); exit(1); }
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt=$pdo->prepare('INSERT INTO admin_users (username,password_hash) VALUES (?,?)');$stmt->execute([$username,$hash]);
echo "Administrator created. Delete or move this script outside the public web folder after use.\n";
