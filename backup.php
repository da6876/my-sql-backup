<?php
$host = 'localhost';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SHOW DATABASES";
$result = $conn->query($sql);
if ($result) {
    $databases = [];
    while ($row = $result->fetch_assoc()) {
        $databases[] = $row['Database'];
    }
    $conn->close();
    date_default_timezone_set('Asia/Dhaka');
    $date = date('Y-m-d H:i:s');
    $dates = date('Y_m_d_H_i_s');
    $backupDir = __DIR__ . '\\backups';
    if (!file_exists($backupDir)) {
        mkdir($backupDir, 0777, true);
    }
    $mysqldumpPath = 'D:\\Server\\mysql\\bin\\mysqldump.exe';
    $logFile = "backUp_log_$dates.log";
    $myfile = fopen($logFile, "a") or die("Unable to open file!");

    $count = 0;

    foreach ($databases as $database) {
        $count++;
        if (in_array($database, ['information_schema', 'performance_schema', 'mysql', 'sys'])) {
            continue;
        }
        $backupFile = $backupDir . '\\' . $database . '_' . $dates . '.sql';
        $command = "\"$mysqldumpPath\" --opt --host=$host --user=$username --password=$password $database > \"$backupFile\"";
        fwrite($myfile, "$count => Executing command: $command\n");
        exec($command . ' 2>&1', $output, $result);
        if ($result === 0) {
            fwrite($myfile, "$date => $database backup was successful. Backup file: $backupFile\n");
            echo "$database backup was successful. Backup file: $backupFile\n";
        } else {
            fwrite($myfile, "$count <=> $date => $database backup failed. Error code: $result\n");
            echo "$database backup failed. Error code: $result\n";
        }
    }
    fclose($myfile);
    echo "Log written to $logFile\n";
} else {
    echo "Error: " . $conn->error;
}
?>