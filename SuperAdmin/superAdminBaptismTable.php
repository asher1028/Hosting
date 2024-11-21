<?php
include 'superAdminSessionStart.php';
include '../connection.php'; // Make sure to include the database connection

if (!isset($_SESSION['superAdminUsername'])) {
   header("Location: ../login.php");
    exit();
}

// Set the number of records per page
$records_per_page = 10;

// Get the current page number from the URL, default to 1 if not set
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

// Fetch records from the baptism_applications table with pagination, filtering by 'pending' status
$query = "SELECT id, child_name, mother_name, father_name, date_baptized 
          FROM baptism_applications 
          WHERE status = 'pending' AND is_deleted = 0 AND is_forwarded = 1 
          LIMIT $records_per_page OFFSET $offset";

$result = $conn->query($query);

// Get the total number of 'pending' records to calculate total pages
$total_query = "SELECT COUNT(*) AS total FROM baptism_applications WHERE is_forwarded = '1'";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $records_per_page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parish of San Juan</title>
    <link rel="stylesheet" href="superAdminHomepage1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script>
    function btnapprove(event, id) {
    event.preventDefault();
    if (confirm("Do you really want to approve this application?")) {
        updateStatus(id, 'approved');
    }
}

function btndecline(event, id) {
    event.preventDefault();
    if (confirm("Do you really want to decline this application?")) {
        updateStatus(id, 'rejected');
    }
}

function updateStatus(id, status) {
    fetch('superAdminUpdateBaptismApplicationStatus.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'id': id,
            'status': status
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Status updated successfully!');
            location.reload(); // Reload the page to reflect changes
        } else {
            alert('Error updating status: ' + (data.error || 'Unknown error'));
        }
    })
    .catch(error => alert('Error: ' + error));
}
</script>
</head>
<body>
    <?php include 'superAdminHeader.php'; ?>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-2'>
                <?php include 'superAdminSidebar.php'; ?>
            </div>
            <div class='col-9'>
                 <h2 class='mx-5 mt-5 white'>Application Request</h2>
                <div id="mainPage">
                   <div class="table-container bg-light p-5 ">
                    <div class="d-flex justify-content-between">
                      <div class='d-flex'>
                        <a href='superAdminBaptismApprovedRequest.php' class='mx-3 text-danger '>CHECK THE APPROVED SCHEDULE </a>
                      </div>
                     <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    </div>
                        <table class="table table-striped  table-hover">
                          <thead>
                            <tr>
                              <th scope="col">REQUEST NO.</th>
                              <th scope="col">CHILD'S NAME</th>
                              <th scope="col">MOTHER'S NAME</th>
                              <th scope="col">FATHER'S NAME</th>
                              <th scope="col">DATE</th>
                              <th scope="col">ACTIONS</th>
                            </tr>
                          </thead>
                          <tbody class="table-group-divider">
                            <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id']; ?></th>
                                            <td><?php echo $row['child_name']; ?></td>
                                            <td><?php echo $row['mother_name']; ?></td>
                                            <td><?php echo $row['father_name']; ?></td>
                                            <td><?php echo $row['date_baptized']; ?></td>
                                            <td class="action-buttons">
                                                <button class='mx-2' id="approveButtons" onclick="btnapprove(event, <?php echo $row['id']; ?>)">Approve</button>
                                                <button id="declineButtons" onclick="btndecline(event, <?php echo $row['id']; ?>)">Decline</button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No records found</td>
                                    </tr>
                                <?php endif; ?>
                          </tbody>
                        </table>
                        <!-- Pagination controls -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?php if($current_page <= 1){ echo 'disabled'; } ?>">
                                    <a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?php if($current_page == $i){ echo 'active'; } ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if($current_page >= $total_pages){ echo 'disabled'; } ?>">
                                    <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                   </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>