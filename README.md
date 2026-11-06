# King David CCAP School — Pupil Management Starter

## Included
- Administrator login with PHP password hashing and session protection.
- Pupil register, search, edit and delete.
- MySQL schema and CSV import of the supplied pupil spreadsheet.
- Existing fee entries are preserved as legacy fields; ambiguous text is not converted into invented amounts.

## Important hosting note
GitHub Pages only serves static files. This PHP/MySQL management area must be deployed to a separate PHP 8+ and MySQL hosting provider. Keep the public school website on GitHub Pages if you wish; deploy this `management` folder to the PHP host.

## Setup
1. Create a MySQL database and database user in your hosting control panel.
2. Import `database/schema.sql` using phpMyAdmin.
3. In phpMyAdmin, select the `king_david_school` database, choose Import, and import `database/import_pupils.sql`. This inserts the 101 existing pupil rows into the `pupils` table. The matching CSV file is also included if you prefer a CSV import.
4. Copy `config.example.php` to `config.php` and enter the database host, database name, username and password. Never publish `config.php` to a public Git repository.
5. Run `php create_admin.php adminname` from the command line/SSH and enter a strong password (12+ characters). If your host has no SSH/CLI, ask the hosting provider to run it; do not expose an admin-creation script on the public website.
6. Visit `/management/admin/login.php` on the PHP host.
7. After setup, remove `create_admin.php` from the public hosting directory.

## Data handling notes
- The workbook contains 101 pupil rows and 15 source columns.
- Original blanks are left blank. The original grade value `i` and text entries in school-fees-paid are retained as text rather than guessed.
- `whatsapp_number` is text to preserve leading zeroes and the original `0` placeholders.
- The legacy fee balance is numeric where supplied; notes and non-numeric fee descriptions remain in `fees_paid_legacy`. Confirm these entries with the school before treating them as a current account balance.
- This starter is a first admin CRUD module, not a complete production school ERP. Add backups, HTTPS, access policies, audit logging, and tested restore procedures before storing sensitive pupil records online.
