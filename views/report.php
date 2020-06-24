
<table class="table" id="reportTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Buyer</th>
            <th>Receipt ID</th>
            <th>Items</th>
            <th>Buyer Email</th>
            <th>Buyer IP</th>
            <th>Note</th>
            <th>City</th>
            <th>Phone</th>
            <th>Hash Key</th>
            <th>Entry At</th>
            <th>Entry By</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listData as $key => $data): ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['amount'] ?></td>
                <td><?= $data['buyer'] ?></td>
                <td><?= $data['receipt_id'] ?></td>
                <td><?= $data['items'] ?></td>
                <td><?= $data['buyer_email'] ?></td>
                <td><?= $data['buyer_ip'] ?></td>
                <td><?= $data['note'] ?></td>
                <td><?= $data['city'] ?></td>
                <td><?= $data['phone'] ?></td>
                <td><?= $data['hash_key'] ?></td>
                <td><?= $data['entry_at'] ?></td>
                <td><?= $data['entry_by'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        $('#reportTable').DataTable();
    } );
</script>