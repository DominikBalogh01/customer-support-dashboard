<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ügyfélszolgálati Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="p-4">
<div class="container">
    <div class="card p-4 mb-4">
        <h2 class="mb-4">Új Ticket Nyitása</h2>
        <form action="add_ticket.php" method="post" class="row g-3">
            <div class="col-md-5">
                <input name="customer" class="form-control" placeholder="Ügyfél neve" required>
            </div>
            <div class="col-md-5">
                <input name="issue" class="form-control" placeholder="Probléma leírása" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success w-100">Hozzáadás</button>
            </div>
        </form>
    </div>

    <div class="card p-4">
        <h3>Aktív Ticketek</h3>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Ügyfél</th>
                        <th>Probléma</th>
                        <th>Státusz</th>
                        <th>Dátum</th>
                        <th>Művelet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res = $conn->query("SELECT * FROM tickets ORDER BY created_at DESC");
                    while($row = $res->fetch_assoc()):
                    ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($row['customer']) ?></strong></td>
                        <td><?= htmlspecialchars($row['issue']) ?></td>
                        <td>
                            <span class="status-badge 
                                <?= $row['status']=='új' ? 'bg-warning' : 
                                   ($row['status']=='folyamatban' ? 'bg-primary' : 'bg-success') ?> 
                                text-white">
                                <?= $row['status'] ?>
                            </span>
                        </td>
                        <td><?= date('m-d H:i', strtotime($row['created_at'])) ?></td>
                        <td>
                            <?php if($row['status'] != 'kész'): ?>
                            <a href="update_status.php?id=<?= $row['id'] ?>&status=folyamatban" 
                               class="btn btn-sm btn-outline-primary">Folyamatban</a>
                            <a href="update_status.php?id=<?= $row['id'] ?>&status=kész" 
                               class="btn btn-sm btn-outline-success">Kész</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>