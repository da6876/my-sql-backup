```markdown
# MySQL Database Backup Script 📦

This PHP script automates the process of backing up MySQL databases to `.sql` files. It iterates through all the databases in your MySQL server, skipping system databases, and generates a backup file for each database. Logs are created to track the status of each backup.

## Features ✨

- **Automated Backup**: Dumps all user databases into `.sql` files using `mysqldump`.
- **Skip System Databases**: Excludes `information_schema`, `performance_schema`, `mysql`, and `sys` databases.
- **Logging**: Creates a detailed log file for each run, indicating success or failure for each database.
- **Customizable Paths**: Allows you to specify custom paths for `mysqldump` and backup storage.
- **Time-Stamped Files**: Backup files and log files are time-stamped for easy tracking.

## Requirements 🛠️

1. **PHP**: Make sure you have PHP installed and properly configured.
2. **MySQL/MariaDB**: A running MySQL server.
3. **mysqldump**: Ensure the `mysqldump` executable is available on your system.
4. **Filesystem Access**: Write permissions for the backup directory and log file.

## Usage 🚀

1. Clone or download this repository.
2. Open the script and update the following variables as needed:
   - `$host`: Hostname of your MySQL server (default is `localhost`).
   - `$username`: MySQL username (default is `root`).
   - `$password`: MySQL password.
   - `$mysqldumpPath`: Full path to the `mysqldump` executable.
3. Run the script using the PHP CLI:

   ```bash
   php backup_script.php
   ```

4. The backups will be stored in the `backups` directory within the script's folder.

## Log File 📄

Each run creates a log file named `backUp_log_<timestamp>.log`. The log contains:
- Commands executed.
- Success or failure messages for each database.
- The location of the generated backup files.

## Customization ✏️

- **Backup Directory**: Change the `$backupDir` variable to customize where backup files are stored.
- **Time Zone**: Update the `date_default_timezone_set` function to your local timezone.

## Example Output 🖥️

```plaintext
my_database backup was successful. Backup file: backups/my_database_2023_11_22_15_30_00.sql
another_database backup was successful. Backup file: backups/another_database_2023_11_22_15_30_00.sql
Log written to backUp_log_2023_11_22_15_30_00.log
```

## Notes 📝

- Ensure the `mysqldump` binary is accessible and correctly configured in `$mysqldumpPath`.
- Avoid hardcoding sensitive information like passwords; use environment variables for production environments.

## License 🧾

This project is open-source and available under the [MIT License](LICENSE).

---

Happy backing up! 🎉
```
